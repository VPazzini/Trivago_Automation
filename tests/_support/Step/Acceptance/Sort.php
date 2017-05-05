<?php
namespace Step\Acceptance;
use \Codeception\Util\Debug;

class Sort extends \AcceptanceTester
{

    private $selector = '#mf-select-sortby';

    private function sort($sortBy){
        $I = $this;
        $I->selectOption($this->selector, $sortBy);
        $I->waitForElement('li.hotel.item-order__list-item.js_co_item',30);
        $I->wait(5);
    }

    public function SortOnlyByRating()
    {
        $I = $this;
        $this->sort('Sort only by Rating');
        $linkClasses = $I->grabMultiple("li.hotel.item-order__list-item.js_co_item span[itemprop='ratingValue']");
        
        $last = $linkClasses[0];
        foreach ($linkClasses as $linkClass) {
            $a = explode(' ',  $last);
            $b = explode(' ',  $linkClass);
            
            $I->assertTrue((int)$a >= (int)$b, 'Results are not on the correct order.');
            $last = $linkClass;
        }
    }

    public function SortOnlyByPrice()
    {
        $I = $this;
        $this->sort('Sort only by Price');
        $linkClasses = $I->grabMultiple("li.hotel.item-order__list-item.js_co_item strong.item__best-price");
        $last = $linkClasses[0];
        foreach ($linkClasses as $linkClass) {
            $I->assertTrue((int)substr($linkClass,1) >= (int)substr($last,1), 'Results are not on the correct order.');
            $last = $linkClass;
        }
    }

    public function SortOnlyByDistance()
    {
        $I = $this;
        $this->sort('Sort only by Distance');
        $linkClasses = $I->grabMultiple("li.hotel.item-order__list-item.js_co_item span.item__distance");

        $last = explode(' ', $linkClasses[0])[0];
        foreach ($linkClasses as $linkClass) {
            $I->assertTrue((float)explode(' ', $linkClass)[0] >= (float)$last, 'Results are not on the correct order.');
            $last = $linkClass;
        }
    }

}