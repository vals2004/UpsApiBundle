<?php

namespace Octante\UpsAPIBundle\DependencyInjection;

/*
 * This file is part of the UpsAPIBundle package.
 *
 * (c) Issel Guberna <issel.guberna@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        /*    $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ups');

        $rootNode
            ->children()
                ->arrayNode('endpoints')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('rate')->end()
                            ->scalarNode('shipping')->end()
                            ->scalarNode('track')->end()
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('accesskey')->end()
                ->scalarNode('userId')->end()
                ->scalarNode('password')->end()
            ->end();

        return $treeBuilder;*/
    }
}
