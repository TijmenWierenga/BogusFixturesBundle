<?php

namespace TijmenWierenga\Bundle\BogusFixturesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use TijmenWierenga\Bogus\Fixtures;

class FixturesCompilerPass implements CompilerPassInterface
{
    const FACTORY_TAG = "bogus_fixtures.factory";
    /**
     * You can modify the container here before it is dumped to PHP code.
     */
    public function process(ContainerBuilder $container)
    {
        if (! $container->hasDefinition(Fixtures::class)) {
            return;
        }

        $factories = $container->findTaggedServiceIds(self::FACTORY_TAG);
        $fixturesDefinition = $container->getDefinition(Fixtures::class);

        foreach ($factories as $id => $attributes) {
            $fixturesDefinition->addArgument(new Reference($id));
        }
    }
}
