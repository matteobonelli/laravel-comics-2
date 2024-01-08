@extends('layouts.app')

@section('title', 'Comic Create')

@section('content')
<main class="bg-dark " id='comic'>
    <div class="container py-5 text-light text-center d-flex justify-content-center align-items-center flex-column ">
        <h2 class="text-center my-3 display-3 fw-bold dc-color">Crea il tuo fumetto!</h2>
        <div class="w-50">
            <form action="{{route('comics.store')}}" method="POST">
                @csrf
                <div class="my-2">
                    <h2 class="text-light">
                        Titolo
                    </h2>
                    <input type="text" id="title" name="title" placeholder="Inserisci un titolo" class="form-control gy-3">
                </div>
                <div class="my-2">
                    <h2 class="text-light">
                        Descrizione
                    </h2>
                    <textarea type="text" id="description" name="description" placeholder="Inserisci una descrizione" class="form-control gy-3"></textarea>
                </div>
                <div class="my-2">
                    <h2 class="text-light">Prezzo</h2>
                    <input type="text" id="price" name="price" placeholder="Inserisci un prezzo" class="form-control gy-3">
                </div>
                <div class="my-2">
                    <h2>Tipologia</h2>
                    <input type="text" id="type" name="type" placeholder="Inserisci una tipologia" class="form-control gy-3">
                </div>
                
    
                <button type="submit" class="btn btn-light my-2">Invia</button>
    
            </form>
        </div>
        
    </div>
    
</main>

@endsection