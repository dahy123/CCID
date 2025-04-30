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
                    <h3>Secteurs d'activités</h3>
                    <a href="activites/create" class="btn  btn-outline-dark rounded-0 d-flex align-items-center gap-1">
                        <span>Ajouter un secteur</span>
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success rounded-0">{{ session('success') }}</div>
                @endif

                <div class="table-responsive small">
                    <table class="table table-striped table-border fs-6">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col" class="text-end " style="padding-right: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activites as $visiteur)
                                <tr>
                                    <td>{{ $visiteur->id }}</td>
                                    <td>{{ $visiteur->nom}}</td>
                                    <td>{{ $visiteur->description }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/activites/{{ $visiteur->id }}/edit">
                                            <i class="bi bi-pencil"></i>
                                            <span>Modifier</span>
                                        </a>
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/activites/{{ $visiteur->id }}/destroy">
                                            <i class="bi bi-trash"></i>
                                            <span>Supprimer</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>