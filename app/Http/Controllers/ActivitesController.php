<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activites=Activites::all();
        return view("activites.index",compact("activites"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view("activites.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom"=> "required",
            "description"=> "required",
        ]);

        $activite = new Activites();
        $activite->nom=$request->nom;
        $activite->description=$request->description;
        $activite->save();

        return redirect("/activites")->with("success","L'ajout d'un nouvel secteur d'activité a été validé.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activites=Activites::find( $id );
        return view("activites.show",compact("activites"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activite=Activites::find( $id );
        return view("activites.edit",compact("activite"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activite = Activites::find($id);
        $request->validate([
            "nom"=> "required",
            "description"=> "required",
        ]);
        $activite->nom=$request->nom;
        $activite->description=$request->description;
        $activite->update();

        return redirect("/activites")->with("success","Modificaton a bien effectué avec sucès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activite = Activites::find($id);
        $activite->delete();

        return redirect("/activites")->with("success","L'operation à bien effectué avec succès.");
    }
}
