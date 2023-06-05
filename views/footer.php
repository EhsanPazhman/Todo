<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/script.js"></script>
<script>
    $(document).ready(function() {
        $('#addFolderBtn').click(function(e) {
            var input = $('input#addFolderInput');
            $.ajax({
                url: "<?= siteUrl('proccess/ajaxHandler.php') ?>",
                method: "POST",
                data: {
                    action: "addFolder",
                    folderName: input.val()
                },
                success: function(response) {
                    if (response == '') {
                        $('<i class="fa fa-folder"></i><span>' + input.val() + '</span>').appendTo('ul.folderList');
                        location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        });
        $('#editFolderBtn').click(function(e) {
            var folder = $('#editFolderInput');
            $.ajax({
                url: "<?= siteUrl('proccess/ajaxHandler.php') ?>",
                method: "POST",
                data: {
                    action: "updateFolder",
                    folderId: <?= $_GET['folderId'] ?? 0 ?>,
                    folderName: folder.val()
                },
                success: function(response) {
                    if (response == '') {
                        alert('ویرایش با موفقیت انجام شد');
                        location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        });

        $('#addTaskBtn').click(function(e) {
            var input = $('input#newTaskInput');
            $.ajax({
                url: "<?= siteUrl('proccess/ajaxHandler.php') ?>",
                method: "POST",
                data: {
                    action: "addTask",
                    folderId: <?= $_GET['folderId'] ?? 0 ?>,
                    taskTitle: input.val()
                },
                success: function(response) {
                    if (response == '') {
                        $('<span>' + input.val() + '</span>').appendTo('ul.taskList');
                        location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        });

        $('#editTaskBtn').click(function(e) {
            var task = $('input#editTaskInput');
            $.ajax({
                url: "<?= siteUrl('proccess/ajaxHandler.php') ?>",
                method: "POST",
                data: {
                    action: "updateTask",
                    taskId: <?= $_GET['taskId'] ?? 0 ?>,
                    taskTitle: task.val()
                },
                success: function(response) {
                    if (response == '') {
                        alert('ویرایش با موفقیت انجام شد');
                        location.reload();
                    } else {
                        alert(response);
                    }
                }
            });
        });

        $('.isDone').click(function(e) {
            var tId = $(this).attr('data-taskId');
            $.ajax({
                url: "<?= siteUrl('proccess/ajaxHandler.php') ?>",
                method: "POST",
                data: {
                    action: "doneSwitch",
                    taskId: tId
                },
                success: function(response) {
                    location.reload();
                }
            });
        });

        $('input#search').keyup(function() {
            const input = $(this);
            const searchResult = $('.search-results');
            searchResult.html('در حال جستجو......');
            $.ajax({
                url: "<?= siteUrl('proccess/search.php') ?>",
                method: "POST",
                data: {
                    keyword: input.val()
                },
                success: function(response) {
                    searchResult.slideDown().html(response);
                }
            });
        });

        $('#newTaskInput').focus();
        $('#addFolderInput').focus();
        $('#editFolderInput').focus();
        $('#editTaskInput').focus();
    });
</script>
</body>

</html>