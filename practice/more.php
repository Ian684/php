<?php
declare(strict_types=1);

// 5. ASCII 網址短名
function p_slug(string $text): string { return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($text)), '-'); }

// 6. Unicode 字元截斷
function p_truncate(string $text,int $limit): string { if($limit<0)throw new InvalidArgumentException('negative limit');$characters=preg_split('//u',$text,-1,PREG_SPLIT_NO_EMPTY);if($characters===false)throw new InvalidArgumentException('invalid UTF-8');return count($characters)>$limit?implode('',array_slice($characters,0,$limit)).'…':$text; }

// 7. 英數回文正規化
function p_palindrome(string $text): bool { $clean=strtolower(preg_replace('/[^a-zA-Z0-9]/','',$text));return $clean===strrev($clean); }

// 8. 駝峰名稱轉底線
function p_snake(string $text): string { $text=preg_replace('/([A-Z]+)([A-Z][a-z])/','$1_$2',$text);return strtolower(preg_replace('/([a-z0-9])([A-Z])/','$1_$2',$text)); }

// 9. 郵件帳號遮罩
function p_mask_email(string $email): string { if(!filter_var($email,FILTER_VALIDATE_EMAIL))throw new InvalidArgumentException('invalid email');[, $domain]=explode('@',$email,2);return '***@'.$domain; }

// 10. RFC3986 查詢參數
function p_query(array $parameters): string { ksort($parameters);return http_build_query($parameters,'','&',PHP_QUERY_RFC3986); }

// 11. HTTP URL 欄位解析
function p_url_parts(string $url): array { $parts=parse_url($url);if($parts===false||!in_array($parts['scheme']??'', ['http','https'],true)||empty($parts['host']))throw new InvalidArgumentException('HTTP URL required');return ['host'=>strtolower($parts['host']),'port'=>$parts['port']??($parts['scheme']==='https'?443:80),'path'=>$parts['path']??'/']; }

// 12. HTML 表格文字編碼
function p_table(array $rows): string { $html='<table>';foreach($rows as $row){$html.='<tr>';foreach($row as $cell)$html.='<td>'.htmlspecialchars((string)$cell,ENT_QUOTES|ENT_SUBSTITUTE,'UTF-8').'</td>';$html.='</tr>';}return $html.'</table>'; }

// 13. CSV 引號解析
function p_csv_parse(string $text): array { $stream=fopen('php://temp','w+');fwrite($stream,$text);rewind($stream);$rows=[];while(($row=fgetcsv($stream,0,',','"',''))!==false)$rows[]=$row;fclose($stream);return $rows; }

// 14. CSV 欄位往返
function p_csv_write(array $rows): string { $stream=fopen('php://temp','w+');foreach($rows as $row)fputcsv($stream,$row,',','"','');rewind($stream);$text=stream_get_contents($stream);fclose($stream);return $text; }

// 15. JSON 物件型別驗證
function p_json_object(string $text): array { $value=json_decode($text,false,512,JSON_THROW_ON_ERROR);if(!$value instanceof stdClass)throw new InvalidArgumentException('JSON object required');return get_object_vars($value); }

// 16. 巢狀陣列路徑
function p_deep_get(array $data,array $path,mixed $default=null): mixed { $value=$data;foreach($path as $key){if(!is_array($value)||!array_key_exists($key,$value))return $default;$value=$value[$key];}return $value; }

// 17. 設定合併與覆蓋
function p_deep_merge(array $left,array $right): array { foreach($right as $key=>$value)$left[$key]=isset($left[$key])&&is_array($left[$key])&&is_array($value)?p_deep_merge($left[$key],$value):$value;return $left; }

// 18. 記錄依欄位分組
function p_group(array $records,string $key): array { $out=[];foreach($records as $record){if(!array_key_exists($key,$record))throw new InvalidArgumentException('missing field');$out[(string)$record[$key]][]=$record;}return $out; }

// 19. 唯一索引與重複鍵
function p_index(array $records,string $key): array { $out=[];foreach($records as $record){if(!array_key_exists($key,$record))throw new InvalidArgumentException('missing key');$value=(string)$record[$key];if(array_key_exists($value,$out))throw new InvalidArgumentException('duplicate key');$out[$value]=$record;}return $out; }

// 20. 遞迴攤平陣列
function p_flatten(array $values): array { $out=[];foreach($values as $value){if(is_array($value))array_push($out,...p_flatten($value));else $out[]=$value;}return $out; }

// 21. 閉包作為條件
function p_partition(array $values,callable $predicate): array { $yes=$no=[];foreach($values as $value){if($predicate($value))$yes[]=$value;else $no[]=$value;}return [$yes,$no]; }

// 22. 嚴格型別去重
function p_unique(array $values): array { $out=[];foreach($values as $value)if(!in_array($value,$out,true))$out[]=$value;return $out; }

// 23. 字串計數
function p_histogram(array $words): array { $out=[];foreach($words as $word){if(!is_string($word))throw new InvalidArgumentException('strings required');$out[$word]=($out[$word]??0)+1;}ksort($out);return $out; }

// 24. 多欄位排序
function p_ranked_records(array $records): array { usort($records,fn($a,$b)=>($b['score']<=>$a['score'])?:strcmp($a['name'],$b['name']));return $records; }

// 25. 奇偶數量中位數
function p_median(array $values): ?float { if(!$values)return null;sort($values,SORT_NUMERIC);$n=count($values);return $n%2?(float)$values[intdiv($n,2)]:(float)$values[$n/2-1]/2+(float)$values[$n/2]/2; }

// 26. 固定視窗平均
function p_moving_average(array $values,int $width): array { if($width<1||$width>count($values))throw new InvalidArgumentException('invalid window');$sum=array_sum(array_slice($values,0,$width));$out=[$sum/$width];for($i=$width;$i<count($values);$i++){$sum+=$values[$i]-$values[$i-$width];$out[]=$sum/$width;}return $out; }

// 27. 整數連號合併
function p_ranges(array $values): array { sort($values,SORT_NUMERIC);$values=array_values(array_unique($values));$out=[];foreach($values as $value){$last=count($out)-1;if($last>=0&&$out[$last][1]!==PHP_INT_MAX&&$value===$out[$last][1]+1)$out[$last][1]=$value;else $out[]=[$value,$value];}return $out; }

// 28. 等長配對
function p_zip(array $a,array $b): array { if(count($a)!==count($b))throw new InvalidArgumentException('length mismatch');$a=array_values($a);$b=array_values($b);$out=[];foreach($a as $i=>$value)$out[]=[$value,$b[$i]];return $out; }

// 29. 矩陣行列交換
function p_transpose(array $rows): array { if(!$rows)return [];$width=count($rows[0]);foreach($rows as $row)if(count($row)!==$width)throw new InvalidArgumentException('ragged matrix');$out=[];for($c=0;$c<$width;$c++)$out[]=array_column($rows,$c);return $out; }

// 30. 內積與長度檢查
function p_dot_product(array $a,array $b): int|float { $sum=0;foreach(p_zip($a,$b) as [$x,$y])$sum+=$x*$y;return $sum; }

// 31. 嚴格日期解析
function p_strict_date(string $text): DateTimeImmutable { $date=DateTimeImmutable::createFromFormat('!Y-m-d',$text,new DateTimeZone('UTC'));if(!$date||$date->format('Y-m-d')!==$text)throw new InvalidArgumentException('invalid date');return $date; }

// 32. 跨月日期列舉
function p_date_range(string $start,string $end): array { $a=p_strict_date($start);$b=p_strict_date($end);if($a>$b||$a->diff($b)->days>3660)throw new InvalidArgumentException('invalid range');$out=[];for($date=$a;$date<=$b;$date=$date->modify('+1 day'))$out[]=$date->format('Y-m-d');return $out; }

// 33. 週末與假日排除
function p_business_days(string $start,string $end,array $holidays): int { $count=0;foreach(p_date_range($start,$end) as $date)if((int)p_strict_date($date)->format('N')<=5&&!in_array($date,$holidays,true))$count++;return $count; }

// 34. 月份最後一天
function p_month_end(int $year,int $month): string { return p_strict_date(sprintf('%04d-%02d-01',$year,$month))->modify('last day of this month')->format('Y-m-d'); }

// 35. 秒數轉時分秒
function p_duration(int $seconds): string { if($seconds<0)throw new InvalidArgumentException('negative duration');return sprintf('%d:%02d:%02d',intdiv($seconds,3600),intdiv($seconds%3600,60),$seconds%60); }

// 36. 嚴格時刻轉秒
function p_time_seconds(string $text): int { if(!preg_match('/\A([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9])\z/',$text,$m))throw new InvalidArgumentException('invalid clock');return (int)$m[1]*3600+(int)$m[2]*60+(int)$m[3]; }

// 37. 整數容量解析
function p_byte_size(string $text): int { if(!preg_match('/\A([0-9]{1,9})\s*(B|KiB|MiB|GiB)\z/',trim($text),$m))throw new InvalidArgumentException('invalid size');return (int)$m[1]*['B'=>1,'KiB'=>1024,'MiB'=>1048576,'GiB'=>1073741824][$m[2]]; }

// 38. 容量顯示
function p_human_bytes(int $size): string { if($size<0)throw new InvalidArgumentException('negative size');$units=['B','KiB','MiB','GiB','TiB'];$i=0;$value=(float)$size;while($value>=1024&&$i<4){$value/=1024;$i++;}return number_format($value,2,'.','').' '.$units[$i]; }

// 39. Hex 非法值拒絕
function p_hex_decode(string $hex): string { if(strlen($hex)%2||($hex!==''&&!ctype_xdigit($hex)))throw new InvalidArgumentException('invalid hex');return hex2bin($hex); }

// 40. 嚴格 Base64
function p_base64_decode(string $text): string { if(!preg_match('/\A(?:[A-Za-z0-9+\/]{4})*(?:[A-Za-z0-9+\/]{2}==|[A-Za-z0-9+\/]{3}=)?\z/',$text))throw new InvalidArgumentException('invalid base64');$out=base64_decode($text,true);if($out===false)throw new InvalidArgumentException('invalid base64');return $out; }

// 41. Luhn 檢查碼
function p_luhn(string $text): bool { if($text===''||!ctype_digit($text))return false;$sum=0;foreach(str_split(strrev($text)) as $i=>$c){$n=(int)$c*($i%2?2:1);$sum+=$n>9?$n-9:$n;}return $sum%10===0; }

// 42. ISBN-10 與 X
function p_isbn10(string $text): bool { $text=strtoupper(str_replace('-','',$text));if(!preg_match('/\A[0-9]{9}[0-9X]\z/',$text))return false;$sum=0;foreach(str_split($text) as $i=>$c)$sum+=(10-$i)*($c==='X'?10:(int)$c);return $sum%11===0; }

// 43. IPv4 整數表示
function p_ipv4(string $address): int { if(!filter_var($address,FILTER_VALIDATE_IP,FILTER_FLAG_IPV4))throw new InvalidArgumentException('invalid IPv4');return (int)sprintf('%u',ip2long($address)); }

// 44. CIDR 網段邊界
function p_network(string $cidr): array { $parts=explode('/',$cidr);if(count($parts)!==2||!ctype_digit($parts[1])||(int)$parts[1]>32)throw new InvalidArgumentException('invalid CIDR');$prefix=(int)$parts[1];$address=p_ipv4($parts[0]);$mask=$prefix===0?0:((0xffffffff<<(32-$prefix))&0xffffffff);$network=$address&$mask;return [long2ip($network),long2ip($network|(~$mask&0xffffffff))]; }

// 45. enum 與合法狀態轉移
enum PracticeOrderState:string {case Pending='pending';case Paid='paid';case Shipped='shipped';}
function p_next_status(string $current,string $event): string { $state=PracticeOrderState::from($current);return match([$state,$event]){[PracticeOrderState::Pending,'pay']=>'paid',[PracticeOrderState::Paid,'ship']=>'shipped',default=>throw new InvalidArgumentException('invalid transition')}; }

// 46. interface 與整數折扣
interface PracticeDiscount {public function apply(int $cents): int;}
final class PracticePercentDiscount implements PracticeDiscount {public function __construct(private int $percent){if($percent<0||$percent>100)throw new InvalidArgumentException('invalid percent');}public function apply(int $cents): int{if($cents<0||$cents>1000000000)throw new InvalidArgumentException('price outside example range');return intdiv($cents*(100-$this->percent),100);}}
function p_discount(int $cents,int $percent): int {return (new PracticePercentDiscount($percent))->apply($cents);}

// 47. generator 分頁
function p_pages(array $values,int $size): Generator { if($size<1)throw new InvalidArgumentException('positive page size required');for($offset=0;$offset<count($values);$offset+=$size)yield array_slice($values,$offset,$size); }

// 48. 閉包捕獲快取
function p_memoize(callable $operation): Closure { $cache=[];return function(int $value)use($operation,&$cache){if(!array_key_exists($value,$cache))$cache[$value]=$operation($value);return $cache[$value];}; }

// 49. SPL 最小堆積
function p_smallest(array $values,int $count): array { if($count<0)throw new InvalidArgumentException('negative count');$heap=new SplMinHeap();foreach($values as $value)$heap->insert($value);$out=[];while($count-->0&&!$heap->isEmpty())$out[]=$heap->extract();return $out; }

// 50. 時區轉換保留同一時刻
function p_timezone(string $time,string $from,string $to): string { return (new DateTimeImmutable($time,new DateTimeZone($from)))->setTimezone(new DateTimeZone($to))->format('Y-m-d H:i'); }
