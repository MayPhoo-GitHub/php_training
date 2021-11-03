<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <h1>Edit Post</h1>
    <label for="title">Title</label><input type="text" name="title">
    <label for="title">Description</label><input type="text" name="description">
    <button onclick="editPost()">Edit</button>

    <script>
        var postId = window.location.pathname.split('/')[3];
        $.ajax({
        url: "/api/post/" + postId,
        type: 'GET',
        dataType: 'json', // added data type
            success: function(res) {
                $('[name=title]').val(res.title);
                $('[name=description]').val(res.description);
            }
        });
        function editPost() {
            var editedData = {
                title: $('[name=title]').val(),
                description: $('[name=description]').val(),
            }

            $.ajax({
            url: "/api/post/edit/" + postId,
            type: 'POST',
            data: editedData,
            dataType: 'json', // added data type
                success: function(res) {
                    window.location.replace("/api-view/post");
                }
            });
        }
    </script>
</body>
</html>