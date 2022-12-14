<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
</div>

@if(!$post->comments->isEmpty())
    <h3 class="mb-5">Комментарии</h3>
    @foreach($post->comments as $comment)
        <div>
            <p>Имя: {{ $comment->name }}</p>
            <p>Почта: {{ $comment->email }}</p>
            <p>Комментарий: {{ $comment->body }}</p>
            <hr>
        </div>
    @endforeach
@endif
</body>
</html>
