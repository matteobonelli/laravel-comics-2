<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Comic;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        //dd($request->query());
        if (!empty($request->query('search'))) {
            $search = $request->query('search');
            $comics = Comic::where('type', $search)->get();

        } else {
            $comics = Comic::all();
        }

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
    public function store(StoreComicRequest $request)
    {

        $form_data = $request->validated();
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
    public function update(UpdateComicRequest $request, Comic $comic)
    {

        $form_data = $request->validated();
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
