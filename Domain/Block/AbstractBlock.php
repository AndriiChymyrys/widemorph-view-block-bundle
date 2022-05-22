<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block;

/**
 * Class AbstractBlock
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block
 */
abstract class AbstractBlock implements BlockInterface
{
    /**
     * {@inheritDoc}
     */
    public function execute(?array $options = []): array
    {
        return $options;
    }
}
