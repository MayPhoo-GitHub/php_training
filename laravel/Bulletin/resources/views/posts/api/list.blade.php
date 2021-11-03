<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test AJAX List</title>
    <script src="{{ asset('js/lib/jquery.min.js') }}"></script>
</head>
<body>
    <a href="/api-view/post/create">Create</a>
    <table>
        <thead>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>Operation</th>
        </thead>
        <tbody></tbody>
    </table>
    
    <script>
        $.ajax({
        url: "/api/post/list",
        type: 'GET',
        dataType: 'json', // added data type
            success: function(res) {
                res.forEach(post => {
                    $('tbody').append(
                        `<tr><td>${post.id}</td><td>${post.title}</td><td>${post.description}</td><td><button onclick="deletePost(${post.id})">Delete</button> <a href="/api-view/post/${post.id}/edit">Edit</a></td></tr>`);
                });
            }
        });
        function deletePost(id) {
            alert(id);

            $.ajax({
            url: `/api/post/delete/${id}`,
            type: 'DELETE',
            success: function(result) {
                alert("success");
                location.reload();
            },
            error: function(result) {
                alert("fail");
            }
            });
        }
    </script>
</body>
</html>