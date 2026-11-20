# 練習目錄

目錄列出各題的實作位置與執行入口。

## 執行與驗證

    php tests/run.php
    php tests/more.php

## 題目

| 題號 | 任務／學習重點 | 來源 | 入口 |
|---|---|---|---|
| 01 | 整數金額統計 | [budget.php](practice/budget.php) | categoryTotals |
| 02 | 表單驗證 | [validation.php](practice/validation.php) | validateRegistration |
| 03 | 資料庫轉帳 | [ledger.php](practice/ledger.php) | transfer |
| 04 | JSON 檔案鎖 | [json_store.php](practice/json_store.php) | updateNotes |
| 05 | ASCII 網址短名 | [more.php](practice/more.php) | p_slug |
| 06 | Unicode 字元截斷 | [more.php](practice/more.php) | p_truncate |
| 07 | 英數回文正規化 | [more.php](practice/more.php) | p_palindrome |
| 08 | 駝峰名稱轉底線 | [more.php](practice/more.php) | p_snake |
| 09 | 郵件帳號遮罩 | [more.php](practice/more.php) | p_mask_email |
| 10 | RFC3986 查詢參數 | [more.php](practice/more.php) | p_query |
| 11 | HTTP URL 欄位解析 | [more.php](practice/more.php) | p_url_parts |
| 12 | HTML 表格文字編碼 | [more.php](practice/more.php) | p_table |
| 13 | CSV 引號解析 | [more.php](practice/more.php) | p_csv_parse |
| 14 | CSV 欄位往返 | [more.php](practice/more.php) | p_csv_write |
| 15 | JSON 物件型別驗證 | [more.php](practice/more.php) | p_json_object |
| 16 | 巢狀陣列路徑 | [more.php](practice/more.php) | p_deep_get |
| 17 | 設定合併與覆蓋 | [more.php](practice/more.php) | p_deep_merge |
| 18 | 記錄依欄位分組 | [more.php](practice/more.php) | p_group |
| 19 | 唯一索引與重複鍵 | [more.php](practice/more.php) | p_index |
| 20 | 遞迴攤平陣列 | [more.php](practice/more.php) | p_flatten |
| 21 | 閉包作為條件 | [more.php](practice/more.php) | p_partition |
| 22 | 嚴格型別去重 | [more.php](practice/more.php) | p_unique |
| 23 | 字串計數 | [more.php](practice/more.php) | p_histogram |
| 24 | 多欄位排序 | [more.php](practice/more.php) | p_ranked_records |
| 25 | 奇偶數量中位數 | [more.php](practice/more.php) | p_median |
| 26 | 固定視窗平均 | [more.php](practice/more.php) | p_moving_average |
| 27 | 整數連號合併 | [more.php](practice/more.php) | p_ranges |
| 28 | 等長配對 | [more.php](practice/more.php) | p_zip |
| 29 | 矩陣行列交換 | [more.php](practice/more.php) | p_transpose |
| 30 | 內積與長度檢查 | [more.php](practice/more.php) | p_dot_product |
| 31 | 嚴格日期解析 | [more.php](practice/more.php) | p_strict_date |
| 32 | 跨月日期列舉 | [more.php](practice/more.php) | p_date_range |
| 33 | 週末與假日排除 | [more.php](practice/more.php) | p_business_days |
| 34 | 月份最後一天 | [more.php](practice/more.php) | p_month_end |
| 35 | 秒數轉時分秒 | [more.php](practice/more.php) | p_duration |
| 36 | 嚴格時刻轉秒 | [more.php](practice/more.php) | p_time_seconds |
| 37 | 整數容量解析 | [more.php](practice/more.php) | p_byte_size |
| 38 | 容量顯示 | [more.php](practice/more.php) | p_human_bytes |
| 39 | Hex 非法值拒絕 | [more.php](practice/more.php) | p_hex_decode |
| 40 | 嚴格 Base64 | [more.php](practice/more.php) | p_base64_decode |
| 41 | Luhn 檢查碼 | [more.php](practice/more.php) | p_luhn |
| 42 | ISBN-10 與 X | [more.php](practice/more.php) | p_isbn10 |
| 43 | IPv4 整數表示 | [more.php](practice/more.php) | p_ipv4 |
| 44 | CIDR 網段邊界 | [more.php](practice/more.php) | p_network |
| 45 | enum 與合法狀態轉移 | [more.php](practice/more.php) | p_next_status |
| 46 | interface 與整數折扣 | [more.php](practice/more.php) | p_discount |
| 47 | generator 分頁 | [more.php](practice/more.php) | p_pages |
| 48 | 閉包捕獲快取 | [more.php](practice/more.php) | p_memoize |
| 49 | SPL 最小堆積 | [more.php](practice/more.php) | p_smallest |
| 50 | 時區轉換保留同一時刻 | [more.php](practice/more.php) | p_timezone |

每個新增單元的正常值與邊界案例可在 tests/、check.py 或 testbench 找到。先預測輸出，再執行，再修改輸入觀察；不是把通過單一範例視為正式部署或線上 AC。
