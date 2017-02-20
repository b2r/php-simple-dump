<?php

use b2r\Component\SimpleDump\SimpleDump;

class SimpleDumpTest extends PHPUnit\Framework\TestCase
{
    public function testBasic()
    {
        SimpleDump::init();
        $p = function ($value) {
            return trim(ps($value));
        };
        $this->assertEquals('string(6) "string"', $p('string'));
        $this->assertEquals('int(1)', $p(1));
        $this->assertEquals('float(1)', $p(1.0));
        $this->assertEquals('bool(true)', $p(true));
        $this->assertEquals('bool(false)', $p(false));
        $this->assertEquals('NULL', $p(null));
    }

    public function testDumpDisplay()
    {
        SimpleDump::init();
        $dump = SimpleDump::dump($_SERVER);

        ob_start();
        SimpleDump::display($_SERVER);
        $disp = ob_get_contents();
        ob_end_clean();

        $this->assertTrue($dump === $disp);
    }

    public function testGlobal()
    {
        SimpleDump::init();
        $ps = ps($_SERVER);

        ob_start();
        p($_SERVER);
        $p = ob_get_contents();
        ob_end_clean();

        $this->assertTrue($p === $ps);
    }
}
