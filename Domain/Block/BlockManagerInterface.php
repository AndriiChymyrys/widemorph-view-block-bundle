<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block;

use WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract\BlockInterface;

/**
 * Class BlockManagerInterface
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block
 */
interface BlockManagerInterface
{
    /**
     * @param string $blockName
     *
     * @return array|null
     */
    public function getBlocksByBlockName(string $blockName): ?array;

    /**
     * @param string $blockName
     *
     * @return bool
     */
    public function registerBlockForName(string $blockName): bool;

    /**
     * @param BlockInterface $block
     *
     * @return void
     */
    public function addBlock(BlockInterface $block): void;
}
