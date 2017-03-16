<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new FOS\HttpCacheBundle\FOSHttpCacheBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),

            new OpenOrchestra\BaseBundle\OpenOrchestraBaseBundle(),
            new OpenOrchestra\ModelBundle\OpenOrchestraModelBundle(),
            new OpenOrchestra\MongoBundle\OpenOrchestraMongoBundle(),
            new OpenOrchestra\MediaBundle\OpenOrchestraMediaBundle(),
            new OpenOrchestra\MediaModelBundle\OpenOrchestraMediaModelBundle(),
            new OpenOrchestra\DisplayBundle\OpenOrchestraDisplayBundle(),
            new OpenOrchestra\BBcodeBundle\OpenOrchestraBBcodeBundle(),
            new OpenOrchestra\FrontBundle\OpenOrchestraFrontBundle(),

            new Solution\MongoAggregationBundle\SolutionMongoAggregationBundle(),
            new Gregwar\CaptchaBundle\GregwarCaptchaBundle(),
            new OpenOrchestra\ElasticaBundle\OpenOrchestraElasticaBundle(),
            new OpenOrchestra\ElasticaFrontBundle\OpenOrchestraElasticaFrontBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
