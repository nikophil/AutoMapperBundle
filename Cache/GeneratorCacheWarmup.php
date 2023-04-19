<?php

declare(strict_types=1);

namespace Jane\Bundle\AutoMapperBundle\Cache;

use Jane\Component\AutoMapper\AutoMapperRegistryInterface;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

final class GeneratorCacheWarmup implements CacheWarmerInterface
{
    private AutoMapperRegistryInterface $autoMapperRegistry;
    private iterable $generatorWarmupLoaders;

    /** @param iterable<GeneratorWarmupLoaderInterface> $generatorWarmupLoaders */
    public function __construct(
        AutoMapperRegistryInterface $autoMapperRegistry,
        iterable $generatorWarmupLoaders
    ) {
        $this->autoMapperRegistry = $autoMapperRegistry;
        $this->generatorWarmupLoaders = $generatorWarmupLoaders;
    }

    public function isOptional(): bool
    {
        return false;
    }

    public function warmUp(string $cacheDir): array
    {
        dump(1);die;
        $mapperClasses = [];

        foreach ($this->generatorWarmupLoaders as $generatorWarmupLoader) {
            foreach ($generatorWarmupLoader->loadGeneratorsData() as [$source, $target]) {
                $mapperClasses[] = $this->autoMapperRegistry->getMapper($source, $target)::class;
            }
        }

        return $mapperClasses;
    }
}
