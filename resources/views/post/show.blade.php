
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Posts</title>
</head>
<body>

    <h3>Show Post</h3>

    <table border='1'>
        <tr>
            <td>{{ $post->id }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->posted }}</td>
              <td>{{ $post->content }}</td>
              <td>{{ $post->created_at }}</td>
              <td>{{ $post->updated_at }}</td>
              <td>
            </td>
        </tr>
      </table>

</body>
</html>