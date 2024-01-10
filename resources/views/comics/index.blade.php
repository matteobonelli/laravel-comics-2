@extends('layouts.app')

@section('title', 'Comics')

@section('content')
<main class="bg-dark " id='comics'>
    <div class="container main-content py-5">
        <div class="btn current-series text-uppercase text-light">Current series</div>
        <div>
            <form action="{{route('comics.index')}}" method="GET" class="d-flex my-4">
                <select name="search" id="search" class="gy-3">
                    <option value="">All</option>
                    <option value="comic book">Comic Book</option>
                    <option value="graphic novel">Graphic Novel</option>
                </select>
                <button type="submit" class="btn bnt-danger ms-3">Cerca</button>
            </form>
        </div>
        @if (session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
        @endif
        
        <div class="row">
            @foreach ($comics as $comic)
            <div class="col-12 col-md-2 mb-4">
                <a href="{{route('comics.show', $comic->id)}}">
                    <img src="{{$comic->thumb}}" :alt="{{$comic->title}}" class="mb-3">
                <h5 class="text-uppercase text-light">{{ $comic->series }}</h5>
                </a>
                <form action="{{route('comics.destroy', $comic->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cancel-button btn text-uppercase w-50" data-item-title="{{$comic->title}}"> Delete</button>
                </form>
                
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            <button class="btn text-uppercase me-4">Load more</button>
            <a href="{{route('comics.create')}}"><button class="btn text-uppercase me-4">Create</button></a>
        </div>
    </div>
    
</main>
@include('partials.modal_delete')
@endsection