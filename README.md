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

但如果以上的功能不能用似乎是每個打印機的設定都不一樣所以我就沒辦法都 cover 了

## 未來

- 把前端改寫成用 `petite-vue` 之類的，用原生 JS 來寫好累，也很醜
- 把網頁的頁面歸到 `public/` 底下，`static/`, `css/`, `js/` 也放在裏面
- 改寫 composer 安裝的指令
- 加一個資料夾就是介紹程式結構的，未來有人也可以自己架
- 更適應手機界面（大概要重寫了）

## 沒辦法下載檔案

你可能是 `API/` 的目錄沒有讓 apache 寫的權力，所以只要打入

```sh
chmod 775 -R /var/www/html/API
```