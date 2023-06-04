<?php include "header.php"; ?>
<!-- partial:index.partial.html -->
<div class="main">
    <div class="view">
        <div class="viewHeader">
            <div class="title">
                <input type="text" placeholder="نام تسک را وارد کنید." id="newTaskInput" style="width: 50%">
                <button type="submit" id="addTaskBtn" style="background-color: #89ddff">افزودن تسک</button>
            </div>
        </div>
        <div class="content">
            <div class="list">
                <div class="title">تسک های پوشه: </div>
                <div class="title">تسک های پوشه: unknown</div>
                <ul class="taskList">
                    <li class="checked'">
                        <i style="cursor: pointer" data-taskId="" class="isDone"></i>
                        <span>title</span>
                        <div class="info">
                            <span>تاریخ ایجاد </span>
                        </div>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- partial -->
<?php include "footer.php"; ?>