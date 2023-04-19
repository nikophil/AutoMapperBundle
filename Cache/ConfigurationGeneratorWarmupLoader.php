<?php

declare(strict_types=1);

namespace Jane\Bundle\AutoMapperBundle\Cache;

use Jane\Bundle\AutoMapperBundle\Tests\Fixtures\Address;

final class ConfigurationGeneratorWarmupLoader implements GeneratorWarmupLoaderInterface
{
    public function loadGeneratorsData(): array
    {
        return [
            ['source' => Address::class, 'target' => 'array'],
            ['source' => 'array', 'target' => Address::class],
        ];
    }
}
