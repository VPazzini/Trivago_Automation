<?php
namespace Step\Acceptance;

class Pagination extends \AcceptanceTester
{

    public function nextPage()
    {
        $I = $this;
        $I->waitForElement("button.btn--pagination.btn--next",30);
        $I->click("button.btn--pagination.btn--next");
        $I->waitForJS("return $.active == 0;",10);
        $I->waitForElement('li.hotel.item-order__list-item.js_co_item',30);
    }

    public function allPages()
    {
        $I = $this;
        //\Codeception\Util\Debug::debug($I->grabMultiple("button.btn--pagination.btn--next"));
        $I->waitForElement("button.btn--pagination.btn--next",30);
        while (count($I->grabMultiple("button.btn--pagination.btn--next")) > 0) {
     		$I->waitForJS("return $.active == 0;",10);
     		$this->nextPage();
		}
    }

}