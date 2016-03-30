<?php

class AccountPage {

    public function open($webDriver, $url){
        $webDriver->get($url);
    }

    public function editAccount($webDriver,$first,$last,$email){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Profile form'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div#Profile form div:nth-child(2) input'))->click()->clear()->sendKeys($first);
        $webDriver->findElement(WebDriverBy::cssSelector('div#Profile form div:nth-child(3) input'))->click()->clear()->sendKeys($last);
        $webDriver->findElement(WebDriverBy::cssSelector('div#Profile form div:nth-child(6) input'))->click()->clear()->sendKeys($email);
        $webDriver->findElement(WebDriverBy::cssSelector('div#Profile form button.Btn_Save_Profile'))->click();
    }

    public function selectPersonalSettings($webDriver){
        $search = $webDriver->findElement(WebDriverBy::linkText('Personal'));

    }

    public function changeAvatar($webDriver){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Profile form'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div.Profile_User_Avatar'))->click();
    }

    public function getInputValue($webDriver, $div){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Profile form'))
        );
        $content = $webDriver->findElement(WebDriverBy::cssSelector('div#Profile form div:nth-child(' . $div . ') input'))->getAttribute('value');
        return $content;
    }

    public function affirmSampleMessage($webDriver){
        $content = $webDriver->findElement(WebDriverBy::cssSelector('div#Message_Box'))->getText();
        return $content;
    }

}