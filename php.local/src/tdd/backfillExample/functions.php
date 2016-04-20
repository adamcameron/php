<?php

class Dummy
{

    private function setTranslator($translator, $app)
    {
        $translator->setLocale($app['locales_current']);

        if (filter_var($app['session']->get('disable_translations'), FILTER_VALIDATE_BOOLEAN)) {
            return $translator;
        }

        $locale = $app['locales_current'];

        $translations = $this->getTranslations($app, $locale);

        $this->loadTranslationsIntoTranslator($translator, $translations, $locale);

        return $translator;
    }

    protected function getTranslations($app, $locale)
    {
        $cache = $app['translations_cache'];

        $cacheKeys = [
            'common' => $this->getCacheKey('common', $locale),
            'url' => $this->getCacheKey('url', $locale)
        ];

        $okToGetFromCache = !$app['data_source.translations']->getInvalidateCacheFlag()
            && $cache->exists($cacheKeys['common'])
            && $cache->exists($cacheKeys['url']);

        if ($okToGetFromCache) {
            $translations = [
                'common' => $cache->get($cacheKeys['common']),
                'url' => $cache->get($cacheKeys['url'])
            ];
        } else {
            $translations = $this->loadTranslationsFromRepository($app['repository.translations'], $locale);
            $this->cacheTranslations($cache, $app, $cacheKeys, $translations);
        }
        return $translations;
    }

    protected function loadTranslationsFromRepository($translationsRepo, $locale)
    {
        $translationsForApp = [];
        $listsToRead = ['common', 'url'];
        foreach ($listsToRead as $list) {
            $translationsFromRepo = $translationsRepo->readList($list, $locale);

            $translationsForApp[$list] = [];
            foreach ($translationsFromRepo as $translation) {
                $translationsForApp[$list][$translation['code']] = $translation['text'];
            }
        }
        return $translationsForApp;
    }

    protected function loadTranslationsIntoTranslator($translator, $translations, $locale)
    {
        $translator->addLoader('array', new ArrayLoader());
        $translator->addResource('array', $translations['common'], $locale, 'messages');
        $translator->addResource('array', $translations['url'], $locale, 'url');
    }

    protected function cacheTranslations($cache, $app, $cacheKeys, $translations)
    {
        $ttl = (string)$app['config']->get('Cache')->Translations->ttl;
        $cache->set($cacheKeys['common'], $translations['common'], $ttl);
        $cache->set($cacheKeys['url'], $translations['url'], $ttl);
    }
}