<?php

namespace OpenOrchestra\FuntionalTests\FrontBundle\Command;

use OpenOrchestra\FrontBundle\Command\OrchestraGenerateSitemapCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use OpenOrchestra\BaseBundle\Tests\AbstractTest\AbstractWebTestCase;

/**
 * Class OrchestraGenerateSiteMapsCommandTest
 */
class OrchestraGenerateSiteMapsCommandTest extends AbstractWebTestCase
{
    protected $application;

    /**
     * Set Up
     */
    public function setUp()
    {
        $client = self::createClient();
        $this->application = new Application($client->getKernel());
        $this->application->setAutoExit(false);
        $this->application->add(new OrchestraGenerateSitemapCommand());
    }

    /**
     * Test the command
     *
     * @param string $siteId
     *
     * @dataProvider provideSiteAlias
     */
    public function testExecute($siteId)
    {
        $command = $this->application->find('orchestra:sitemaps:generate');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));

        $site = static::$kernel->getContainer()->get('open_orchestra_model.repository.site')->findOneBySiteId($siteId);
        $mainAlias = $site->getMainAlias();
        $regex  = "/Generating sitemap for siteId ".$siteId." with alias ".$mainAlias->getScheme().":\\/\\/".$mainAlias->getDomain()."/";

        $this->assertRegExp(
            $regex,
            $commandTester->getDisplay()
        );
        $this->assertRegExp(
            '/-> '.$siteId.'\\/sitemap.xml generated/',
            $commandTester->getDisplay()
        );

        $this->assertRegExp('/Done./', $commandTester->getDisplay());
    }

    /**
     * Provide sites aliases
     */
    public function provideSiteAlias()
    {
        return array(
            array('2'),
        );
    }
}
