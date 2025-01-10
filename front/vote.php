<?php 

$subject = $Que->find($_GET['id']);
$options = $Que->all(['main_id' => $_GET['id']]);
?>

<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?=$subject['text'];?></legend>
<h3><?=$subject['text'];?></h3>
<form action="./api/vote.php" method="post" onsubmit="return checkVote()">
<?php 
foreach($options as $option){
    echo "<p>";
    echo "<input type='radio' name='opt' value='{$option['id']}'> ";
    echo $option['text'];
    echo "</p>";
}
?>
<div class="ct">
    <input type="submit" value="我要投票">
</div>

<!-- 顯示錯誤訊息的區塊 -->
<div id="error-message" style="color: red; display: none;">
    請選擇一個選項！
</div>

</form>

<script>
function checkVote() {
    var radios = document.getElementsByName('opt');
    var isChecked = false;
    for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
            isChecked = true;
            break;
        }
    }
    if (!isChecked) {
        // 顯示錯誤訊息
        document.getElementById("error-message").style.display = "block";
        
        // 設定1秒後重新載入頁面
        setTimeout(function() {
			location.href = '?do=que'; // 返回問卷頁面首頁
            //location.reload(); // 重新載入當前頁面
        }, 1000); // 2000毫秒即2秒後執行

        return false; // 阻止表單提交
    }
    return true; // 允許提交
}
</script>
    

</fieldset>
