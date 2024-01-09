<?php

namespace App\Http\Controllers;

//use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        //
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        //prendo i dati del form e dalla request
        $request->validate([
            'title' => 'required|min:5|max:255|unique:comics',
            'type' => 'required|max:30',
            'series' => 'required|max:100',
            'price' => 'required|max:20',
        ]);

        $form_data = $request->all();
        //creo un nuovo prodotto
        //$newComic = new Comic();
        //assegno i valori del form al nuovo prodotto
        //$newComic->fill($form_data);
        //salvo il nuovo prodotto
        //$newComic->save();
        $newComic = Comic::create($form_data);
        //reindirizzo l'utente alla pagina del nuovo prodotto appena creato
        return to_route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic $comic
     * @return \Illuminate\View\View;
     */
    public function show(Comic $comic)
    {
        //$comic = Comic::findOrFail($id);
        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     */
    public function update(Request $request, Comic $comic)
    {
        $form_data = $request->all();
        // $comic->title = $form_data['title'];
        // $comic->description = $form_data['description'];
        // $comic->thumb = $form_data['thumb'];
        // $comic->price = $form_data['price'];
        // $comic->type = $form_data['type'];
        // $comic->sale_date = '2020-01-08';
        // $comic->series = 'Pupazzi';
        $comic->fill($form_data);
        $comic->update();
        return to_route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('message', "Il fumetto $comic->title è stato eliminato");
    }
}
