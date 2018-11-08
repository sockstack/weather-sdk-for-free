<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 15:43.
 */

namespace Overtrue\Weather\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
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
        $url = 'http://wthrcdn.etouch.cn/weather_mini?city=广州';
        // 创建模拟 http client。
        $client = \Mockery::mock(Client::class);

        // 指定将会产生的形为（在后续的测试中将会按下面的参数来调用）。
        $client->allows()->get($url)->andReturn(new Response(200, [], json_encode(['status' => 1000])));

        $weather = \Mockery::mock(Weather::class)->makePartial();
        $weather->allows()->getHttpClient()->andReturn($client);
        $response = $weather->getWeather('广州', true);

        $this->assertSame(['status' => 1000], $response);
    }
}
