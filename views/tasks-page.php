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
                    <!-- شرط بررسی موجودیت تسک ها -->
                    <?php if (sizeof($tasks)) : ?>
                        <?php foreach ($tasks as $task) : ?>
                            <li class="<?= $task->is_done ? 'checked' : '' ?>">
                                <i style="cursor: pointer" data-taskId="<?= $task->id ?>" class="isDone clickable fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o'; ?>"></i>
                                <span><?= $task->title ?></span>
                                <div class="info">
                                    <a href="?deleteTask=<?= $task->id ?>">
                                        <div class="button danger" onclick='return confirm("مطمئن هستید که میخواهید تسک <?= $task->title ?> حذف کنید؟");'>حذف</div>
                                    </a>
                                    <a href="<?= siteUrl('views/edit-task.php') ?>?taskId=<?= $task->id ?> ">
                                        <div class="button green">ویرایش</div>
                                    </a>
                                    <span>تاریخ ایجاد <?= verta($task->created_at)->format('Y.m.d') ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <li>تسکی وجود ندارد!</li>
                        <?php endif; ?>
                        <!-- پایان شرط -->
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- partial -->
<?php include "footer.php"; ?>