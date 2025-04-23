<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opérateur PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Détails de l'opérateur</h1>

    <table>
        <tr>
            <th>ID</th>
            <td>{{ $operateur->id }}</td>
        </tr>
        <tr>
            <th>Nom</th>
            <td>{{ $operateur->nom }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td>{{ $operateur->adresse }}</td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>{{ $operateur->contact }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $operateur->email }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $operateur->type }}</td>
        </tr>
        <tr>
            <th>Raison</th>
            <td>{{ $operateur->raison }}</td>
        </tr>
        <tr>
            <th>Formel</th>
            <td>{{ $operateur->formel ? 'Formel' : 'Informel' }}</td>
        </tr>
        <tr>
            <th>NIF</th>
            <td>{{ $operateur->nif }}</td>
        </tr>
        <tr>
            <th>STAT</th>
            <td>{{ $operateur->stat }}</td>
        </tr>
        <tr>
            <th>RC</th>
            <td>{{ $operateur->rc }}</td>
        </tr>
    </table>

    @if ($operateur->photo)
        <p><strong>Photo :</strong></p>
        <img src="{{ public_path('storage/' . $operateur->photo) }}" alt="Photo de {{ $operateur->nom }}" style="width: 150px; height: 150px; object-fit: cover;">
    @else
        <p><strong>Photo :</strong> Aucune photo disponible</p>
    @endif
</body>
</html>