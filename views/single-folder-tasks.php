<?php include "../bootstrap/init.php"; ?>
<?php include "header.php";
$folderId = $_GET['folderId'] ?? null;
if (!empty($folderId)) {
    $folder = getFolder($folderId);
}
?>
<!-- partial:index.partial.html -->
<div class="main">
    <?php include "sidebar.php"; ?>
    <div class="view">
        <div class="viewHeader">
            <div class="title">
                <input type="text" placeholder="نام تسک را وارد کنید." id="newTaskInput" style="width: 50%">
                <button type="submit" id="addTaskBtn" style="background-color: #89ddff">افزودن تسک</button>
            </div>
        </div>
        <div class="content">
            <div class="list">
                <?php if (isset($_GET['folderId'])) : ?>
                    <div class="title">تسک های پوشه: <?= $folder[0]->name ?></div>
                <?php else : ?>
                    <div class="title">تسک های پوشه: unknown</div>
                <?php endif; ?>
                <ul class="taskList">
                    <!-- شرط بررسی خالی نبودن پوشه و ست شدن آیدی پوشه -->
                    <?php if (sizeof($tasks) and isset($_GET['folderId'])) : ?>
                        <?php foreach ($tasks as $task) : ?>
                            <li class="<?= $task->is_done ? 'checked' : '' ?>">
                                <i style="cursor: pointer" data-taskId="<?= $task->id ?>" class="isDone clickable fa <?= $task->is_done ? 'fa-check-square-o' : 'fa-square-o'; ?>"></i>
                                <span><?= $task->title ?></span>
                                <div class="info">
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