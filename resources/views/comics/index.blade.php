@extends('layouts.app')

@section('title', 'Comics')

@section('content')
<main class="bg-dark " id='comics'>
    <div class="container main-content py-5">
        <div class="btn current-series text-uppercase text-light">Current series</div>
        <div class="d-flex justify-content-between my-4">
            <form action="{{route('comics.index')}}" method="GET" class="d-flex">
                <select name="select" id="select" class="gy-3 select-control">
                    <option value="">All</option>
                    <option value="comic book">Comic Book</option>
                    <option value="graphic novel">Graphic Novel</option>
                </select>
                <button type="submit" class="btn btn-outline-success ms-3 w-100">Cerca</button>
            </form>
            <form action="{{route('comics.index')}}" method="GET" class="d-flex" role="search">
                <input class="me-3 w-100 form-control" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cerca</button>
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
                <h5 class="text-uppercase text-light">{{ $comic->title }}</h5>
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