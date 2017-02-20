<?php

use b2r\Component\SimpleDump\SimpleDump;

class SimpleDumpTest extends PHPUnit\Framework\TestCase
{
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
