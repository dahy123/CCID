<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'opérateur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            border-radius: 50%;
            border: 3px solid #ddd;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }

        .header h1 {
            margin: 10px 0 5px;
            font-size: 24px;
            color: #007bff;
        }

        .header p {
            margin: 0;
            font-size: 16px;
            color: #555;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #007bff;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }

        .section table {
            width: 100%;
            border-collapse: collapse;
        }

        .section table th,
        .section table td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .section table th {
            width: 30%;
            color: #555;
        }

        .section table td {
            color: #333;
        }

        .actions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<x-head></x-head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            @if ($operateur->photo)
                <img src="{{ asset('storage/' . $operateur->photo) }}" alt="Photo de {{ $operateur->nom }}">
            @else
                <img src="{{ asset('storage/images/default.png') }}" alt="Photo de default">
            @endif
            <h1>{{ $operateur->nom }}</h1>
            <p>{{ $operateur->type }} - {{ $operateur->raison }}</p>
        </div>

        <!-- Informations personnelles -->
        <div class="section">
            <h2>Informations personnelles</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <td>{{ $operateur->id }}</td>
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
                    <th>Formel</th>
                    <td>{{ $operateur->formel ? 'Formel' : 'Informel' }}</td>
                </tr>
            </table>
        </div>

        <!-- Informations administratives -->
        <div class="section">
            <h2>Informations administratives</h2>
            <table>
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
        </div>

        <!-- Actions -->
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('operateurs.pdf', $operateur->id) }}" class="btn btn-outline-dark">Télécharger les données</a>
            <a href="/operateurs" class="btn btn-secondary bg-dark">Retour</a>
        </div>
    </div>
</body>

</html>