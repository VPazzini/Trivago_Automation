<?php 

/**
* 
*/
class OpenTrivagoStepsCest
{
	
	protected $I;

	function __construct(AcceptanceTester $I)
	{
		$this->I = $I;
	}


	/**@Given Go to main page
	 */
	public function GoToMainPage(){
		$this->I->amOnPage('/');
	}
}

?>