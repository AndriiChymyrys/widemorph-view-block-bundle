<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block;

/**
 * Class BlockInterface
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block
 */
interface BlockInterface
{
    /**
     * @return int
     */
    public function getPriority(): int;

    /**
     * @return string
     */
    public function getBlockName(): string;

    /**
     * @return string
     */
    public function getTemplatePath(): string;

    /**
     * @param array|null $options
     *
     * @return array
     */
    public function execute(?array $options = []): array;
}
