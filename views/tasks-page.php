<?php include "../bootstrap/init.php"; ?>
<?php include "header.php"; ?>
<!-- partial:index.partial.html -->
    <div class="main">
        <?php include "sidebar.php"; ?>
        <div class="view">
            <div class="content">
                <div class="list">
                    <div class="title">همه تسک ها</div>
                    <ul>
                        <li class="">
                            <i style="cursor: pointer"  data-taskId="" class="isDone clickable fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o' ; ?>"></i>
                            <span>title</span>
                            <div class="info">
                                <a href="#">
                                    <div class="button danger">حذف</div>
                                </a>
                                <a href="#"><div class="button green">ویرایش</div></a>
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
