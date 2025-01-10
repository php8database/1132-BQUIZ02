<?php include_once "db.php";

// 檢查是否有選擇選項
if (!isset($_POST['opt']) || empty($_POST['opt'])) {
    echo "請選擇一個選項！";
    exit; // 停止執行，提示使用者選擇選項
}

$opt_id = $_POST['opt'];
$option = $Que->find($opt_id);
$subject = $Que->find($option['main_id']);

// 更新投票數
$option['vote']++;
$subject['vote']++;

// 儲存更新的資料
$Que->save($option);
$Que->save($subject);

// 重定向到結果頁面
to("../index.php?do=result&id={$option['main_id']}");
