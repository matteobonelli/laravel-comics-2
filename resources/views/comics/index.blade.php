@extends('layouts.app')

@section('title', 'Comics')

@section('content')
<main class="bg-dark " id='comics'>
    <div class="container main-content py-5">
        <div class="btn current-series text-uppercase text-light">Current series</div>
        <div class="row">
            @foreach ($comics as $comic)
            <div class="col-12 col-md-2 mb-4">
                <a href="{{route('comics.show', $comic->id)}}">
                    <img src="{{$comic->thumb}}" :alt="{{$comic->title}}" class="mb-3">
                <h5 class="text-uppercase text-light">{{ $comic->series }}</h5>
                </a>
                
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn text-uppercase ">Load more</button>
        </div>
    </div>
    
</main>

@endsection