<?php

namespace FormationBundle\DisplayBlock\Strategies;

use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\AbstractStrategy;
use OpenOrchestra\ModelInterface\Model\ReadBlockInterface;

/**
 * Class HelloStrategy
 */
class HelloStrategy extends AbstractStrategy
{
    const NAME = 'hello';

    public function support(ReadBlockInterface $block)
    {
        return self::NAME === $block->getComponent();
    }

    /**+
     * @param ReadBlockInterface $block
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show(ReadBlockInterface $block)
    {
        return $this->render('FormationBundle:Block\hello:show.html.twig', array(
            'name' => $block->getAttribute('name'),
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param ReadBlockInterface $block
     *
     * @return array
     */
    public function getCacheTags(ReadBlockInterface $block)
    {
        return array();
    }
}