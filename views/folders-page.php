<?php include "header.php"; ?>
<!-- partial:index.partial.html -->
    <div class="main">
    <?php include "nav.php"; ?>
        <div class="view">
            <div class="viewHeader">
                <div class="title">
                    <input id="addFolderInput" type="text" placeholder="نام پوشه را وارد کنید." style="width: 50%" >
                    <button id="addFolderBtn" type="submit" style="background-color: #12b6cb">افزودن پوشه</button>
                </div>
            </div>
            <div class="content">
                <div class="list">
                    <div class="title">همه پوشه ها</div>
                    <ul class="folderList">
                            <li>
                                <a href="#">
                                <i class="fa fa-folder"></i><span>نام فولدر</span></a>
                        <div class="info">
                            <a href="">
                                <div class="button danger" ">حذف</div></a>
                            <a href="#">
                            <div class="button green">ویرایش</div>
                            </a>
                            <span class="span">تاریخ ایجاد </span>
                        </div>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<?php include "footer.php"; ?>
