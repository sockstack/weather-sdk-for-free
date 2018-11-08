<h1 align="center"> weather </h1>

[![Build Status](https://www.travis-ci.org/sockstack/weather-sdk-for-free.svg?branch=master)](https://www.travis-ci.org/sockstack/weather-sdk-for-free)
[![StyleCI](https://github.styleci.io/repos/155529969/shield?branch=master)](https://github.styleci.io/repos/155529969)
[![codecov](https://codecov.io/gh/sockstack/weather-sdk-for-free/branch/master/graph/badge.svg)](https://codecov.io/gh/sockstack/weather-sdk-for-free)

## Notice

这是一个测试案例，不可用于生产环境。

## Installing

```shell
$ composer require sockstack/weather -vvv
```

## Usage

```php
use Sockstack\Weather\Weather;

$weather = new Weather();
//json
$response = $weather->get("北京市");

//array
$response = $weather->get("北京市", true);
```

## Response

> json:

```json
{
    "data": {
        "yesterday": {
            "date": "30日星期二",
            "high": "高温 16℃",
            "fx": "北风",
            "low": "低温 1℃",
            "fl": "<![CDATA[<3级]]>",
            "type": "晴"
        },
        "city": "北京",
        "aqi": "29",
        "forecast": [
            {
                "date": "31日星期三",
                "high": "高温 17℃",
                "fengli": "<![CDATA[<3级]]>",
                "low": "低温 3℃",
                "fengxiang": "西南风",
                "type": "晴"
            },
            {
                "date": "1日星期四",
                "high": "高温 17℃",
                "fengli": "<![CDATA[<3级]]>",
                "low": "低温 3℃",
                "fengxiang": "南风",
                "type": "晴"
            },
            {
                "date": "2日星期五",
                "high": "高温 18℃",
                "fengli": "<![CDATA[<3级]]>",
                "low": "低温 5℃",
                "fengxiang": "南风",
                "type": "晴"
            },
            {
                "date": "3日星期六",
                "high": "高温 17℃",
                "fengli": "<![CDATA[<3级]]>",
                "low": "低温 7℃",
                "fengxiang": "南风",
                "type": "多云"
            },
            {
                "date": "4日星期天",
                "high": "高温 14℃",
                "fengli": "<![CDATA[3-4级]]>",
                "low": "低温 6℃",
                "fengxiang": "北风",
                "type": "多云"
            }
        ],
        "ganmao": "天凉，昼夜温差较大，较易发生感冒，请适当增减衣服，体质较弱的朋友请注意适当防护。",
        "wendu": "15"
    },
    "status": 1000,
    "desc": "OK"
}
```


## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/sockstack/weather/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/sockstack/weather/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT
