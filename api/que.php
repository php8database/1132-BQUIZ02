<?php include_once "db.php";
$News->save(['text'=>$_POST['subject'],'main_id'=>0,'vote'=>0]);
$subject_id=q("")

foreach($_POST['options'] as $opt){
    $News->save([
        'text'=>$opt,
        'main_id'=>$subject_id,
        'vote'=>0
    ])
}