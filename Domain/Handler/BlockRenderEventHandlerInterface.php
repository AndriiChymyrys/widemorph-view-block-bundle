<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Handler;

use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Event\BlockRenderEvent;

/**
 * Class BlockRenderEventHandlerInterface
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Handler
 */
interface BlockRenderEventHandlerInterface
{
    /**
     * @param BlockRenderEvent $event
     *
     * @return void
     */
    public function handle(BlockRenderEvent $event): void;
}
