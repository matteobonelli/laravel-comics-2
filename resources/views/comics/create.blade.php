@extends('layouts.app')

@section('title', 'Comic Create')

@section('content')
<main class="bg-dark " id='comic'>
    <div class="container py-5 text-light">
        <form action="{{route('comics.store')}}" method="POST">
            @csrf

            <input type="text" id="title" name="title" placeholder="Inserisci un titolo" class="form-control">
            <input type="text" id="description" name="description" placeholder="Inserisci una descrizione" class="form-control">
            <input type="text" id="price" name="price" placeholder="Inserisci un prezzo" class="form-control">
            <input type="text" id="type" name="type" placeholder="Inserisci un tipo" class="form-control">

            <button type="submit">Invia</button>

        </form>
    </div>
    
</main>

@endsection