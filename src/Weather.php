<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/31
 * Time: 15:06.
 */

namespace Sockstack\Weather;

use GuzzleHttp\Client;
use Sockstack\Weather\Exceptions\HttpException;
use Sockstack\Weather\Exceptions\InvalidArgumentException;

class Weather
{
    protected $url = 'http://wthrcdn.etouch.cn/weather_mini?city={city}';
    protected $guzzleOptions = [];

    public function getHttpClient()
    {
        return new Client($this->guzzleOptions);
    }

    public function setGuzzleOptions(array $options)
    {
        $this->guzzleOptions = $options;
    }

    public function getWeather($city, $json = null)
    {
        if (!is_string($city)) {
            throw new InvalidArgumentException('Invalid params city. '.gettype($city));
        }
        $url = $this->getUrl($city);

        try {
            $response = $this->getHttpClient()->get($url)->getBody()->getContents();

            return !$json ? $response : json_decode($response, true);
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    protected function getUrl($city)
    {
        return str_replace('{city}', $city, $this->url);
    }
}
