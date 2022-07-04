# 小吃店點餐系統

## 程式的架構

| 資料夾 | 用途                           |
| ------ | ------------------------------ |
| API    | 前端打進來獲得JSON頁面上的資料 |
| css    | 前端需要用到的CSS檔案          |
| js     | 前端需要用到的JS檔案           |
| static | 前端要用到的需要綁在套件       |

資料庫架構（以MySQL為例）

| 資料庫列     | 格式         | Default              | 備注     |
| ------------ | ------------ | -------------------- | -------- |
| A01I01XA     | varchar(255) | -                    | GUID     |
| A01N02CV0255 | varchar(255) | -                    | 桌號     |
| A01D03TD     | datetime(3)  | current_timestamp(3) | 創建時間 |

會選擇使用datetime(3)的理由是可以用1ms來執照排序

| 資料庫列     | 格式         | Default              | 備注                 |
| ------------ | ------------ | -------------------- | -------------------- |
| A02I01XA     | varchar(255) | -                    | GUID                 |
| A02I02XA     | varchar(255) | -                    | 總類（A04X01XA引索） |
| A02N03CV0255 | varchar(255) | -                    | 細項                 |
| A02N04MM     | bigint(8)    | -                    | 金額                 |
| A02D05TD     | datetime(3)  | current_timestamp(3) | 創建日期             |

| 資料庫列     | 格式         | Default              | 備注                       |
| ------------ | ------------ | -------------------- | -------------------------- |
| A03I01XA     | varchar(255) | -                    | GUID                       |
| A03N02CV0255 | varchar(255) | -                    | 備註(其他功能:加大、加辣） |
| A03D03TD     | datetime(3)  | current_timestamp(3) | 創建日期                   |

| 資料庫列     | 格式         | Default              | 備注     |
| ------------ | ------------ | -------------------- | -------- |
| A04I01XA     | varchar(255) | -                    | GUID     |
| A04N02CV0255 | varchar(255) | -                    | 菜品種類 |
| A04D03TD     | datetime(3)  | current_timestamp(3) | 創建日期 |

| 資料庫列 | 格式         | Default | 備注         |
| -------- | ------------ | ------- | ------------ |
| B01I01XA | varchar(255) | -       | GUID         |
| B01D02TD | datetime     | -       | 日期         |
| B01N03MM | bigint(8)    | 0       | 金額         |
| B01I04XA | bigint(8)    | -       | A01I01XA引索 |
| B01N05IT | tinyint(1)   | 0       | 結帳狀態     |

| 資料庫列     | 格式         | Default | 備注                      |
| ------------ | ------------ | ------- | ------------------------- |
| B02I01XA     | varchar(255) | -       | GUID                      |
| B02I02XA     | varchar(255) | -       | 索引(B01I01XA)            |
| B02N03CV0255 | varchar(255) | -       | 細項                      |
| B02N04MM     | bigint(8)    | -       | 金額                      |
| B02N05CV0255 | varchar(255) | NULL    | 備註(其他功能:加大、加辣) |
| B02N06CV0255 | int(3)       | -       | 細項數量                  |



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
- 更適應手機界面（大概要重寫了）

## 沒辦法下載檔案

你可能是 `API/` 的目錄沒有讓 apache 寫的權力，所以只要打入`chmod 775 -R /var/www/html/API`
