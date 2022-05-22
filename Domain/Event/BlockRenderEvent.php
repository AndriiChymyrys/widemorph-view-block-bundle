<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class RenderBlockEvent
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Event
 */
class BlockRenderEvent extends Event
{
    protected string $content = '';

    /**
     * @param string $blockName
     * @param array|null $options
     */
    public function __construct(protected string $blockName, protected ?array $options = [])
    {
    }

    /**
     * @return string
     */
    public function getBlockName(): string
    {
        return $this->blockName;
    }

    /**
     * @return array|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
