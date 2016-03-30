<?php

class RegistrationPage{

    public function open($webDriver, $url){
        $webDriver->get($url);
    }

    public function registerStudentAccount($webDriver,$email,$password,$first,$last,$username){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Student_Reg_Form'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Student_Reg_Form input.ws-input-1:nth-child(1)'))->click()->sendKeys($email);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Student_Reg_Form input.ws-input-1:nth-child(2)'))->click()->sendKeys($password);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Student_Reg_Form input.ws-input-1:nth-child(3)'))->click()->sendKeys($password);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Student_Reg_Form input.ws-input-1:nth-child(4)'))->click()->sendKeys($first);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Student_Reg_Form input.ws-input-1:nth-child(5)'))->click()->sendKeys($last);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Student_Reg_Form input.ws-input-1:nth-child(6)'))->click()->sendKeys($username);
        $webDriver->findElement(WebDriverBy::cssSelector('form p input'))->click();
        $webDriver->findElement(WebDriverBy::cssSelector('button.Btn_Save_Student'))->click();
    }

    public function registerTeacherAccount($webDriver,$email,$password,$first,$last,$username,$school,$city,$state,$country,$zip){
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(1)'))->click()->sendKeys($email);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(2)'))->click()->sendKeys($password);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(3)'))->click()->sendKeys($password);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(4)'))->click()->sendKeys($first);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(5)'))->click()->sendKeys($last);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(6)'))->click()->sendKeys($username);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(7)'))->click()->sendKeys($school);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(8)'))->click()->sendKeys($city);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(9)'))->click()->sendKeys($state);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(10)'))->click()->sendKeys($country);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form input.ws-input-1:nth-child(11)'))->click()->sendKeys($zip);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Teacher_Reg_Form p input'))->click();
        $webDriver->findElement(WebDriverBy::cssSelector('button.Btn_Save_Teacher'))->click();
    }

    public function requestReview($webDriver,$name,$email,$school,$city,$state,$country,$reason){
        ##todo
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('button.Btn_Request_Trial'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('#RequestTrial form input.ws-input-1:nth-child(1)'))->click()->sendKeys($name);
        $webDriver->findElement(WebDriverBy::cssSelector('#RequestTrial form input.ws-input-1:nth-child(2)'))->click()->sendKeys($email);
        $webDriver->findElement(WebDriverBy::cssSelector('input#request-trial-checkbox-1'))->click();
        $webDriver->findElement(WebDriverBy::cssSelector('input#request-trial-checkbox-1 + input'))->click()->sendKeys($school);
        //$webDriver->findElement(WebDriverBy::cssSelector('#RequestTrial form input.ws-input-1:nth-child(4)'))->click()->sendKeys($city);
        //$webDriver->findElement(WebDriverBy::cssSelector('#RequestTrial form input.ws-input-1:nth-child(5)'))->click()->sendKeys($state);
        //$webDriver->findElement(WebDriverBy::cssSelector('#RequestTrial form input.ws-input-1:nth-child(6)'))->click()->sendKeys($country);
        $webDriver->findElement(WebDriverBy::cssSelector('textarea.ws-textarea-1'))->click()->sendKeys($reason);
    }

}
?>