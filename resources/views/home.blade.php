@extends('layouts.app')

@section('title', 'Home')

@section('content')
<ul>
    @foreach ($comics as $comic)
    <li>
        <a href="{{route('comics.show', $comic->id)}}">{{$comic->title}}</a>
    </li>

    @endforeach
</ul>

@endsection
