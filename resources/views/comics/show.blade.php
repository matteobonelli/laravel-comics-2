@extends('layouts.app')

@section('title', $comic->title)

@section('content')
<main class="bg-dark " id='comic'>
    <div class="container py-5 text-light">
        <div class="row">
            <div class="col-12">
                
                <img src="{{$comic->thumb}}" :alt="{{$comic->title}}" class="mb-3">
                <h2 class="text-uppercase text-light">{{ $comic->title }}</h2>
                <h5 class="text-uppercase text-light">{{ $comic->series }}</h5>
                <p>
                    {{$comic->description}}
                </p>
                <h4>
                    {{$comic->price}} || {{$comic->type}} || {{$comic->sale_date}}
                </h4>
                
                
            </div>
        </div>
    </div>
    
</main>

@endsection