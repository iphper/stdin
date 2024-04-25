# event-source
event-source 是简单的PHP服务端对于```SSE(Server-Sent Events)```的封装

##安装
```sh
composer require iphper/stdin
```

## 使用示例
```php
use Stdin\Stdin;

$stdin = new Stdin();

// 获取一行数据
$line = $stdin->line('line:');
var_dump($line);

// 获取一个字符
$char = $stdin->char('char:');
var_dump($char);

// 获取多行数据【输入空行确认】
$arrr = $stdin->array('array:');
var_dump($arrr);

// 获取int类型数据
$int = $stdin->int('int:');
var_dump($int);

// 获取float类型数据
$float = $stdin->float('float:');
var_dump($float);

// 获取bool类型数据
$bool = $stdin->bool('bool:');
var_dump($bool);

```