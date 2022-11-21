<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block;

use WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract\BlockInterface;

/**
 * Class BlockManager
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block
 */
class BlockManager implements BlockManagerInterface
{
    /**
     * @var array
     */
    protected array $blocks;

    /**
     * {@inheritDoc}
     */
    public function getBlocksByBlockName(string $blockName): ?array
    {
        return $this->blocks[$blockName] ?? null;
    }

    /**
     * {@inheritDoc}
     */
    public function registerBlockForName(string $blockName): bool
    {
        return isset($this->blocks[$blockName]);
    }

    /**
     * {@inheritDoc}
     */
    public function addBlock(BlockInterface $block): void
    {
        if (!isset($this->blocks[$block->getBlockName()][get_class($block)])) {
            $this->blocks[$block->getBlockName()][get_class($block)] = $block;

            $this->sortByPriority($this->blocks[$block->getBlockName()]);
        }
    }

    /**
     * @param array $array
     *
     * @return void
     */
    protected function sortByPriority(array &$array): void
    {
        uasort($array, static function (BlockInterface $a, BlockInterface $b) {
            if ($a->getPriority() === $b->getPriority()) {
                return 0;
            }

            return ($a->getPriority() > $b->getPriority()) ? -1 : 1;
        });
    }
}
