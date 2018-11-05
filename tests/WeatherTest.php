<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 15:43.
 */

namespace Overtrue\Weather\Tests;

use PHPUnit\Framework\TestCase;
use Sockstack\Weather\Exceptions\InvalidArgumentException;
use Sockstack\Weather\Weather;

class WeatherTest extends TestCase
{
    public function testInvaildParams()
    {
        $weather = new Weather();

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid params city. array');

        $weather->getWeather([]);

        $this->fail('Failed to assert getWeather throw exception with invalid argument.');
    }

    public function testGetWeather()
    {
        $weather = new Weather();
        $response = $weather->getWeather('广州市', true);

        $this->assertEquals(1000, $response['status']);
    }
}
