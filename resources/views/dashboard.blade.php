<!DOCTYPE html>
<html lang="fr" data-bs-theme="auto" class="h-100">

<x-head></x-head>

<body class="h-100 overflow-hidden">

    <x-svg></x-svg>
    <x-header></x-header>

    <div class="container-fluid h-100">
        <div class="row h-100">
            <x-sidebar class="col-md-3 col-lg-2 d-md-block bg-light sidebar position-fixed h-100"></x-sidebar>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4 h-100 overflow-auto pb-5 pt-3" style="margin-left: 16.6667%;">

                <!-- Statistiques principales -->
                <div class="row mb-4">
                    @foreach ([
                        ['title' => "Nombre d'Opérateurs", 'value' => $nombreOperateurs, 'icon' => 'bi-people-fill', 'color' => '#f8f9fa'],
                        ['title' => "Nombre de Secteurs", 'value' => $nombreSecteurs, 'icon' => 'bi-diagram-3-fill', 'color' => '#e9f7ef'],
                        ['title' => "Nombre de Visiteurs", 'value' => $nombreVisiteurs, 'icon' => 'bi-person-lines-fill', 'color' => '#fef7e0'],
                        ['title' => "Nombre d'Utilisateurs", 'value' => $nombreUtilisateurs ?? "0", 'icon' => 'bi-person-badge-fill', 'color' => '#f8e8e8']
                    ] as $stat)
                        <div class="col-md-3">
                            <div class="card text-center shadow-sm border-0" style="background-color: {{ $stat['color'] }};">
                                <div class="card-body">
                                    <i class="bi {{ $stat['icon'] }} fs-1 "></i>
                                    <h5 class="card-title mt-3">{{ $stat['title'] }}</h5>
                                    <p class="card-text fs-4 fw-bold text-dark">{{ $stat['value'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Tableaux -->
                <div class="d-flex gap-4">
                    <!-- Rapports des visiteurs -->
                    <div class="col-7">
                        <h5 class="mb-3">Rapports des visiteurs</h5>
                        <div class="table-responsive shadow-sm rounded bg-white p-3">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Nombre de Visiteurs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visiteursParJour as $jour)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jour->date }}</td>
                                            <td>{{ $jour->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Top 5 des Secteurs -->
                    <div class="col-5">
                        <h5 class="mb-3">Top 5 des Secteurs</h5>
                        <div class="table-responsive shadow-sm rounded bg-white p-3">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Secteur</th>
                                        <th scope="col">Nombre d'Opérateurs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topSecteurs as $secteur)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $secteur->nom }}</td>
                                            <td>{{ $secteur->operateurs_count }}</td> <!-- Affiche le nombre d'opérateurs -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Opérateurs par Type -->
                <div class="row mt-4">
     <!-- Visiteurs Récents -->
     <div class="col-7">
        <h5 class="mb-3">Visiteurs Récents</h5>
        <div class="table-responsive shadow-sm rounded bg-white p-3">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Date</th>
                        <th scope="col">Motif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visiteursRecentsDetails as $visiteur)
                        <tr>
                            <td>{{ $visiteur->nom }}</td>
                            <td>{{ $visiteur->created_at->format('d/m/Y') }}</td>
                            <td>{{ $visiteur->motif }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

                    <div class="col-5">
                        <h5 class="mb-3">Opérateurs par Type</h5>
                        <div class="table-responsive shadow-sm rounded bg-white p-3">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operateursParType as $type => $nombre)
                                        <tr>
                                            <td>{{ $type }}</td>
                                            <td>{{ $nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

 

                <footer class="py-3 text-center mt-5 mb-4 bg-light">
                    <div>copyright (c) 2025 | Gestion CCID</div>
                </footer>

            </main>
        </div>
    </div>

    <x-footer></x-footer>

</body>
</html>