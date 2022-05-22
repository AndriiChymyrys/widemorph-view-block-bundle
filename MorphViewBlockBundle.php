<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\DependencyInjection\Compiler\BlockCompilerPass;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\DependencyInjection\MorphViewBlockExtension;

/**
 * Class MorphViewBlockBundle
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle
 */
class MorphViewBlockBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new BlockCompilerPass());
    }

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new MorphViewBlockExtension();
    }
}
