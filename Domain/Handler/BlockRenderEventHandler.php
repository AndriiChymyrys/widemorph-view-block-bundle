<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Handler;

use Twig\Environment;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block\BlockManagerInterface;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Event\BlockRenderEvent;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract\BlockInterface;

/**
 * Class BlockRenderEventHandler
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Handler
 */
class BlockRenderEventHandler implements BlockRenderEventHandlerInterface
{
    /**
     * @param BlockManagerInterface $blockManager
     * @param Environment $twig
     */
    public function __construct(protected BlockManagerInterface $blockManager, protected Environment $twig)
    {
    }

    /**
     * {@inheritDoc}
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function handle(BlockRenderEvent $event): void
    {
        $blocks = $this->blockManager->getBlocksByBlockName($event->getBlockName());

        $content = '';

        if ($blocks) {
            /** @var BlockInterface $block */
            foreach ($blocks as $block) {
                $blockOptions = $block->execute($event->getOptions());
                $content .= $this->twig->render($block->getTemplatePath(), $blockOptions);
            }
        }

        $event->setContent($content);
    }
}
