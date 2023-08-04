<?php
/* 設定網頁內容顯示時的編碼，以避免中文亂碼 */
header("Content Type:text/html; charset=utf 8");
$db_host = 'localhost'; //資料庫主機
$db_user = 'root'; //資料庫使用者
$db_password = ''; //資料庫使用者密碼
$db_name = 'farm'; //資料庫名稱
/* 資料庫連接 */
$link = mysqli_connect($db_host, $db_user, $db_password, $db_name);
/* 以 utf8 編碼，避免中文亂碼 */
mysqli_set_charset($link, "utf8");
/* 檢查資料庫連接是否失敗 */
if (!$link) {
    die("連接失敗 " . mysqli_connect_error()); //輸出資料庫連接錯誤
}
// 定義查詢的 SQL 語法字串
// 注意！ 資料表中必須增加 photo 欄位
$selStr ="select Aname, Place, Time, photo from activity where photo = '我們一起拔蘿蔔-03.jpg'";
// 執行 SQL 語法查詢
$selData = mysqli_query($link, $selStr);
// 檢查 SQL 語法是否有正常執行查詢 
if ($selData) {
    // 將查詢的執行結果利用 mysqli_fetch_all() 方法轉換成陣列（ array
    $dataArray = mysqli_fetch_all($selData);
    // 利用 json_encode() 方法將陣列轉成 json 格式，並輸出
    echo json_encode($dataArray);
} else {
    echo "執行資料查詢錯誤！！";
}
