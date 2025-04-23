<?php

namespace App\Http\Controllers;

use App\Models\Utilisateurs;
use Illuminate\Http\Request;

class UtilisateursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilisateurs = Utilisateurs::all();
        return view("utilisateurs.index", compact("utilisateurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("utilisateurs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "image" => "nullable",
            "pseudo" => "required",
            "email" => "required",
            "mdp" => "required",
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        Utilisateurs::create($validated);

        return redirect("/utilisateurs")->with("success", "L'ajout d'un nouvel utilisateur a bien effectué.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $utilisateur = Utilisateurs::find($id);
        return view("utilisateurs.show", compact("utilisateur"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $utilisateur = Utilisateurs::find($id);
        return view("utilisateurs.edit", compact("utilisateur"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $utilisateur = Utilisateurs::find($id);

        $validated = $request->validate([
            "image" => "nullable",
            "pseudo" => "required",
            "email" => "required",
            "mdp" => "required",
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
        }

        $utilisateur->update($validated);

        return redirect("/utilisateurs")->with("success", "Modification d'un nouvel utilisateur a bien effectué.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $utilisateur = Utilisateurs::find($id);
        $utilisateur->delete();
        return redirect("/utilisateurs")->with("success", "L'operation à bien effectué avec succès.");

    }
}
