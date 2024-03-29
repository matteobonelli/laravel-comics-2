@extends('layouts.app')

@section('title', $comic->title)

@section('content')
<main class="bg-dark " id='comic'>
    <div class="container py-5 text-light">
        <div class="row">
            <div class="col-12">
                
                <img src="{{$comic->thumb}}" :alt="{{$comic->title}}" class="mb-3 w-25">
                <h2 class="text-uppercase text-light">{{ $comic->title }}</h2>
                <h5 class="text-uppercase text-light">{{ $comic->series }}</h5>
                <p>
                    {{$comic->description}}
                </p>
                <h4>
                    {{$comic->price}}$ || {{$comic->type}} || {{$comic->sale_date}}
                </h4>
                
                
            </div>
        </div>
        <a href="{{route('comics.edit', $comic->id)}}"class="btn btn-primary me-4 mb-3">Modifica Fumetto</a>
        <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="cancel-button btn btn-danger text-uppercase " data-item-title="{{$comic->title}}"> Delete</button>
        </form>
    </div>
    
</main>
@include('partials.modal_delete')
@endsection