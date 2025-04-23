<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'opérateur</title>
</head>
<body>
    <h1>Détails de l'opérateur</h1>

    <p><strong>ID :</strong> {{ $operateur->id }}</p>
    <p><strong>Nom :</strong> {{ $operateur->nom }}</p>
    <p><strong>Adresse :</strong> {{ $operateur->adresse }}</p>
    <p><strong>Contact :</strong> {{ $operateur->contact }}</p>
    <p><strong>Email :</strong> {{ $operateur->email }}</p>
    <p><strong>Type :</strong> {{ $operateur->type }}</p>
    <p><strong>Raison :</strong> {{ $operateur->raison }}</p>
    <p><strong>Formel :</strong> {{ $operateur->formel ? 'Formel' : 'Informel' }}</p>
    <p><strong>NIF :</strong> {{ $operateur->nif }}</p>
    <p><strong>STAT :</strong> {{ $operateur->stat }}</p>
    <p><strong>RC :</strong> {{ $operateur->rc }}</p>
    <p>
        <strong>Photo :</strong>
        @if ($operateur->photo)
            <img src="{{ asset('storage/' . $operateur->photo) }}" alt="Photo de {{ $operateur->nom }}" style="width: 100px; height: 100px; object-fit: cover;">
        @else
            <span>Aucune photo</span>
        @endif
    </p>

    <a href="{{ route('operateurs.pdf', $operateur->id) }}" class="btn btn-primary">Télécharger les données</a>
    <a href="/operateurs" class="btn btn-secondary">Retour</a>
</body>
</html>