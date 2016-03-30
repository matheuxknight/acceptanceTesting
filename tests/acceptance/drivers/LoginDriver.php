<?php
require_once '/../bootstrap.php';

class LoginDriver extends PHPUnit_Framework_TestCase {

    // Login Page URL
	protected $url = 'https://learningsite.waysidepublishing.com/';
    protected $webDriver;
	
	// Set up driver and classes
    public function setUp(){
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::firefox());
		$this->loginPage = new LoginPage();
        $this->registrationPage = new RegistrationPage();
        $this->passwordPage = new PasswordRecoveryPage();
        $this->dashboardPage = new DashboardPage();
    }
    
	// Quickly open up the login page and read the title to check server is up
	public function testServerUp(){
        $this->loginPage->open($this->webDriver,$this->url);
		$this->assertContains('Learning', $this->webDriver->getTitle());
	}

	// Test successful login
    public function testLogIn(){
		$this->loginPage->open($this->webDriver,$this->url);
		$this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
        sleep(2);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver,"div#Dashboard"));
    }

	// Test for successful log out after logging in
	public function testLogOut(){
		$this->loginPage->open($this->webDriver,$this->url);
		$this->loginPage->login($this->webDriver,'teacher1','test1234');
        $this->dashboardPage->removeWizard($this->webDriver);
		$this->dashboardPage->logout($this->webDriver);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver,"div.ws-login-container"));
    }

	// Test for failed login
	public function testFailedLogInWithGoodUsername(){
		$this->loginPage->open($this->webDriver,$this->url);
		$this->loginPage->login($this->webDriver,'teacher1','test');
        sleep(2);
        $this->assertEquals('Incorrect email or password. Attempts left:', substr($this->loginPage->affirmSampleMessage($this->webDriver),0,43));
	}

    // Test for error with username that is not in the system
    public function testFailedLogInWithBadUsername(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->login($this->webDriver,'teach','test');
        sleep(2);
        $this->assertEquals('Incorrect email or password', $this->loginPage->affirmSampleMessage($this->webDriver));
    }

    //Test Sample Login
    public function testSampleLogin(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->selectSample($this->webDriver);
        $this->dashboardPage->removeWizard($this->webDriver);
        sleep(2);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver,"div#Dashboard"));
    }

    // Test for successful email to user for password reset
    public function testSuccessfulPasswordReset(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->passwordReset($this->webDriver,'test@test.com');
        sleep(8);
        $this->assertEquals('Message with further information was sent to your email.', $this->loginPage->affirmSampleMessage($this->webDriver));
    }

    // Test for failed email to user for password reset (username/email does not exist in system)
    public function testFailedPasswordReset(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->passwordReset($this->webDriver,'badtester@test.com');
        sleep(6);
        $this->assertEquals('User with email badtester@test.com not found', $this->loginPage->affirmSampleMessage($this->webDriver));
    }

    //Test successful student account creation
    public function testStudentCreateAccountSuccess(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->selectRegistration($this->webDriver,"student");
        $this->registrationPage->registerStudentAccount($this->webDriver,"imatester@tester4life.com","iliketurtles","Vinny","TESTaverde","studenttester");
        sleep(2);
        $this->assertEquals('Successfully registered. You can now login.', $this->loginPage->affirmSampleMessage($this->webDriver));
        $this->loginPage->login($this->webDriver,'studenttester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        sleep(2);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver,"div#Dashboard"));
    }

    //Test failed student account creation
    public function testStudentCreateAccountFailed(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->selectRegistration($this->webDriver,"student");
        $this->registrationPage->registerStudentAccount($this->webDriver,"imatester@tester4life.com","iliketurtles","Vinny","TESTaverde","studenttester");
        sleep(2);
        $this->assertEquals('Email already registered', $this->loginPage->affirmSampleMessage($this->webDriver));
    }

	//Test successful teacher account creation
    public function testTeacherCreateAccountSuccess(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->selectRegistration($this->webDriver,"teacher");
        $this->registrationPage->registerTeacherAccount($this->webDriver,"imateachertester@tester4life.com",
            "iliketurtles","Vinny","TESTaverde","teachertester","test school","test city","testachusetts","USA","11111");
        sleep(2);
        $this->assertEquals('Successfully registered. You can now login.', $this->loginPage->affirmSampleMessage($this->webDriver));
        $this->loginPage->login($this->webDriver,'teachertester','iliketurtles');
        $this->dashboardPage->removeWizard($this->webDriver);
        sleep(2);
        $this->assertEquals('visible', $this->dashboardPage->affirmVisibility($this->webDriver,"div#Dashboard"));
    }

    //Test failed teacher account creation
    public function testTeacherCreateAccountFailed(){
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->selectRegistration($this->webDriver,"teacher");
        $this->registrationPage->registerTeacherAccount($this->webDriver,"imateachertester@tester4life.com",
            "iliketurtles","Vinny","TESTaverde","teachertester","test school","test city","testachusetts","USA","11111");
        sleep(2);
        $this->assertEquals('Email already registered', $this->loginPage->affirmSampleMessage($this->webDriver));
    }

    /*
    //Test Review Request Success
    public function testReviewRequestSuccess(){
        ##toDo
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->selectRequest($this->webDriver);
        $this->registrationPage->requestReview($this->webDriver,"Testing User","testingtester@test.com","Test School","Test City","Testachusetts","TESTUSA","I just love reviews!");
        sleep(2);
        $this->assertEquals('Email already registered', $this->loginPage->affirmSampleMessage($this->webDriver));
    }

    //Test Review Request Failure
    public function testReviewRequestFailed(){
        ##toDo
        $this->loginPage->open($this->webDriver,$this->url);
        $this->loginPage->selectRequest($this->webDriver);
        $this->registrationPage->requestReview($this->webDriver,$username,$password,$role,$email,$etc,false);
    }*/

	// Tear down browser after each test
	public function tearDown(){
        $this->webDriver->quit();
    }

}
?>