<?php include "../bootstrap/init.php"; ?>
<?php include "header.php"; ?>
<!-- partial:index.partial.html -->
<div class="main">
    <?php include "sidebar.php"; ?>
    <div class="view">
        <div class="viewHeader">
            <div class="title">
                <input id="addFolderInput" type="text" placeholder="نام پوشه را وارد کنید." style="width: 50%">
                <button id="addFolderBtn" type="submit" style="background-color: #12b6cb">افزودن پوشه</button>
            </div>
        </div>
        <div class="content">
            <div class="list">
                <div class="title">همه پوشه ها</div>
                <ul class="folderList">
                    <!-- شرط بررسی موجودیت پوشه -->
                    <?php if (sizeof($folders)) : ?>
                        <?php foreach ($folders as $folder) : ?>
                            <li>
                                <a href="<?= siteUrl('views/single-folder-tasks.php') ?>?folderId=<?= $folder->id ?>">
                                    <i class="fa fa-folder"></i><span><?= $folder->name ?></span></a>
                                <div class="info">
                                    <a href="?deleteFolder=<?= $folder->id ?>">
                                        <div class="button danger" onclick="return confirm
                         ('مطمئن هستید که میخواهید <?= $folder->name ?> حذف کنید؟');">حذف</div>
                                    </a>
                                    <a href="<?= siteUrl('views/edit-folder.php') ?>?folderId=<?= $folder->id ?>">
                                        <div class="button green">ویرایش</div>
                                    </a>
                                    <span class="span">تاریخ ایجاد <?= verta($folder->created_at)->format('Y.m.d') ?></span>
                                </div>
                            <?php endforeach; ?>
                            </li>
                        <?php else : ?>
                            <li>پوشهَ وجود ندارد!</li>
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