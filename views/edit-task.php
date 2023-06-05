<?php include "../bootstrap/init.php"; ?>
<?php include "header.php";
$taskId = $_GET['taskId'];
$task = getTask($taskId);
?>
<!-- partial:index.partial.html -->
<div class="main">
    <div class="nav">
        <div class="menu">
        </div>
    </div>
    <div class="view">
        <div class="viewHeader">
            <div class="title">

                <input type="text" placeholder="نام فعلی : <?= $task[0]->title ?> " id="editTaskInput" style="width: 50%">
                <button type="submit" id="editTaskBtn" style="background-color: #89ddff">ویرایش تسک</button>
            </div>
        </div>
        <div class="content">
        </div>
    </div>
</div>
</div>
<!-- partial -->
<?php include "footer.php"; ?>