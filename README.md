# BogusFixturesBundle
The BogusFixturesBundle adds the functionality of [`tijmen-wierenga/bogus`](https://github.com/TijmenWierenga/Bogus) to a Symfony 4 application.

For any questions regarding this bundle, feel free to contact Tijmen Wierenga at `t.wierenga@live.nl`.

## Installation
You can install this bundle into your Symfony applications with composer:
```bash
composer require tijmen-wierenga/bogus-fixtures-bundle
```

If you only want to use the bundle in development (a lot of times you'll only use it for testing purposes):
```bash
composer require --dev tijmen-wierenga/bogus-fixtures-bundle
```

If you're using Symfony 3.4 or lower, you'll need to register the bundle as well:
```php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    // ...

    public function registerBundles()
    {
        // For global registration
        $bundles = array(
            // ...
            new TijmenWierenga\Bundle\BogusFixturesBundle(),
        );

        // For development/testing registration only
        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new TijmenWierenga\Bundle\BogusFixturesBundle();
        }
    }
}
```

## Usage
Usage instructions for the Bogus library can be find in the project's [README.md](https://github.com/TijmenWierenga/Bogus).

If your Symfony project allows for auto-configuration (3.4 or higher), you can add the following lines to your `services.yaml` file:
```yaml
_instanceof:
    TijmenWierenga\Bogus\Factory\Factory:
        tags: ['bogus_fixtures.factory']
```
This will automatically tag any instance of `TijmenWierenga\Bogus\Factory\Factory` with the `bogus_fixtures.factory` tag.
The factory will be automatically added to the Fixtures base class.

If you prefer you add the labels yourself, or your Symfony application doesn't allow for auto-registration, you can tag individual services:
```yaml
App\Factories\UserFactory:
    tags: ['bogus_fixtures.factory']
```

For usage in tests the bundle comes with a trait. Use it in your test cases like this:
```php
namespace App\Tests;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use TijmenWierenga\Bundle\BogusFixturesBundle\Fixtures;

class FixturesTest extends KernelTestCase
{
    use Fixtures;

    public function setUp()
    {
        self::bootKernel();
    }

    public function testItBuildsAFixture()
    {
        $user = $this->fixtures()->create(User::class); // Will generate a User
    }
}
```
