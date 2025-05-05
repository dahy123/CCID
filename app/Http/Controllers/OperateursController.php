<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use App\Models\Operateurs;
use App\Notifications\NouveauOperateurRegistrer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class OperateursController extends Controller
{
    /**
     * Afficher la liste des opérateurs.
     */
    public function index()
    {

        $operateurs = Operateurs::all(); // Récupère tous les opérateurs
        return view("operateurs.index", compact("operateurs")); // Retourne la vue avec les données
    }

    /**
     * Afficher le formulaire de création d'un opérateur.
     */
    public function create()
    {
        $activites = Activites::all();
        return view("operateurs.create", compact("activites")); // Retourne la vue de création
    }

    /**
     * Enregistrer un nouvel opérateur dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation pour les images
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'email' => 'required|email|max:255', // Validation pour un email valide
            'type' => 'required|string|max:50',
            'activites_id' => 'required',
            'raison' => 'required|string|max:255',
            'formel' => 'required',
            'nif' => 'nullable|string|max:50',
            'stat' => 'nullable|string|max:50',
            'rc' => 'nullable|string|max:50',
        ]);

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('images', 'public');
            $validated['photo'] = $imagePath;
        }

        // Création de l'opérateur
        $create = Operateurs::create($validated);

        if ($create) {
            $operateurs = new Operateurs();
            // Envoyer un notification  à une opérateur enregistrer
            // Operateurs::notify(new NouveauOperateurRegistrer());
            $operateurs->notify(new NouveauOperateurRegistrer());

            // Redirection avec un message de succès
            return redirect('/operateurs')->with('success', 'L\'ajout d\'un nouvel opérateur a bien été effectué.');
        }

    }

    /**
     * Afficher les détails d'un opérateur spécifique.
     */
    public function show(string $id)
    {
        $operateur = Operateurs::findOrFail($id); // Récupère l'opérateur par son ID
        return view('operateurs.show', compact('operateur')); // Retourne une vue avec les détails
    }

    /**
     * Afficher le formulaire d'édition d'un opérateur.
     */
    public function edit(string $id)
    {
        $activites = Activites::all();
        $operateur = Operateurs::findOrFail($id); // Récupère l'opérateur par son ID
        return view('operateurs.edit', compact('operateur', 'activites')); // Retourne la vue d'édition
    }

    /**
     * Mettre à jour un opérateur existant.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données
        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'type' => 'required|string|max:50',
            'activites_id' => 'required',
            'raison' => 'required|string|max:255',
            'formel' => 'required',
            'nif' => 'nullable|string|max:50',
            'stat' => 'nullable|string|max:50',
            'rc' => 'nullable|string|max:50',
        ]);

        $operateur = Operateurs::findOrFail($id); // Récupère l'opérateur par son ID

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            // Supprime l'ancienne photo si elle existe
            if ($operateur->photo) {
                Storage::disk('public')->delete($operateur->photo);
            }
            $imagePath = $request->file('photo')->store('images', 'public');
            $validated['photo'] = $imagePath;
        }

        // Mise à jour des données
        $operateur->update($validated);

        // Redirection avec un message de succès
        return redirect('/operateurs')->with('success', 'Les informations de l\'opérateur ont été mises à jour.');
    }

    /**
     * Supprimer un opérateur.
     */
    public function destroy(string $id)
    {
        $operateur = Operateurs::findOrFail($id); // Récupère l'opérateur par son ID

        // Supprime la photo si elle existe
        if ($operateur->photo) {
            Storage::disk('public')->delete($operateur->photo);
        }

        // Supprime l'opérateur
        $operateur->delete();

        // Redirection avec un message de succès
        return redirect('/operateurs')->with('success', 'L\'opérateur a été supprimé avec succès.');
    }


    /**
     * Télécharger les données d'un opérateur au format PDF.
     */
    public function downloadPdf(string $id)
    {
        $operateur = Operateurs::findOrFail($id); // Récupère l'opérateur par son ID

        // Charger une vue pour le PDF
        $pdf = PDF::loadView('operateurs.pdf', compact('operateur'));


        // Télécharger le fichier PDF
        return $pdf->download('Operateur-' . $operateur->id . '-' . $operateur->nom . '.pdf');
    }
}
