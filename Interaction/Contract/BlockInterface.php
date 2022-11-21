<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract;

/**
 * Class BlockInterface
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract
 */
interface BlockInterface
{
    /** @var string */
    public const SERVICE_TAG_NAME = 'morph.view.block';

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
