<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Event\BlockRenderEvent;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\DomainInteractionInterface;

/**
 * Class BlockExtension
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\Twig
 */
class BlockExtension extends AbstractExtension
{
    /**
     * @param EventDispatcherInterface $eventDispatcher
     * @param DomainInteractionInterface $domainInteraction
     */
    public function __construct(
        protected EventDispatcherInterface $eventDispatcher,
        protected DomainInteractionInterface $domainInteraction
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('morph_block_render', [$this, 'blockRender'], ['is_safe' => ['all']]),
        ];
    }

    /**
     * @param string $blockName
     * @param array|null $options
     *
     * @return string
     */
    public function blockRender(string $blockName, ?array $options = []): string
    {
        if (!$this->domainInteraction->getBlockManager()->registerBlockForName($blockName)) {
            // Do not dispatch event when there is no block registered for $blockName
            return '';
        }

        /** @var BlockRenderEvent $event */
        $event = $this->eventDispatcher->dispatch(new BlockRenderEvent($blockName, $options));

        return $event->getContent();
    }
}
