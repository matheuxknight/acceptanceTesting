<?php
require_once '/../bootstrap.php';

class DashboardDriver extends PHPUnit_Framework_TestCase {
    /**
     * @var \RemoteWebDriver
     */

    protected $webDriver;
    protected $url = 'https://learningsite.waysidepublishing.com/dashboard';

    // Set up driver and classes
    public function setUp(){
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::firefox());
        $this->loginPage = new LoginPage();
        $this->dashboardPage = new DashboardPage();
        $this->accountPage = new AccountPage();
        $this->helpPage = new FAQPage();
        $this->notification = new NotificationPage();
    }
    /*
    public function testDashboardUp(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        sleep(1);
        $this->assertEquals('Welcome to the Wayside Publishing Learning Site!', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testCourseElement(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->selectCourse($this->webDriver,'dfdsfds');
        sleep(2);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver, "div#Course"));
    }

    public function testCourseCreationSuccess(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teachertester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->createCourse($this->webDriver,"Acceptance Test Course","03/01/2016");
        sleep(2);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver, "div#Course"));
    }

    public function testCourseCreationFailure(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teachertester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->createCourse($this->webDriver,"Acceptance Test Course","03/01/2016");
        sleep(2);
        $this->assertEquals('Another teacher has already used this course name. Please choose a different course name', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testCourseManualEnrollmentSuccess(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'studenttester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->courseEnroll($this->webDriver,'Acceptance Test Course','0000-0000-0003-0053');
        sleep(2);
        $this->assertEquals('You were successfully enrolled into a course.', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testCourseManualEnrollmentDupe(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'studenttester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->courseEnroll($this->webDriver,'Acceptance Test Course','0000-0000-0003-0054');
        sleep(2);
        $this->assertEquals('Seems like you already enrolled into this course.', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testSACFailure(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'studenttester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->sacInvalid($this->webDriver,'0000-0001-0003-0053');
        sleep(2);
        $this->assertEquals('Code is not valid. Please, try again', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testCourseInviteSuccess(){
        $this->loginPage->open($this->webDriver,$this->url);
        //$this->loginPage->login($this->webDriver,'teachertester','iliketurtles');
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        //$this->coursesPage->selectCourse($this->webDriver, 'Acceptance Test Course');
        $this->dashboardPage->selectCourse($this->webDriver, 'dfdsfds');
        //$this->coursePage->inviteStudent($this->webDriver, 'imatester@tester4life.com');
        $this->coursePage->inviteStudent($this->webDriver, 'student1@test.com');
        sleep(8);
        $this->assertEquals('Invites were sent!', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testCourseInviteFailure(){
        $this->loginPage->open($this->webDriver,$this->url);
        //$this->loginPage->login($this->webDriver,'teachertester','iliketurtles');
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        //$this->coursesPage->selectCourse($this->webDriver, 'Acceptance Test Course');
        $this->dashboardPage->selectCourse($this->webDriver, 'dfdsfds');
        //$this->coursePage->inviteStudent($this->webDriver, 'imatester@tester4life.com');
        $this->coursePage->inviteStudent($this->webDriver, 'student1@test.com');
        sleep(2);
        $this->assertEquals('Invites was not sent', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testCourseInviteEnrollmentSuccess(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'student1','test1234');
        //$this->loginPage->login($this->webDriver,'studenttester2','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->acceptCourseInvite($this->webDriver,"HC Test Course",'0000-0000-0002-0054');
        //$this->dashboardPage->acceptCourseInvite($this->webDriver,"Acceptance Test Course",'0000-0000-0003-0054');
        sleep(2);
        $this->assertEquals('Invite Accepted!', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testCourseInviteEnrollmentFailure(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'student1','test1234');
        //$this->loginPage->login($this->webDriver,'studenttester2','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->acceptCourseInvite($this->webDriver,"HC Test Course",'123');
        //$this->dashboardPage->acceptCourseInvite($this->webDriver,"Acceptance Test Course",'123');
        sleep(2);
        $this->assertEquals('Code is not valid. Please, try again', $this->dashboardPage->affirmSampleMessage($this->webDriver));
        $this->dashboardPage->acceptCourseInvite($this->webDriver,"HC Test Course",'0000-0000-0002-0054');
        //$this->dashboardPage->acceptCourseInvite($this->webDriver,"Acceptance Test Course",'0000-0000-0002-0054');
        sleep(2);
        $this->assertEquals('Code is not valid. Please, try again', $this->dashboardPage->affirmSampleMessage($this->webDriver));
        $this->dashboardPage->acceptCourseInvite($this->webDriver,"HC Test Course",'0000-0000-0003-0054');
        //$this->dashboardPage->acceptCourseInvite($this->webDriver,"Acceptance Test Course",'0000-0000-0003-0054');
        sleep(2);
        $this->assertEquals('Current code is from another textbook and not valid for current course.', $this->dashboardPage->affirmSampleMessage($this->webDriver));
    }

    public function testWizard(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'student1','test1234');
        sleep(2);
        $this->dashboardPage->removeWizard($this->webDriver);
    }

    public function testFAQPage(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->selectFAQ($this->webDriver);
    }

    public function testAccountPage(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        //$this->loginPage->login($this->webDriver,'studenttester','iliketurtles');
        $this->dashboardPage->selectAccount($this->webDriver);
        sleep(2);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver, "div#Profile"));
    }

    public function testProfileChangesSuccess(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        //$this->loginPage->login($this->webDriver,'studenttester','iliketurtles');
        $this->dashboardPage->selectAccount($this->webDriver);
        $this->accountPage->editAccount($this->webDriver, "John", "Doe", "JohnDoe@test.com");
        sleep(2);
        $this->assertEquals('Profile successfully updated', $this->accountPage->affirmSampleMessage($this->webDriver));
        $this->webDriver->navigate()->refresh();
        sleep(2);
        $this->assertEquals('John', $this->accountPage->getInputValue($this->webDriver,2));
        $this->assertEquals('Doe', $this->accountPage->getInputValue($this->webDriver,3));
        $this->assertEquals('JohnDoe@test.com', $this->accountPage->getInputValue($this->webDriver,6));
    }

    public function testProfileChangesFailure(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        //$this->loginPage->login($this->webDriver,'studenttester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->selectAccount($this->webDriver);
        $this->accountPage->editAccount($this->webDriver, "Jane", "Fields", "");
        sleep(2);
        $this->assertEquals('Empty mandatory field [ email ] fieldname=email', $this->accountPage->affirmSampleMessage($this->webDriver));
        $this->accountPage->editAccount($this->webDriver, "Jane", "Fields", "student1@test.com");
        sleep(2);
        $this->assertEquals('Email already registered', $this->accountPage->affirmSampleMessage($this->webDriver));
        $this->webDriver->navigate()->refresh();
        sleep(2);
        $this->assertEquals('teacher1', $this->accountPage->getInputValue($this->webDriver,2));
        $this->assertEquals('', $this->accountPage->getInputValue($this->webDriver,3));
        $this->assertEquals('teacher1@test.com', $this->accountPage->getInputValue($this->webDriver,6));
    }

    public function testAvatarChange(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->selectAccount($this->webDriver);
        $this->accountPage->changeAvatar($this->webDriver);
        sleep(2);
    }*/

    public function testNotifications(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->openNotificationWidget($this->webDriver);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver, "body.ws-notifications-panel-visible"));
        //$this->dashboardPage->viewAllNotifications($this->webDriver);
        //$this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver, "div#Notifications"));
        //$this->accountPage->editAccount($this->webDriver,$x,$y,$z);
        //$this->accountPage->saveChanges($this->webDriver, true);
    }

    public function testIOSLink(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        $this->dashboardPage->selectIOS($this->webDriver);
        sleep(2);
    }


    // Tear down browser after each test
    public function tearDown()
    {
        $this->webDriver->quit();
    }

}
?>