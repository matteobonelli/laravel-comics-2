@extends('layouts.app')

@section('title', 'Edit: ' .$comic->title)

@section('content')
<main class="bg-dark " id='comic'>
    <div class="container py-5 text-light d-flex justify-content-center align-items-center flex-column ">
        <h2 class="text-center my-3 display-3 fw-bold dc-color">Modifica il tuo fumetto!</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
            
        @endif
        <div class="w-50 text-center">
            <form action="{{route('comics.update', $comic->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="my-2">
                    <h2 class="text-light">
                        Titolo
                    </h2>
                    <input type="text" value="{{old('title', $comic->title)}}" id="title" name="title" placeholder="Inserisci un titolo" class="form-control gy-3">
                </div>
                <div class="my-2">
                    <h2 class="text-light">
                        Descrizione
                    </h2>
                    <textarea type="text" id="description" name="description" placeholder="Inserisci una descrizione" class="form-control gy-3">{{old('description', $comic->description)}}</textarea>
                </div>
                <div class="my-2">
                    <h2 class="text-light">
                        Immagine
                    </h2>
                    <input type="text" value="{{old('thumb', $comic->thumb)}}" id="thumb" name="thumb" placeholder="Inserisci un URL" class="form-control gy-3">
                </div>
                <div class="my-2">
                    <h2 class="text-light">Prezzo</h2>
                    <input type="text" value="{{old('price', $comic->price)}}" id="price" name="price" placeholder="Inserisci un prezzo" class="form-control gy-3">
                </div>
                <div class="my-2">
                    <h2>Tipologia</h2>
                    <select name="type" id="type" class="form-select gy-3">
                        <option value="comic book" {{old('type', $comic->type) == 'comic book' ? 'selected' : ''}}>Comic Book</option>
                        <option value="graphic novel" {{old('type', $comic->type) == 'graphic novel' ? 'selected' : ''}}>Graphic Novel</option>
                    </select>
                </div>
                <div class="my-2">
                    <h2>Sale Date</h2>
                    <input type="date" value="{{old('sale_date', $comic->sale_date)}}" id="sale_date" name="sale_date" class="form-control gy-3">
                </div>
                <div class="my-2">
                    <h2>Serie</h2>
                    <input type="text" value="{{old('series', $comic->series)}}" id="series" name="series" placeholder="Inserisci una tipologia" class="form-control gy-3">
                </div>
                
    
                <button type="submit" class="btn btn-light my-2">Invia</button>
    
            </form>
        </div>
        
    </div>
    
</main>

@endsection