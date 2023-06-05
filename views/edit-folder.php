<?php include "../bootstrap/init.php"; ?>
<?php include "header.php";
$folderId = $_GET['folderId'];
$folder = getFolder($folderId);
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

                    <input type="text" placeholder="نام فعلی : <?= $folder[0]->name ?> " id="editFolderInput" style="width: 50%">
                    <button type="submit" id="editFolderBtn" style="background-color: #89ddff">ویرایش پوشه</button>
                </div>
            </div>
            <div class="content">
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<?php include "footer.php"; ?>
