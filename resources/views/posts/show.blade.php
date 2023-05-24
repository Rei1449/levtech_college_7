<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class='posts'>
            <div class='post'>
                <a href='/'><h2 class='title'>{{ $post->title }}</h2></a>
                <p class='body'>{{ $post->body }}</p>
            </div>
        </div>
    </body>
</html>