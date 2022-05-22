<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction;

use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block\BlockManagerInterface;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Handler\BlockRenderEventHandlerInterface;

/**
 * Class DomainInteraction
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction
 */
class DomainInteraction implements DomainInteractionInterface
{
    /**
     * @param BlockRenderEventHandlerInterface $blockRenderEventHandler
     * @param BlockManagerInterface $blockManager
     */
    public function __construct(
        protected BlockRenderEventHandlerInterface $blockRenderEventHandler,
        protected BlockManagerInterface $blockManager
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockRenderEventHandler(): BlockRenderEventHandlerInterface
    {
        return $this->blockRenderEventHandler;
    }

    /**
     * {@inheritDoc}
     */
    public function getBlockManager(): BlockManagerInterface
    {
        return $this->blockManager;
    }
}
