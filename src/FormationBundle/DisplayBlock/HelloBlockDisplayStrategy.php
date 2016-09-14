<?php

namespace FormationBundle\DisplayBlock;

use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\AbstractStrategy;
use OpenOrchestra\ModelInterface\Model\ReadBlockInterface;

class HelloBlockDisplayStrategy extends AbstractStrategy
{
    const BLOCK_NAME = "hello";

    public function support(ReadBlockInterface $block)
    {
        return $block->getComponent() === self::BLOCK_NAME;
    }

    public function show(ReadBlockInterface $block)
    {
        return $this->render('FormationBundle:Block/Hello:hello_display_block.html.twig', array(
            'name' => $block->getAttribute('name')
        ));
    }

    public function getName()
    {
        return self::BLOCK_NAME;
    }

    public function getCacheTags(ReadBlockInterface $block)
    {
        return array();
    }
}