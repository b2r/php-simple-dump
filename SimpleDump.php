<?php

namespace b2r\Component\SimpleDump;

/**
 * Simple `var_dump` wrapper
 *
 * - Remove redundant spaces
 * - Register `p` as global method
 * - Register `ps` as global method
 * 
 */
abstract class SimpleDump
{
    public static function display()
    {
        echo self::dumpValues(func_get_args());
    }

    public static function dump()
    {
        return self::dumpValues(func_get_args());
    }

    public static function dumpValues(array $values, bool $minify = true): string
    {
        // Dump
        ob_start();
        foreach ($values as $value) {
            var_dump($value);
        }
        $result = ob_get_contents();
        ob_end_clean();

        // Minify
        if ($minify) {
            $result = preg_replace("/]=>\n\s+/", ']=> ', $result);
            $result = preg_replace("/\(0\)\s+{\s+}/", '(0) {}', $result);
        }
        return $result;
    }

    public static function init()
    {
        require_once __DIR__ . '/init.php';
    }
}
