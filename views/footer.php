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
        $('#addFolderInput').focus();
    });
</script>
</body>

</html>