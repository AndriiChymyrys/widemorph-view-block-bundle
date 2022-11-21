<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract;

/**
 * Class AbstractBlock
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract
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
