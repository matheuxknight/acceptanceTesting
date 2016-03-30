<?php

class CoursePage {

    public function affirmContainsElements($webDriver){
        ##todo verify that the elements on the page exist on course page
    }

    public function affirmCourseExpired($webDriver){
        ##todo affirm that message about course expiration exists
        ##todo navigate to grades
        ##todo attempt to change grades
        ##todo affirm grades cannot be changed
    }

    public function inviteStudent($webDriver,$email){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::partialLinkText('Students'))
        );
        $webDriver->findElement(WebDriverBy::partialLinkText('Students'))->click();
        $webDriver->wait(10, 1500)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div.Btn_Invite_Block'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div.Btn_Invite_Block'))->click();
        $webDriver->wait(10, 1500)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Create_Invite_Form div.ws-input-group-1 input.ws-input-1'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Create_Invite_Form div.ws-input-group-1 input.ws-input-1'))->click()->sendKeys($email);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Create_Invite_Form button.Btn_Create_Invite'))->click();
    }

    public function affirmAudioResource($webDriver){
        #todo click on resources
        #todo navigate to audio
        #todo affirm audio exists on page
    }

    public function affirmPDFResource($webDriver){
    #todo click on resources
        #todo navigate to pdf
        #todo affirm pdf exists on page
    }

    public function affirmExternalResource($webDriver){
        #todo click on resources
        #todo navigate to external link
        #todo affirm external link exists on page
    }

    public function affirmResource($webDriver){
        #todo click on resources
        #todo navigate to whichever other resources we need
        #todo affirm resource exists on page
    }


    public function selectCourseTab($webDriver){
        $search = $webDriver->findElement(WebDriverBy::linkText('Course'));
        $search->click();
    }

    public function selectGradesTab($webDriver){
        $search = $webDriver->findElement(WebDriverBy::linkText('Grades'));
        $search->click();
    }

    public function selectStudentsTab($webDriver){
        $search = $webDriver->findElement(WebDriverBy::linkText('Students'));
        $search->click();
    }

    public function selectCourseSettings($webDriver){
        $search = $webDriver->findElement(WebDriverBy::linkText('##todo get link for settings'));
        $search->click();
    }

    public function affirmSampleMessage($webDriver){
        $content = $webDriver->findElement(WebDriverBy::cssSelector('div#Message_Box'))->getText();
        return $content;
    }

}