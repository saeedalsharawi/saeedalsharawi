<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my website</title>
    <link rel="stylesheet " href="/app.css">
</head>
<body>

 @foreach($posts as $post)
 <article>
   {{!! $post !!}}
 </article>
 @endforeach
</body>
</html>
