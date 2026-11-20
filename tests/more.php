<?php
declare(strict_types=1);
require_once __DIR__.'/../practice/more.php';
function moreCheck(bool $ok): void {if(!$ok)throw new RuntimeException('More exercise check failed');}
function moreThrows(callable $call,string $type):void{try{$call();}catch(Throwable $error){moreCheck($error instanceof $type);return;}throw new RuntimeException('Expected '.$type);}
// 5 ASCII 網址短名
moreCheck(p_slug(' Hello & World! ')==='hello-world');moreCheck(p_slug('---')==='');
// 6 Unicode 字元截斷
moreCheck(p_truncate('a貓🙂',2)==='a貓…');moreCheck(p_truncate('',0)==='');
// 7 英數回文正規化
moreCheck(p_palindrome('A man, a plan, a canal: Panama!'));moreCheck(!p_palindrome('abc'));
// 8 駝峰名稱轉底線
moreCheck(p_snake('userName')==='user_name');moreCheck(p_snake('HTTPServer')==='http_server');
// 9 郵件帳號遮罩
moreCheck(p_mask_email('a@example.test')==='***@example.test');moreThrows(fn()=>p_mask_email('bad'),InvalidArgumentException::class);
// 10 RFC3986 查詢參數
moreCheck(p_query(['q'=>'a b','x'=>1])==='q=a%20b&x=1');moreCheck(p_query([])==='');
// 11 HTTP URL 欄位解析
moreCheck(p_url_parts('https://EXAMPLE.test:8443/a')===['host'=>'example.test','port'=>8443,'path'=>'/a']);moreThrows(fn()=>p_url_parts('file:///x'),InvalidArgumentException::class);
// 12 HTML 表格文字編碼
moreCheck(p_table([['<x>','"']])==='<table><tr><td>&lt;x&gt;</td><td>&quot;</td></tr></table>');moreCheck(p_table([])==='<table></table>');
// 13 CSV 引號解析
moreCheck(p_csv_parse("a,\"b,c\"\n")===[['a','b,c']]);moreCheck(p_csv_parse('')===[]);
// 14 CSV 欄位往返
moreCheck(p_csv_parse(p_csv_write([['a,b','"x']]))===[['a,b','"x']]);moreCheck(p_csv_write([])==='');
// 15 JSON 物件型別驗證
moreCheck(p_json_object('{"x":2}')===['x'=>2]);moreThrows(fn()=>p_json_object('[]'),InvalidArgumentException::class);
// 16 巢狀陣列路徑
moreCheck(p_deep_get(['a'=>['b'=>null]],['a','b'],'x')===null);moreCheck(p_deep_get([],['x'],'fallback')==='fallback');
// 17 設定合併與覆蓋
moreCheck(p_deep_merge(['a'=>['x'=>1]],['a'=>['y'=>2]])===['a'=>['x'=>1,'y'=>2]]);moreCheck(p_deep_merge(['a'=>1],['a'=>null])===['a'=>null]);
// 18 記錄依欄位分組
moreCheck(p_group([['team'=>'a','n'=>1],['team'=>'a','n'=>2]],'team')['a'][1]['n']===2);moreCheck(p_group([],'team')===[]);
// 19 唯一索引與重複鍵
moreCheck(p_index([['id'=>'a','n'=>2]],'id')['a']['n']===2);moreThrows(fn()=>p_index([['id'=>1],['id'=>1]],'id'),InvalidArgumentException::class);
// 20 遞迴攤平陣列
moreCheck(p_flatten([1,[2,[3]],[]])===[1,2,3]);moreCheck(p_flatten([])===[]);
// 21 閉包作為條件
moreCheck(p_partition([1,2,3,4],fn($x)=>$x%2===0)===[[2,4],[1,3]]);moreCheck(p_partition([],fn()=>true)===[[],[]]);
// 22 嚴格型別去重
moreCheck(p_unique([1,'1',1,null,null])===[1,'1',null]);moreCheck(p_unique([])===[]);
// 23 字串計數
moreCheck(p_histogram(['b','a','b'])===['a'=>1,'b'=>2]);moreCheck(p_histogram([])===[]);
// 24 多欄位排序
moreCheck(array_column(p_ranked_records([['name'=>'b','score'=>8],['name'=>'a','score'=>8],['name'=>'c','score'=>9]]),'name')===['c','a','b']);moreCheck(p_ranked_records([])===[]);
// 25 奇偶數量中位數
moreCheck(p_median([4,1,3,2])===2.5);moreCheck(p_median([])===null);
// 26 固定視窗平均
moreCheck(p_moving_average([1,2,3,4],2)===[1.5,2.5,3.5]);moreThrows(fn()=>p_moving_average([],0),InvalidArgumentException::class);
// 27 整數連號合併
moreCheck(p_ranges([3,1,2,8,8])===[[1,3],[8,8]]);moreCheck(p_ranges([])===[]);
// 28 等長配對
moreCheck(p_zip([1,2],['a','b'])===[[1,'a'],[2,'b']]);moreThrows(fn()=>p_zip([1],[]),InvalidArgumentException::class);
// 29 矩陣行列交換
moreCheck(p_transpose([[1,2],[3,4]])===[[1,3],[2,4]]);moreThrows(fn()=>p_transpose([[1],[]]),InvalidArgumentException::class);
// 30 內積與長度檢查
moreCheck(p_dot_product([1,2],[3,4])===11);moreCheck(p_dot_product([],[])===0);
// 31 嚴格日期解析
moreCheck(p_strict_date('2024-02-29')->format('Y-m-d')==='2024-02-29');moreThrows(fn()=>p_strict_date('2026-02-30'),InvalidArgumentException::class);
// 32 跨月日期列舉
moreCheck(p_date_range('2024-02-28','2024-03-01')===['2024-02-28','2024-02-29','2024-03-01']);moreThrows(fn()=>p_date_range('2026-01-02','2026-01-01'),InvalidArgumentException::class);
// 33 週末與假日排除
moreCheck(p_business_days('2026-11-16','2026-11-22',['2026-11-18'])===4);moreCheck(p_business_days('2026-11-21','2026-11-22',[])===0);
// 34 月份最後一天
moreCheck(p_month_end(2024,2)==='2024-02-29');moreCheck(p_month_end(2026,12)==='2026-12-31');
// 35 秒數轉時分秒
moreCheck(p_duration(90061)==='25:01:01');moreCheck(p_duration(0)==='0:00:00');
// 36 嚴格時刻轉秒
moreCheck(p_time_seconds('01:02:03')===3723);moreThrows(fn()=>p_time_seconds('24:00:00'),InvalidArgumentException::class);
// 37 整數容量解析
moreCheck(p_byte_size('2 KiB')===2048);moreThrows(fn()=>p_byte_size('1.5 MB'),InvalidArgumentException::class);
// 38 容量顯示
moreCheck(p_human_bytes(1536)==='1.50 KiB');moreCheck(p_human_bytes(0)==='0.00 B');
// 39 Hex 非法值拒絕
moreCheck(p_hex_decode('4869')==='Hi');moreThrows(fn()=>p_hex_decode('0'),InvalidArgumentException::class);
// 40 嚴格 Base64
moreCheck(p_base64_decode('SGk=')==='Hi');moreThrows(fn()=>p_base64_decode('!!'),InvalidArgumentException::class);
// 41 Luhn 檢查碼
moreCheck(p_luhn('79927398713'));moreCheck(!p_luhn('79927398714'));
// 42 ISBN-10 與 X
moreCheck(p_isbn10('0-306-40615-2'));moreCheck(!p_isbn10('0306406153'));
// 43 IPv4 整數表示
moreCheck(p_ipv4('127.0.0.1')===2130706433);moreThrows(fn()=>p_ipv4('999.1.1.1'),InvalidArgumentException::class);
// 44 CIDR 網段邊界
moreCheck(p_network('192.168.1.42/24')===['192.168.1.0','192.168.1.255']);moreCheck(p_network('10.0.0.1/32')===['10.0.0.1','10.0.0.1']);
// 45 enum 與合法狀態轉移
moreCheck(p_next_status('pending','pay')==='paid');moreThrows(fn()=>p_next_status('pending','ship'),InvalidArgumentException::class);
// 46 interface 與整數折扣
moreCheck(p_discount(1000,15)===850);moreCheck(p_discount(99,100)===0);moreThrows(fn()=>p_discount(10,101),InvalidArgumentException::class);
// 47 generator 分頁
moreCheck(iterator_to_array(p_pages([1,2,3],2))===[[1,2],[3]]);moreCheck(iterator_to_array(p_pages([],2))===[]);
// 48 閉包捕獲快取
$calls=0;$f=p_memoize(function($x)use(&$calls){$calls++;return $x*$x;});moreCheck($f(3)===9&&$f(3)===9&&$calls===1);moreCheck($f(4)===16&&$calls===2);
// 49 SPL 最小堆積
moreCheck(p_smallest([4,1,1,3],3)===[1,1,3]);moreCheck(p_smallest([],4)===[]);
// 50 時區轉換保留同一時刻
moreCheck(p_timezone('2026-01-01 08:00','Asia/Taipei','UTC')==='2026-01-01 00:00');moreCheck(p_timezone('2026-07-01 12:00','UTC','America/New_York')==='2026-07-01 08:00');
echo "PHP exercises passed\n";
