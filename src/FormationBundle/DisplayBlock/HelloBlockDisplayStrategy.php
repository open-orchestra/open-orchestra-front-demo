<?php

namespace FormationBundle\DisplayBlock;

use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\AbstractStrategy;
use OpenOrchestra\ModelInterface\Model\ReadBlockInterface;
use OpenOrchestra\ModelInterface\Repository\ContentRepositoryInterface;

class HelloBlockDisplayStrategy extends AbstractStrategy
{
    const BLOCK_NAME = "hello";

    protected $contentRepository;

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function support(ReadBlockInterface $block)
    {
        return $block->getComponent() === self::BLOCK_NAME;
    }

    public function show(ReadBlockInterface $block)
    {
        $language = $this->currentSiteManager->getCurrentSiteDefaultLanguage();
        $contents = $this->contentRepository->findByContentTypeAndCondition($language, 'car');

        return $this->render('FormationBundle:Block/Hello:hello_display_block.html.twig', array(
            'name' => $block->getAttribute('name'),
            'contents' => $contents
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