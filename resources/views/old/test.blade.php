@extends('layout')


@section('content')
<html>
    <article>
        <h1>{{$post->title}}</h1>
        <h2>{{$post->user->name}}</h2>
        <h3>{{$post->user->username}}</h3>
        <h3>{{$post->category->name}}</h3>
        <a href="{{$post->slug}}">123</a>
        {{ $post->body }}
    </article> 
    <hr>
</html>
@endsection


