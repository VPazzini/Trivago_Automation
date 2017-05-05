<?php 
use Step\Acceptance\Search as SearchTester;
use Step\Acceptance\Sort as SortTester;
use Step\Acceptance\Filters as FilterTester;
use Step\Acceptance\Pagination as PaginationTester;

$I = new AcceptanceTester($scenario);
$I->wantTo('Search for a Hotel');
$I->amOnPage('/');
$I = new SearchTester($scenario);
$I->searchForCity('New York');
$I = new FilterTester($scenario);
$I->selectPetsAllowed();
$I->selectFreeWifi();
$I->selectBreakfast();

?>