<?php

namespace FormationBundle\DisplayBlock\Strategies;

use OpenOrchestra\DisplayBundle\DisplayBlock\Strategies\AbstractStrategy;
use OpenOrchestra\DisplayBundle\Exception\ContentNotFoundException;
use OpenOrchestra\ModelInterface\Model\ContentInterface;
use OpenOrchestra\ModelInterface\Model\ReadBlockInterface;
use OpenOrchestra\ModelInterface\Repository\ContentRepositoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class HelloStrategy
 */
class HelloStrategy extends AbstractStrategy
{
    const NAME = 'hello';

    /** @var  RequestStack */
    protected $requestStack;

    /** @var  ContentRepositoryInterface */
    protected $contentRepository;

    /**
     * @param RequestStack $requestStack
     * @param ContentRepositoryInterface $contentRepository
     */
    public function __construct(RequestStack $requestStack, ContentRepositoryInterface $contentRepository)
    {
        $this->requestStack = $requestStack;
        $this->contentRepository = $contentRepository;
    }

    /**
     * @param ReadBlockInterface $block
     *
     * @return bool
     */
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
        $contentId = $this->requestStack->getCurrentRequest()->get('contentId');
        $content = $this->contentRepository->findOneByContentId($contentId);
        if (!$content instanceof ContentInterface) {
            throw new ContentNotFoundException();
        }
        return $this->render('FormationBundle:Block\hello:show.html.twig', array(
            'content' => $content
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