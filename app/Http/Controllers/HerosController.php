<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Skills;

class HerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heros = Hero::all();
        return view('heros.index', compact('heros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skills::all();

        return view('heros.create', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'description' => 'required'
        ]);
//dd($request);
        $heros = Hero::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'race' => $request->race,
            'description' => $request->description,
        ]);

        $heros->skills()->attach($request->skills);
        // Alternative
        // Product::create($request->all());

        return redirect()->route('heros.index')
            ->with('success', 'Héro ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hero = Hero::findOrFail($id);
        $skills = Skills::all();

        return view('heros.edit', compact('hero', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateHero = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'race' => 'required',
            'description' => 'required',
        ]);
//dd($request);
        Hero::whereId($id)->update($updateHero);
        return redirect()->route('heros.index')
            ->with('success', 'Le héro a été mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);
        $hero->delete();
        return redirect('/heros')->with('success', 'Héro supprimé avec succès');
    }
}
