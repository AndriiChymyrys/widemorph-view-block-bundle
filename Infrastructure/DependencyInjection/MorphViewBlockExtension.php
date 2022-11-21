<?php

declare(strict_types=1);

namespace WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use WideMorph\Morph\Bundle\MorphViewBlockBundle\Interaction\Contract\BlockInterface;

/**
 * Class MorphViewBlockExtension
 *
 * @package WideMorph\Morph\Bundle\MorphViewBlockBundle\Infrastructure\DependencyInjection
 */
class MorphViewBlockExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(BlockInterface::class)
            ->addTag(BlockInterface::SERVICE_TAG_NAME);

        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../Resources/config')
        );

        $loader->load('domain.xml');
        $loader->load('infrastructure.xml');
        $loader->load('interaction.xml');
    }
}
