<?php

namespace App\Utils\Linker;

/**
 * @package App\Utils\Linker
 */
interface LinkerInterface
{
    /**
     * @param string $link
     * @param string $list
     * @return string
     */
    public function link(string $link, string $list): string;
}