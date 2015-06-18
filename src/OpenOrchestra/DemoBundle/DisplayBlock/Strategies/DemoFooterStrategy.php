<?php

namespace OpenOrchestra\DemoBundle\DisplayBlock\Strategies;

use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\FooterStrategy;
use OpenOrchestra\ModelInterface\Model\ReadBlockInterface;

/**
 * Class DemoFooterStrategy
 */
class DemoFooterStrategy extends FooterStrategy
{
    /**
     * {@inheritdoc}
     */
    public function show(ReadBlockInterface $block)
    {
        $nodes = $this->getNodes();

        return $this->render(
            'OpenOrchestraDemoBundle:Block/Footer:show.html.twig',
            array(
                'tree' => $nodes,
                'id' => $block->getId(),
                'class' => $block->getClass(),
            )
        );
    }

}