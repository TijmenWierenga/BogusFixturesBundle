<?php
namespace TijmenWierenga\Bundle\BogusFixturesBundle;

use TijmenWierenga\Bogus\Fixtures as BogusFixtures;

trait Fixtures
{
    protected function fixtures(): BogusFixtures
    {
        return self::$container->get(BogusFixtures::class);
    }
}
