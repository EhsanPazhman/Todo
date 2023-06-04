<?php include "header.php"; ?>
<!-- partial:index.partial.html -->
<div class="main">
    <div class="view">
        <div class="viewHeader">
            <div class="title">
                <div class="searchbox">
                    <div style="width: 50%">
                        <input type="search" id="search" placeholder="جستجو کنید" />
                        <div class="search-results" style="display: none;">ddd</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="welcome">
        <h1>سلام <i>user</i> خوش آمدید</h1>
    </div>
    <div class="welcome">
        <h2>امروز چه برنامه ای داری؟</h2>
    </div>
    <div class="content" style="text-align: center;">
        <ul style="display: inline-flex;">
            <?php foreach ($categories as $category) : ?>
                <a href="<?= siteUrl("$category->address") ?>?cat_id=<?= $category->id ?>" 
    style="border: 0.5px solid blue; border-radius: 3px; padding: 8px; background: #f1f8ee; margin-left: 15px;">
    <li class="<?= isset($_GET['cat_id']) && $_GET['cat_id'] == $category->id ? 'active' : '' ?>"><i class="<?= $category->class ?>"></i>
       <?= $category->name ?></li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
</div>
<!-- partial -->
<?php include "footer.php"; ?>