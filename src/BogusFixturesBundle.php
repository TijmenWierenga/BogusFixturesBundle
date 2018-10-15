<?php

namespace TijmenWierenga\Bundle\BogusFixturesBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use TijmenWierenga\Bundle\BogusFixturesBundle\DependencyInjection\FixturesCompilerPass;

class BogusFixturesBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new FixturesCompilerPass());
    }
}
