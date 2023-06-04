<div class="nav">
    <div class="searchbox">
        <div>
            <input type="search" id="search" placeholder="جستجو کنید" />
            <div class="search-results" style="display: none;"></div>
        </div>
    </div>
    <div class="menu">
        <ul>
            <?php foreach ($categories as $category) : ?>
                <a href="<?= siteUrl("$category->address") ?>?cat_id=<?= $category->id ?>">
                    <li class="<?= isset($_GET['cat_id']) && $_GET['cat_id'] == $category->id ? 'active' : '' ?>"><i class="<?= $category->class ?>"></i>
                        <?= $category->name ?></li>
                </a>
            <?php endforeach; ?>
        </ul>
    </div>
</div>