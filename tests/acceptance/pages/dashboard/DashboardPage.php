<?php

class DashboardPage{

    public function open($webDriver, $url){
        $webDriver->get($url);
    }

    public function removeWizard($webDriver){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('a.introjs-skipbutton'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('a.introjs-skipbutton'))->click();
    }

    public function createCourse($webDriver,$courseName,$date){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Dashboard a.Btn_Textbooks'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div#Dashboard a.Btn_Textbooks'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Textbooks div.ws-courses-item:nth-child(3) div.Btn_Create_Course'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div#Textbooks div.ws-courses-item:nth-child(3) div.Btn_Create_Course'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Create_Course_Form div:nth-child(1)'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Create_Course_Form div:nth-child(1) input.ws-input-1'))->click()->sendKeys($courseName);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Create_Course_Form div:nth-child(2) input.datepicker'))->click()->sendKeys($date);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Create_Course_Form div:nth-child(1) input.ws-input-1'))->click();
        $webDriver->findElement(WebDriverBy::cssSelector('form.Create_Course_Form p input'))->click()->click();
        $webDriver->findElement(WebDriverBy::cssSelector('button.Btn_Save_Course'))->click();
    }

    public function courseEnroll($webDriver,$courseName,$sac){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Dashboard a.Btn_Enroll_Course'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div#Dashboard a.Btn_Enroll_Course'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Validate_Sac_Form div:nth-child(1) input.ws-input-2'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Validate_Sac_Form div:nth-child(1) input.ws-input-2'))->click()->sendKeys($sac);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Validate_Sac_Form button.Btn_Validate_Code'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Validate_Sac_Form div:nth-child(2) input.ws-input-2'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Validate_Sac_Form div:nth-child(2) input.ws-input-2'))->click()->sendKeys($courseName);
        $webDriver->findElement(WebDriverBy::cssSelector('div.Enroll_Courses_Block button.Btn_Validate_Code'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div.Enroll_Courses div:nth-child(1) a.Btn_Enroll'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div.Enroll_Courses div:nth-child(1) a.Btn_Enroll'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Enroll_Confirm_Form button.Btn_Enroll_Confirm'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Enroll_Confirm_Form button.Btn_Enroll_Confirm'))->click();
    }

    public function sacInvalid($webDriver,$sac){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Dashboard a.Btn_Enroll_Course'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div#Dashboard a.Btn_Enroll_Course'))->click();
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('form.Validate_Sac_Form div:nth-child(1) input.ws-input-2'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('form.Validate_Sac_Form div:nth-child(1) input.ws-input-2'))->click()->sendKeys($sac);
        $webDriver->findElement(WebDriverBy::cssSelector('form.Validate_Sac_Form button.Btn_Validate_Code'))->click();
    }

    public function selectCourse($webDriver,$course){
        $webDriver->wait(15, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div.Dashboard_Courses div.ws-courses-item:nth-child(1)'))
        );
        $webDriver->findElement(WebDriverBy::partialLinkText($course))->click();
    }

    public function selectAccount($webDriver){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('a#Btn_Profile'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('a#Btn_Profile'))->click();
    }

    public function selectFAQ($webDriver){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::partialLinkText('FAQ'))
        );
        $webDriver->findElement(WebDriverBy::partialLinkText('FAQ'))->click();
    }

    public function selectIOS($webDriver){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::partialLinkText('APP'))
        );
        $webDriver->findElement(WebDriverBy::partialLinkText('APP'))->click();
    }

    public function openNotificationWidget($webDriver){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Btn_Notifications'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div#Btn_Notifications'))->click();
    }

    public function viewAllNotifications($webDriver){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('a.Btn_View_All_Notifications'))
        );
        $webDriver->findElement(WebDriverBy::cssSelector('div#Notifications_Panel a.Btn_View_All_Notifications'))->click();;
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::cssSelector('div#Notifications'))
        );
    }

    public function acceptCourseInvite($webDriver,$course,$sac){
        $i = 1;
        while($webDriver->findElement(WebDriverBy::cssSelector('div.To_Me_Invites div.ws-dashboard-invite:nth-child('. $i . ') span:nth-child(2)'))->getText() != $course){
            $i++;
        }
        $webDriver->findElement(WebDriverBy::cssSelector('div.To_Me_Invites div.ws-dashboard-invite:nth-child('. $i . ') input.ws-input-2'))->click()->clear()->sendKeys($sac);
        $webDriver->findElement(WebDriverBy::cssSelector('div.To_Me_Invites div.ws-dashboard-invite:nth-child('. $i . ') div.Btn_Accept_Invite'))->click();
        return $webDriver->findElement(WebDriverBy::cssSelector('div.To_Me_Invites div.ws-dashboard-invite:nth-child('. $i . ') span:nth-child(2)'))->getText();
    }

    public function affirmSampleMessage($webDriver){
        $content = $webDriver->findElement(WebDriverBy::cssSelector('div#Message_Box'))->getText();
        return $content;
    }

    public function affirmVisibility($webDriver,$element){
        $visibility = $webDriver->findElement(WebDriverBy::cssSelector($element));
        if($visibility->isDisplayed())
            return "visible";
        return "not visible";
    }

    public function logout($webDriver){
        $webDriver->wait(10, 1000)->until(
            WebDriverExpectedCondition::elementToBeClickable(WebDriverBy::linkText('Logout'))
        );
        $webDriver->findElement(WebDriverBy::linkText('Logout'))->click();
    }
}
?>