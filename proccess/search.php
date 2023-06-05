<?php

include '../bootstrap/init.php';
usleep(500000);
if(! ajaxRequest()){
    diePage("درخواست نامعتبر!");
}
$keyword = $_POST['keyword'];
if (!isset($keyword) or empty($keyword)){
    die('نتیجه ای یافت نشد...!');
}
$searchedTasks = searchTask($keyword);
if (sizeof($searchedTasks) == 0){
    die('نتیجه ای یافت نشد...!');
}
foreach ($searchedTasks as $task){
    echo "<a href='".siteUrl('views/single-task-page.php')."?taskId=$task->id'><div class='result-item'>
         <span class='loc-title'>$task->title</span>
         </div></a>";
}

