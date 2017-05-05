<?php
namespace Step\Acceptance;
use Codeception\Util\Locator;

class Search extends \AcceptanceTester
{


	private function fillSearchField($name){
		$I = $this;
		$I->click("input[name='sQuery']");
        $I->fillField("input[name='sQuery']",$name);
        $I->pressKey("input[name='sQuery']",\WebDriverKeys::ENTER);
        $I->waitForJS("return $.active == 0;",10);
        $I->click("input[name='sQuery']");
	}

	private function fillDateField($date){
		$I = $this;
        $splitted_date = explode(' ', $date);
        $I->click('button.btn.btn-horus');
    	while (!Locator::contains('#cal-heading-month', '$splitted_date[0]')) {
        	$I->click('button.cal-btn-next.js-cal-nav.js-next');
        }
	}

	private function clickSearchWaitResults($name){
		$I = $this;
		$I->click('button.js-btn-search');
		$I->waitForElement('li.hotel.item-order__list-item.js_co_item',30);
		$I->canSee($name,'li.hotel.item-order__list-item.js_co_item');
	}

    public function searchForCity($name)
    {
    	$I = $this;
        $this->fillSearchField($name);
		$this->clickSearchWaitResults($name);
    }

    public function searchForCityWithDate($name,$date){
    	$I = $this;
    	$this->fillSearchField($name);
    	$this->fillDateField($date);
    	$this->clickSearchWaitResults($name);
    }

}