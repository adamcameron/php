<?php
class PaginationTest extends PHPUnit_Framework_TestCase
{
    protected $pagination;
    protected $baselinePages    = ["page1","page2","page3"];
    protected $extremityBuffer  = 2;
    protected $proximityBuffer  = 3;

    public function setup()
    {
        $this->pagination = new Pagination();
    }

    /** @runInSeparateProcess  */
    public function testFilter_exists()
    {
        $this->pagination->filter([], 0);
        // won't get this far if it doesn't exist
    }

    public function testFilter_returnsAnArray()
    {
        $result = $this->pagination->filter([], 0);
        $this->assertTrue(is_array($result), "Returned value should be an array");
    }

    public function testFilter_returnsAnArrayWithExpectedKeys()
    {
        $result = $this->pagination->filter([], 0);

        $resultKeys = array_keys($result);
        sort($resultKeys);

        $this->assertEquals(
            ["ellipses", "pages", "showNext", "showPrevious"],
            $resultKeys,
            "Returned array should contain expected keys"
        );
    }

    public function testFilter_previous_isFalseWhenOnFirstPage()
    {
        $result = $this->pagination->filter($this->baselinePages, 1);
        $this->assertFalse($result["showPrevious"], "showPrevious should be false when on the first page of results");
    }

    public function testFilter_previous_isTrueOnSubsequentPages()
    {
        $result = $this->pagination->filter($this->baselinePages, 2);
        $this->assertTrue($result["showPrevious"], "showPrevious should be true on pages other than the first page");
    }

    public function testFilter_previous_isFalseIfNoPages()
    {
        $result = $this->pagination->filter([], 2);
        $this->assertFalse($result["showPrevious"], "showPrevious should be false if there are no pages");
    }

    public function testFilter_next_isFalseWhenOnLastPage()
    {
        $result = $this->pagination->filter($this->baselinePages, count($this->baselinePages));
        $this->assertFalse($result["showNext"], "showNext should be false when on the last page of results");
    }

    public function testFilter_next_isTrueOnEarlierPages()
    {
        $result = $this->pagination->filter($this->baselinePages, count($this->baselinePages) - 1);
        $this->assertTrue($result["showNext"], "showNext should be true on pages other than the last page");
    }

    public function testFilter_next_isFalseIfNoPages()
    {
        $result = $this->pagination->filter([], 2);
        $this->assertFalse($result["showNext"], "showNext should be false if there are no pages");
    }

    public function testFilter_ellipses_firstTrueWhenPageGreaterThanBuffer()
    {
        $minPageWithInitialEllipsis = $this->extremityBuffer + $this->proximityBuffer + 2;

        $testPages = SELF::getTestPages($minPageWithInitialEllipsis);

        $result = $this->pagination->filter($testPages, $minPageWithInitialEllipsis);
        $this->assertTrue($result["ellipses"][0], "First ellipses value should be true if on page {$minPageWithInitialEllipsis}+");
    }

    public function testFilter_ellipses_firstTrueWhenPageAtBuffer()
    {
        $minPageWithInitialEllipsis = $this->extremityBuffer + $this->proximityBuffer + 1;

        $testPages = SELF::getTestPages($minPageWithInitialEllipsis);

        $result = $this->pagination->filter($testPages, $minPageWithInitialEllipsis);
        $this->assertFalse($result["ellipses"][0], "First ellipses value should be false if on page {$minPageWithInitialEllipsis}");
    }

    public function testFilter_ellipses_secondTrueWhenPageLessThanBuffer()
    {
        $minPageWithLatterEllipsis = $this->extremityBuffer + $this->proximityBuffer + 2;

        $testPages = SELF::getTestPages($minPageWithLatterEllipsis);

        $result = $this->pagination->filter($testPages, 1);
        $this->assertTrue($result["ellipses"][1], "Second ellipses value should be true if on page 1 of {$minPageWithLatterEllipsis}");
    }

    public function testFilter_ellipses_secondFalseWhenPageAtBuffer()
    {
        $minPageWithLatterEllipsis = $this->extremityBuffer + $this->proximityBuffer + 2;

        $testPages = SELF::getTestPages($minPageWithLatterEllipsis);

        $result = $this->pagination->filter($testPages, 2);
        $this->assertFalse($result["ellipses"][1], "Second ellipses value should be false if on page 2 of {$minPageWithLatterEllipsis}");
    }

    public function testFilter_pages_pagesFilteredFromBeginningWhenAfterInitialThreshold()
    {
        $pagesToBeFiltered = 1;
        $minPageWithInitialEllipsis = $this->extremityBuffer + $this->proximityBuffer + $pagesToBeFiltered + 1;

        $testPages = SELF::getTestPages($minPageWithInitialEllipsis);

        $result = $this->pagination->filter($testPages, $minPageWithInitialEllipsis);

        $this->assertEquals(
            count($testPages) - $pagesToBeFiltered,
            count($result["pages"]),
            "$pagesToBeFiltered pages should have been filtered out"
        );

        $pageThatWasFiltered = $testPages[$this->extremityBuffer];
        $this->assertFalse(
            array_search($pageThatWasFiltered,$result["pages"]),
            sprintf("%s should have been filtered out of [%s]", $pageThatWasFiltered, implode($result["pages"]))
        );
    }

    public function testFilter_pages_pagesFilteredFromEndWhenBeforeFinalThreshold()
    {
        $pagesToBeFiltered = 1;
        $minPageWithLatterEllipsis = $this->extremityBuffer + $this->proximityBuffer + $pagesToBeFiltered + 1;

        $testPages = SELF::getTestPages($minPageWithLatterEllipsis);

        $result = $this->pagination->filter($testPages, 1);

        $this->assertEquals(
            count($testPages) - $pagesToBeFiltered,
            count($result["pages"]),
            "$pagesToBeFiltered pages should have been filtered out"
        );

        $indexOfFilteredPage =  count($testPages) - $this->extremityBuffer - 1;
        $pageThatWasFiltered = $testPages[$indexOfFilteredPage];

        $this->assertFalse(
            array_search($pageThatWasFiltered,$result["pages"]),
            sprintf("%s should have been filtered out of [%s]", $pageThatWasFiltered, implode($result["pages"]))
        );
    }

    public function testFilter_pages_pagesFilteredFromBothEnds()
    {
        $pagesToBeFilteredFromEachSide = 1;
        $pagesToBeFiltered = $pagesToBeFilteredFromEachSide * 2;

        $minPagesWithBothEllipses = 2 * ($this->extremityBuffer + $this->proximityBuffer + $pagesToBeFilteredFromEachSide) + 1;
        $testPages = SELF::getTestPages($minPagesWithBothEllipses);

        $testPage = ceil($minPagesWithBothEllipses / 2);

        $result = $this->pagination->filter($testPages, $testPage);

        $this->assertEquals(
            count($testPages) - $pagesToBeFiltered,
            count($result["pages"]),
            "$pagesToBeFiltered pages should have been filtered out"
        );

        $indexOfFirstFilteredPage =  $this->extremityBuffer;
        $pageThatWasFiltered = $testPages[$indexOfFirstFilteredPage];

        $this->assertFalse(
            array_search($pageThatWasFiltered, $result["pages"]),
            sprintf("%s should have been filtered out of [%s]", $pageThatWasFiltered, implode($result["pages"]))
        );

        $indexOfLastFilteredPage =  $minPagesWithBothEllipses - $this->extremityBuffer - 1;
        $pageThatWasFiltered = $testPages[$indexOfLastFilteredPage];

        $this->assertFalse(
            array_search($pageThatWasFiltered, $result["pages"]),
            sprintf("%s should have been filtered out of [%s]", $pageThatWasFiltered, implode($result["pages"]))
        );
    }


    protected static function getTestPages($count)
    {
        return array_map(function ($index) {
            return "page$index";
        }, range(1, $count));
    }

}
