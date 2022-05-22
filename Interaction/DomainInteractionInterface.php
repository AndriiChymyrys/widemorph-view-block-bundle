<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction;

use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block\BlockManagerInterface;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Handler\BlockRenderEventHandlerInterface;

/**
 * Class DomainInteractionInterface
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction
 */
interface DomainInteractionInterface
{
    /**
     * @return BlockRenderEventHandlerInterface
     */
    public function getBlockRenderEventHandler(): BlockRenderEventHandlerInterface;

    /**
     * @return BlockManagerInterface
     */
    public function getBlockManager(): BlockManagerInterface;
}
