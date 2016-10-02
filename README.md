## Moell/RSS
Moell/RSS是遵循RSS２.0标准的包

### RSS规范
[http://www.rssboard.org/rss-specification](http://www.rssboard.org/rss-specification)

### 中文README
[README](README_zh.md)

### 要求
PHP >= 5.4.0

### 安装
```shell
composer require "moell/rss:~0.1.0"
```
### 提供接口
```php
//设置字符集
public function setEncode($encode); //默认UTF-8

public function channel(array $channel);

public function item(array $item);

//构造xml
public function build();

//快速构造
public function fastBuild(array $channel, array $item);

public function __toString();
```

### Usage
```php
$rss = new \Moell\Rss\Rss();

$channel = [
    'title' => 'title',
    'link'  => 'http://moell.cn',
    'description' => 'description',
    'category' => [
        'value' => 'html',
        'attr' => [
            'domain' => 'http://www.moell.cn'
        ]
    ]
];

$rss->channel($channel);

for($i = 0; $i < 1; $i++) {
    $rss->item([
        'title' => "title".$i,
        'description' => 'description',
        'source' => [
            'value' => 'moell.cn',
            'attr' => [
                'url' => 'http://www.moell.cn'
            ]
        ]
    ]);
}

$rss->build();	//Construct the data
echo $rss;	//Get xml

//Other acquisition methods
$rss->build()->asXML();
$rss->fastBuild($channel, $item)->asXML();
```
### Generate results
```xml
<?xml version="1.0" encoding="UTF-8"?>
<rss
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
    <title>title</title>
    <link>http://moell.cn</link>
    <description>description</description>
    <category domain="http://www.moell.cn">html</category>
    <item>
        <title>title0</title>
        <description>description</description>
        <source url="http://www.moell.cn">moell.cn</source>
    </item>
</rss>
```

### License
MIT
