<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Selamat {{$comment->user->name}} komentar anda yang berisi : {{ $comment->content }} di artikel {{ $comment->post->user->name}} yang  berjudul : {{$comment->post->title}} telah sukses .
</body>
</html>