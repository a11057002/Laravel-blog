@extends('layout')


@section('content')
<html>
    @foreach ( $posts as $post)
    <article>
        <h1>{{$post->title}}</h1>
        <h2>{{$post->user->name}}</h2>
        <a href="{{$post->slug}}">123</a>
        {{ $post->category->name }}
    </article> 
    <hr>
    @endforeach
</html>
@endsection


