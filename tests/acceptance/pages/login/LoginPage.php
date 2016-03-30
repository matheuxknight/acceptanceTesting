<?php

class LoginPage {
	
	public function open($webDriver,$url){
		$webDriver->get($url);
	}
	
	public function login($webDriver,$username,$password){
		$webDriver->wait(20, 1500)->until(
			WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Login_Form'))
		);
        $webDriver->findElement(WebDriverBy::cssSelector('button.Btn_Login'))->click();
        $webDriver->findElement(WebDriverBy::cssSelector('form.Login_Form'))->click();
		$webDriver->findElement(WebDriverBy::cssSelector('input.ws-input-1:nth-child(1)'))->click()->sendKeys($username);
		$webDriver->findElement(WebDriverBy::cssSelector('input.ws-input-1:nth-child(2)'))->click()->sendKeys($password);
		$webDriver->getKeyboard()->pressKey(WebDriverKeys::ENTER);
	}

    public function passwordReset($webDriver,$email)
    {
        $webDriver->wait(20, 1500)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Login_Form'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('button.Btn_Login'))->click();
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::linkText('Forgot your password?'))
        );
        $webDriver->findElement(WebDriverBy::linkText('Forgot your password?'))->click();
        $webDriver->wait(20, 1500)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Password_Recovery_Form input.ws-input-1:nth-child(1)'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Password_Recovery_Form input.ws-input-1:nth-child(1)'))->click()->sendKeys($email);
        $webDriver->getKeyboard()->pressKey(WebDriverKeys::ENTER);
    }

    public function selectSample($webDriver){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Login_Form'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div.Btn_Sign_Up'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('a.Btn_Try_Demo'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('a.Btn_Try_Demo'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('select.ws-select-1'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('option:nth-child(2)'))->click();
        $webDriver->findElement(WebDriverBy::cssSelector('button.Btn_Login_Sample'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div.Dashboard_Courses'))
        );
    }

    public function selectRegistration($webDriver,$role){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Login_Form'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div.Btn_Sign_Up'))->click();
        if($role == "student") {
            $webDriver->findElement(WebDriverBy::cssSelector('div.Btn_Reg_Student'))->click();
            $webDriver->wait(15, 1000)->until(
                WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Student_Reg_Form'))
            );
        }
        elseif($role == "teacher"){
            $webDriver->findElement(WebDriverBy::cssSelector('div.Btn_Reg_Teacher'))->click();
            $webDriver->wait(15, 1000)->until(
                WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Teacher_Reg_Form'))
            );
        }

    }

    public function selectRequest($webDriver){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Login_Form'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div.Btn_Sign_Up'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div.Btn_Request_Trial'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div.Btn_Request_Trial'))->click();
    }

    public function selectForgotPassword($webDriver){
        ##todo
        ##Select that you have forgotten your password
    }

    public function affirmSampleMessage($webDriver){
        $content = $webDriver->findElement(WebDriverBy::cssSelector('div#Message_Box'))->getText();
        return $content;
    }
}
?>