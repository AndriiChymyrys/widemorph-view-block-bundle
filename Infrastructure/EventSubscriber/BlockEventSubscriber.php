<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Event\BlockRenderEvent;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\DomainInteractionInterface;

/**
 * Class BlockEventSubscriber
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\EventSubscriber
 */
class BlockEventSubscriber implements EventSubscriberInterface
{
    /**
     * @param DomainInteractionInterface $domainInteraction
     */
    public function __construct(protected DomainInteractionInterface $domainInteraction)
    {
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            BlockRenderEvent::class => 'onBlockRenderEvent'
        ];
    }

    /**
     * @param BlockRenderEvent $event
     *
     * @return void
     */
    public function onBlockRenderEvent(BlockRenderEvent $event): void
    {
        $this->domainInteraction->getBlockRenderEventHandler()->handle($event);
    }
}
