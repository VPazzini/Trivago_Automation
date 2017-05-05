<?php
namespace Step\Acceptance;
use Codeception\Util\Locator;

class Filters extends \AcceptanceTester
{

    public function selectPetsAllowed()
    {
        $I = $this;
        $I->waitForElement("button[title='Pets allowed']");

        $I->click("button[title='Pets allowed']");
        //$I->wait(10);
        $I->waitForJS("return $.active == 0;",30);
        $I->waitForElement('li.hotel.item-order__list-item.js_co_item',30);
        $I->waitForElement('li.hotel.item-order__list-item.js_co_item p.details__paragraph',30);
        try{
            $I->click('li.hotel.item-order__list-item.js_co_item p.details__paragraph');
            $I->waitForElement("li.hotel.item-order__list-item.js_co_item .top-features li[title='Feature available']");
        }catch(\Exception $e){
            $I->click('li.hotel.item-order__list-item.js_co_item p.details__paragraph');
            $I->waitForElement("li.hotel.item-order__list-item.js_co_item .top-features li[title='Feature available']");
        }
        
        
        $I->waitForText('Pets', 10, "li.hotel.item-order__list-item.js_co_item .top-features ");
        $I->see('Pets',"li.hotel.item-order__list-item.js_co_item .top-features ");
        $linkClasses = $I->grabMultiple("li.hotel.item-order__list-item.js_co_item .top-features li[title='Feature available']");
        //\Codeception\Util\Debug::debug($linkClasses);
        $I->assertTrue(in_array("Pets", $linkClasses),"Pets is one of the Hotel features.");
        $I->click('li.hotel.item-order__list-item.js_co_item p.details__paragraph');
    }

    public function selectFreeWifi()
    {
        $I = $this;
        $I->waitForElement("button[title='Free WiFi']");
        $I->click("button[title='Free WiFi']");
        //$I->wait(20);
        $I->waitForJS("return $.active == 0;",30);
        $I->waitForElement('li.hotel.item-order__list-item.js_co_item',30);
        $I->waitForElement('li.hotel.item-order__list-item.js_co_item p.details__paragraph',30);
        try{
            $I->click('li.hotel.item-order__list-item.js_co_item p.details__paragraph');
            $I->waitForElement("li.hotel.item-order__list-item.js_co_item .top-features li[title='Feature available']");
        }catch(\Exception $e){
            $I->click('li.hotel.item-order__list-item.js_co_item p.details__paragraph');
            $I->waitForElement("li.hotel.item-order__list-item.js_co_item .top-features li[title='Feature available']");
        }
        $linkClasses = $I->grabMultiple("li.hotel.item-order__list-item.js_co_item .top-features li[title='Feature available']");
        //\Codeception\Util\Debug::debug($linkClasses);
        $I->assertTrue(in_array("FreeWiFi in the rooms", $linkClasses),"Free WiFi is one of the Hotel features");
    }

    public function selectBreakfast()
    {
        $I = $this;
        $I->click("button[title='Breakfast']");
        $I->waitForJS("return $.active == 0;",30);
        $I->waitForElement('li.hotel.item-order__list-item.js_co_item',30);
        $I->see('breakfast',"li.hotel.item-order__list-item.js_co_item em.item__meal-plan");
    }

}