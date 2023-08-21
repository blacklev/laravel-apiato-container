<?php

namespace App\Containers\DirectoryItemSection\DirectoryItem\Traits;

/**
 * Trait TypeDirectoryItemHref
 *
 * @package App\Containers\DirectoryItemSection\DirectoryItem\Traits
 */
trait TypeDirectoryItemHref
{
    /**
     * Get type of directory item href kit.
     *
     * @return int
     */
    private function getTypeKit(): int
    {
        return 1;
    }

    /**
     * Get type of directory item href related.
     *
     * @return int
     */
    private function getTypeRelated(): int
    {
        return 2;
    }
}
