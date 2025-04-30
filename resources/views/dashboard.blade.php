<!DOCTYPE html>
<html lang="fr" data-bs-theme="auto" class="h-100">

<x-head></x-head>

<body class="h-100 overflow-hidden"> <!-- Empêche le scroll global -->

    <x-svg></x-svg>

    <x-header></x-header>

    <div class="container-fluid h-100">
        <div class="row h-100">

            <!-- Sidebar -->
            <x-sidebar class="col-md-3 col-lg-2 d-md-block bg-light sidebar position-fixed h-100"></x-sidebar>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4 h-100 overflow-auto pb-5 pt-3" style="margin-left: 16.6667%;">

                <!-- Statistiques principales -->
                <div class="row mb-4">
                    <!-- Nombre d'Opérateurs -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #f8f9fa;">
                            <div class="card-body">
                                <i class="bi bi-people-fill text-primary fs-1 mb-3"></i>
                                <h5 class="card-title">Nombre d'Opérateurs</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $nombreOperateurs }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nombre de Secteurs -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #e9f7ef;">
                            <div class="card-body">
                                <i class="bi bi-diagram-3-fill text-success fs-1 mb-3"></i>
                                <h5 class="card-title">Nombre de Secteurs</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $nombreSecteurs }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Nombre de Visiteurs -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #fef7e0;">
                            <div class="card-body">
                                <i class="bi bi-person-lines-fill text-warning fs-1 mb-3"></i>
                                <h5 class="card-title">Nombre de Visiteurs</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $nombreVisiteurs }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Rapport par Jour -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #f8e8e8;">
                            <div class="card-body">
                                <i class="bi bi-calendar-event-fill text-danger fs-1 mb-3"></i>
                                <h5 class="card-title">Rapport par Jour</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $rapportParJour ?? "0" }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Nouveaux contenus -->
                <div class="row mb-4">
                    <!-- Opérateurs Formels -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #e9f7ef;">
                            <div class="card-body">
                                <i class="bi bi-briefcase-fill text-success fs-1 mb-3"></i>
                                <h5 class="card-title">Opérateurs Formels</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $nombreOperateursFormels }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Opérateurs Informels -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #fef7e0;">
                            <div class="card-body">
                                <i class="bi bi-briefcase text-warning fs-1 mb-3"></i>
                                <h5 class="card-title">Opérateurs Informels</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $nombreOperateursInformels }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Activités Totales -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #f8f9fa;">
                            <div class="card-body">
                                <i class="bi bi-bar-chart-fill text-primary fs-1 mb-3"></i>
                                <h5 class="card-title">Activités Totales</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $nombreActivites }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Visiteurs Récents -->
                    <div class="col-md-3">
                        <div class="card text-center shadow-sm border-0" style="background-color: #f8e8e8;">
                            <div class="card-body">
                                <i class="bi bi-person-check-fill text-danger fs-1 mb-3"></i>
                                <h5 class="card-title">Visiteurs Récents</h5>
                                <p class="card-text fs-4 fw-bold text-dark">{{ $visiteursRecents }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tableaux -->
                <div class="d-flex gap-4">
                    <div class="col-7">
                        <h3>Rapports des visiteurs</h3>
                        <div class="table-responsive small">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Nombre de Visiteurs</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($visiteursParJour as $jour)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jour->date }}</td>
                                            <td>{{ $jour->nombre }}</td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-5">
                        <h3>Top 5 des Secteurs d'Activité</h3>
                        <div class="table-responsive small">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Secteur</th>
                                        <th scope="col">Activité</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topSecteurs as $secteur)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $secteur->nom }}</td>
                                            <td>{{ $secteur->activite }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Nouveaux tableaux -->
                <div class="row mt-4">
                    <div class="col-6">
                        <h3>Opérateurs par Type</h3>
                        <div class="table-responsive small">
                            <table class="table table-striped">
                                <thead>
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
                    <div class="col-6">
                        <h3>Visiteurs Récents</h3>
                        <div class="table-responsive small">
                            <table class="table table-striped">
                                <thead>
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
                </div>

                <footer class="py-3 text-center mt-5 mb-1 bg-light">
                    <div>copyright (c) 2025 | Gestion CCID</div>
                </footer>

            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>