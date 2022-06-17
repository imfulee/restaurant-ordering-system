# 備注

打印功能需要用以下命令

```
composer require mike42/escpos-php
```

但是如果要打印繁體需要到 `/vendor/mike42/src/Printer.php` 改掉 `public function textChinese($str = ""){...}` 的 encoding 格式改成這樣

```php
$str = iconv("UTF-8", "BIG5", $str);
```
