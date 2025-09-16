<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CalulatePointServiceTest extends TestCase
{
    /**
     * @test
     */
    public function  example(): void
    {
        $this->assertTrue(false);
    }



public function testCalcPoint()
{
    $result = CalcrationService::calcPoint(0);

    $this->assertSame(0, $result);
}

}
