<?php 
use Step\Acceptance\Search as SearchTester;
use Step\Acceptance\Sort as SortTester;
use Step\Acceptance\Filters as FilterTester;

$I = new AcceptanceTester($scenario);
$I->wantTo('Search for a Hotel');
$I->amOnPage('/');
$I = new SearchTester($scenario);
$I->searchForCity('Dornbirn');

?>