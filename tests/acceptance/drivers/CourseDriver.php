<?php
require_once '/../bootstrap.php';

class CourseDriver extends PHPUnit_Framework_TestCase{

    // Login Page URL
    protected $url = 'http://localhost:5555';
    protected $webDriver;

    // Set up driver and classes
    public function setUp()
    {
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', DesiredCapabilities::firefox());
        $this->loginPage = new LoginPage();
        $this->coursePage = new CoursePage();
    }
}
?>