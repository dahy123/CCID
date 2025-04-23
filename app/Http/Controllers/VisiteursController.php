<?php

namespace App\Http\Controllers;

use App\Models\Visiteurs;
use Illuminate\Http\Request;

class VisiteursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiteurs = Visiteurs::all();
        return view("visiteurs.index", compact("visiteurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("visiteurs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "email" => "required",
            "contact" => "required",
            "adresse" => "nullable",
            "motif" => "required",
        ]);

        Visiteurs::create($validated);

        return redirect("/visiteurs")->with("success", "L'ajout d'un nouvel visiteur a bien effectué.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilisateur = Visiteurs::find($id);
        return view("visiteurs.show", compact("utilisateur"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visiteur = Visiteurs::find($id);
        return view("visiteurs.edit", compact("visiteur"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $visiteur = Visiteurs::find($id);

        $request->validate([
            "nom" => "required",
            "prenom" => "required",
            "email" => "required",
            "contact" => "required",
            "adresse" => "nullable",
            "motif" => "required",
        ]);
        $visiteur->nom = $request->nom;
        $visiteur->prenom = $request->prenom;
        $visiteur->email = $request->email;
        $visiteur->contact = $request->adresse;
        $visiteur->adresse = $request->adresse;
        $visiteur->motif = $request->motif;
        $visiteur->update();

        return redirect("/visiteurs")->with("success", "Modification d'un nouvel utilisateur a bien effectué.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = Visiteurs::find($id);
        $utilisateur->delete();
        return redirect("/visiteurs")->with("success", "L'operation à bien effectué avec succès.");

    }
}
