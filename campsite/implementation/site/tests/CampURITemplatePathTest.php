<?php
// Call CampURITemplatePathTest::main() if this source file is executed directly.
if (!defined("PHPUnit_MAIN_METHOD")) {
    define("PHPUnit_MAIN_METHOD", "CampURITemplatePathTest::main");
}

require_once('PHPUnit/Framework/TestCase.php');
require_once('PHPUnit/Framework/TestSuite.php');

require_once('template_engine/classes/CampURITemplatePath.php');

require_once('set_path.php');

/**
 * Test class for CampURITemplatePath.
 * Generated by PHPUnit_Util_Skeleton on 2007-07-02 at 13:27:00.
 */
class CampURITemplatePathTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var object
     */
    protected $m_uri = null;

    /**
     * Runs the test methods of this class.
     *
     * @access public
     * @static
     */
    public static function main()
    {
        require_once('PHPUnit/TextUI/TestRunner.php');

        $suite  = new PHPUnit_Framework_TestSuite('CampURITemplatePathTest');
        $result = PHPUnit_TextUI_TestRunner::run($suite);
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @access protected
     */
    protected function setUp()
   	{
        $uri = 'http://campsite.localhost.localdomain/look/article.tpl?IdPublication=1&IdLanguage=1&NrIssue=1&NrSection=40&NrArticle=43';
        $this->m_uri = CampURITemplatePath::singleton($uri);
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     *
     * @access protected
     */
    protected function tearDown()
    {
    }

    public function testBuildURI()
    {
    	$this->assertEquals('/look/article.tpl?IdPublication=1&IdLanguage=1&NrIssue=1&NrSection=40&NrArticle=43', $this->m_uri->buildURI());
    }
    
    public function testGetHost()
    {
        $this->assertEquals('campsite.localhost.localdomain', $this->m_uri->getHost());
    }
    
    public function testGetRequestURI()
    {
        $this->assertEquals('/look/article.tpl?IdPublication=1&IdLanguage=1&NrIssue=1&NrSection=40&NrArticle=43', $this->m_uri->getRequestURI());
    }
    
    public function testGetTemplate()
    {
        $this->assertEquals('article.tpl', $this->m_uri->getTemplate());
    }

    public function testIsValidTemplate()
    {
        $this->assertEquals(true, $this->m_uri->isValidTemplate('article.tpl'));
    }

    public function testGetLanguageId()
    {
        $this->assertEquals(1, $this->m_uri->getQueryVar('IdLanguage'));
    }

    public function testGetPublicationId()
    {
        $this->assertEquals(1, $this->m_uri->getQueryVar('IdPublication'));
    }

    public function testGetIssueNumber()
    {
        $this->assertEquals(1, $this->m_uri->getQueryVar('NrIssue'));
    }
    
    public function testGetSectionNumber()
    {
        $this->assertEquals(40, $this->m_uri->getQueryVar('NrSection'));
    }
    
    public function testGetArticleNumber()
    {
        $this->assertEquals(43, $this->m_uri->getQueryVar('NrArticle'));
    }
}

// Call CampURITemplatePathTest::main() if this source file is executed directly.
if (PHPUnit_MAIN_METHOD == "CampURITemplatePathTest::main") {
    CampURITemplatePathTest::main();
}
?>