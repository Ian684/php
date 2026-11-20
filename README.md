# PHP 小型實作練習

完整題號、來源與執行方式見 [CATALOG.md](CATALOG.md)，機器可讀清單見 [EXERCISES.json](EXERCISES.json)。

以下保留起步練習的說明；其餘題目按完整目錄閱讀。

需要 **64 位元 PHP 8.1 以上**與 PDO SQLite。用 CLI 範例練習輸入驗證、整數金額、交易與檔案鎖，沒有框架或外部服務。

    php demo.php
    php tests/run.php

| 檔案 | 主題 | 行為 |
|---|---|---|
| practice/budget.php | 金額與陣列統計 | 轉成整數分後依分類累加 |
| practice/validation.php | 表單與輸出編碼 | 錯誤依欄位回傳，HTML 編碼獨立處理 |
| practice/ledger.php | PDO 與交易 | 扣款、入款一起成功，失敗 rollback |
| practice/json_store.php | JSON 與 flock | 鎖內讀取、變更、寫回；格式錯誤不覆寫 |

## 金額與驗證

0.10 與 0.20 先轉成 10 與 20，再相加。拒絕負數、科學記號、NaN、超過兩位小數與過長整數，不猜測千分位格式。

驗證與 HTML 編碼不同；放進 HTML 時仍需 escapeHtml。表單可能收到陣列，先檢查型別再操作字串。密碼雜湊與驗證範例也在測試中。

## 交易筆記

第一條 UPDATE 成功不代表轉帳完成。收款帳號不存在時，必須還原扣款。測試涵蓋總額守恆、餘額不足、收款人不存在、自轉帳與整數溢位 rollback。此 SQLite 範例用於理解單一程序交易，沒有完整金融系統的併發與帳務設計。

## 檔案鎖的範圍

updateNotes 在同一個 flock 鎖內讀取與寫回。callback 產生無效資料時，不改原檔。但原檔截斷寫入不能保證斷電時保留舊內容；長期資料應改用資料庫或另外設計可復原的替換流程。

測試使用例外與 check，不依賴可能被 PHP 設定關閉的 assert。
