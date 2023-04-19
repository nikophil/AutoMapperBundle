<?php

declare(strict_types=1);

namespace Jane\Bundle\AutoMapperBundle\Cache;

interface GeneratorWarmupLoaderInterface
{
    /**
     * @return list<array{source: string, target: string}>
     */
    public function loadGeneratorsData(): array;
}
