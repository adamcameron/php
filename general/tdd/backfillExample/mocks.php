<?php
class TranslatorProviderTest extends \PHPUnit_Framework_TestCase
{

    use ReflectionTrait;

    private $mockedTranslator;
    private $mockedApp;
    private $testTranslatorProvider;
    private $mockedTranslationsRepository;
    private $mockedTranslationsCache;

    private static $mockedLocale = 'MOCKED_LOCALE';
    private static $mockedPrimaryCacheKey = 'MOCKED_COMMON_CACHE_KEY';
    private static $mockedSecondaryCacheKey = 'MOCKED_URL_CACHE_KEY';
    private static $mockedTtl = 'MOCKED_TTL';

    public function setup()
    {
        $this->mockedTranslationsRepository = $this->getMockedTranslationsRepository();
        $this->mockedTranslationsCache = $this->getMockedTranslationsCache();

        $this->mockedApp = $this->getMockedApp();
        $this->mockedTranslator = $this->getMockedTranslator($this->mockedApp);

        $this->testTranslatorProvider = $this->getTestTranslatorProvider();
    }

    private function getMockedApp()
    {
        $mockedApp = [
            'session' => $this->getMockedSession(),
            'currentLocale' => self::$mockedLocale,
            'translations_cache' => $this->mockedTranslationsCache,
            'data_source.translations' => $this->getMockedTranslationsDataSource(),
            'repository.translations' => $this->mockedTranslationsRepository,
            'config' => $this->getMockedConfig()
        ];
        return $mockedApp;
    }

    private function getMockedSession()
    {
        $mockedSession = $this
            ->getMockBuilder('Session')
            ->disableOriginalConstructor()
            ->setMethods(['get'])
            ->getMock();

        $mockedSession
            ->expects($this->once())
            ->method('get')
            ->with('disable_translations')
            ->willReturn(false);

        return $mockedSession;
    }

    private function getMockedTranslationsCache()
    {
        $mockedCache = $this
            ->getMockBuilder('CacheProviderInterface')
            ->disableOriginalConstructor()
            ->setMethods(['exists','set', 'get', 'mget', 'mset', 'delete', 'flush'])
            ->getMock();

        $mockedCache
            ->method('exists')
            ->willReturn(false);

        return $mockedCache;

    }

    private function getMockedTranslationsDataSource()
    {
        $mockedDataSource = $this
            ->getMockBuilder('\stdClass')
            ->setMethods(['getInvalidateCacheFlag'])
            ->getMock();
        $mockedDataSource
            ->expects($this->once())
            ->method('getInvalidateCacheFlag')
            ->willReturn(false);

        return $mockedDataSource;
    }

    private function getMockedTranslationsRepository()
    {
        $mockedRepo = $this
            ->getMockBuilder('TranslationsRepository')
            ->disableOriginalConstructor()
            ->setMethods(['readList'])
            ->getMock();

        return $mockedRepo;
    }

    private function getMockedConfig()
    {
        $mockedTranslationsTtl = (object) [
            'Translations' => (object) [
                'ttl' => self::$mockedTtl
            ]
        ];

        $mockedConfig = $this->getMockBuilder('\stdClass')
            ->setMethods(['get'])
            ->getMock();
        $mockedConfig
            ->expects($this->once())
            ->method('get')
            ->willReturn($mockedTranslationsTtl);

        return $mockedConfig;
    }

    private function getMockedTranslator($mockedApp)
    {
        $mockedTranslator = $this
            ->getMockBuilder('Translator')
            ->disableOriginalConstructor()
            ->setMethods(['setLocale','addLoader', 'addResource'])
            ->getMock();

        $mockedTranslator
            ->expects($this->once())
            ->method('setLocale')
            ->with($mockedApp['currentLocale']);
        $mockedTranslator
            ->expects($this->once())
            ->method('addLoader');

        return $mockedTranslator;
    }

    private function getTestTranslatorProvider()
    {
        $getCacheKeyExpectationMap = [
            ['primary', self::$mockedLocale, self::$mockedPrimaryCacheKey],
            ['secondary', self::$mockedLocale, self::$mockedSecondaryCacheKey],
        ];

        $partiallyMockedTranslatorProvider = $this
            ->getMockBuilder('TranslatorProvider')
            ->setMethods(['getCacheKey'])
            ->getMock();
        $partiallyMockedTranslatorProvider
            ->expects($this->exactly(2))
            ->method('getCacheKey')
            ->will($this->returnValueMap($getCacheKeyExpectationMap));

        return $partiallyMockedTranslatorProvider;
    }

}