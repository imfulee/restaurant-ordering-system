# 小吃店點餐系統

## 程式的架構

| 資料夾 | 用途                       |
|--------|---------------------------|
| API    |前端打進來獲得JSON頁面上的資料|
| css    |前端需要用到的CSS檔案        |
| js     |前端需要用到的JS檔案         |
| static |前端要用到的需要綁在套件     |

## 備注

打印功能需要用以下命令

```
composer require mike42/escpos-php
```

但是如果要打印繁體需要到 `/vendor/mike42/src/Printer.php` 改掉 `public function textChinese($str = ""){...}` 的 encoding 格式改成這樣

```php
$str = iconv("UTF-8", "BIG5", $str);
```
