<?php
	private function setTranslator($translator, $app)
	{
$translator->setLocale($app['locales_current']);

if ($app['session']->get('disable_translations')) {
	return $translator;
}
//Not using the standard caching mechanism that's built into the data layer, as the translations
//service does not have a ttl-based cache. Also the data returned is large so I'm pruning it
// before caching
$locale = $app['locales_current'];
$cacheKeyCommon = $this->getCacheKey('common', $locale);
$cacheKeyUrl = $this->getCacheKey('url', $locale);
/** @var  CacheProviderInterface $cache */
$cache = $app['translations_cache'];

$okToGetFromCache = !$app['data_source.translations']->getInvalidateCacheFlag()
	&& $cache->exists($cacheKeyCommon)
	&& $cache->exists($cacheKeyUrl);

if ($okToGetFromCache) {
	$data = [
		'common' => $cache->get($cacheKeyCommon),
		'url' => $cache->get($cacheKeyUrl)
	];
} else {
	/** @var TranslationsRepository $translationsRepo */
	$translationsRepo = $app['repository.translations'];
	$common = $translationsRepo->readList('common', $locale);
	$url = $translationsRepo->readList('url', $locale);

	//the data returned contains lots of extra information, so strip that out before caching
$data = [];
foreach ($common as $translation) {
	$data['common'][$translation['code']] = $translation['text'];
}
foreach ($url as $translation) {
	$data['url'][$translation['code']] = $translation['text'];
}

	$ttl = (string) $app['config']->get('Cache')->Translations->ttl;
	$cache->set($cacheKeyCommon, $data['common'], $ttl);
	$cache->set($cacheKeyUrl, $data['url'], $ttl);
}

$translator->addLoader('array', new ArrayLoader());

$translator->addResource('array', $data['common'], $locale, 'messages');
$translator->addResource('array', $data['url'], $locale, 'url');

		return $translator;
	}
