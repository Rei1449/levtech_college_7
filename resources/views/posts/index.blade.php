<!DOCTYPE html>
<?php
$count = 0;
?>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
        <body>
            <h1 class="text-center">Name:{{ Auth::user()->name}}</h1>
            <div class='text-center'>
                @foreach ($posts as $post)
                    
                    <div class='post'>
                        <a href='/posts/{{$post->id}}'><h2 class='title'>{{ $post->title }}</h2></a>
                        <p class='body'>{{ $post->body }}</p>
                        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                        </form>
                        <?php
                        $count ++;
                        ?>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
            
            <div>
                @foreach($questions as $question)
                    <div>
                        <a href="https://teratail.com/questions/{{ $question['id'] }}">
                            {{ $question['title'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </body>
    </x-app-layout>
</html>