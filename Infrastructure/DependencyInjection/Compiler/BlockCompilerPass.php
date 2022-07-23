<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Domain\Block\BlockManager;

/**
 * Class BlockCompilerPass
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\DependencyInjection\Compiler
 */
class BlockCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $blockManager = $container->getDefinition(BlockManager::class);

        // TODO: Add BlockInterface to autoconfigure
        foreach ($container->findTaggedServiceIds('morph.view.block') as $id => $tags) {
            $blockManager->addMethodCall('addBlock', [$container->getDefinition($id)]);
        }
    }
}
