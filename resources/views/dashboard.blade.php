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
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4 h-100 overflow-auto" style="margin-left: 16.6667%;">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3>Tableau de board</h3>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button"
                            class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                            <svg class="bi" aria-hidden="true">
                                <use xlink:href="#calendar3" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Statistiques principales -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Nombre d'Opérateurs</h5>
                                <p class="card-text fs-4">{{ $nombreOperateurs }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de Secteurs</h5>
                                <p class="card-text fs-4">{{ $nombreSecteurs }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de Visiteurs</h5>
                                <p class="card-text fs-4">{{ $nombreVisiteurs }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Rapport par Jour</h5>
                                <p class="card-text fs-4">{{ $rapportParJour ?? "0" }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphique -->
                <canvas class="my-4 w-100 d-none" id="myChart" width="900" height="380"></canvas>

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
                                    {{-- @foreach ($topSecteurs as $secteur)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $secteur->nom }}</td>
                                        <td>{{ $secteur->activite }}</td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>