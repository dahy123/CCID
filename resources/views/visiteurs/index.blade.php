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

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4 h-100 overflow-auto pb-5" style="margin-left: 16.6667%;">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h3>Visiteurs</h3>
                    <a href="visiteurs/create"
                        class="btn  btn-outline-visiteurs rounded-0 d-flex align-items-center gap-1">
                        <span>Ajouter un visiteur</span>
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
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Motif</th>
                                <th scope="col" class="text-end" style="padding-right: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visiteurs as $visiteur)
                                <tr>
                                    <td>{{ $visiteur->id }}</td>
                                    <td>{{ $visiteur->nom}}</td>
                                    <td>{{ $visiteur->prenom}}</td>
                                    <td>{{ $visiteur->email}}</td>
                                    <td>{{ $visiteur->contact}}</td>
                                    <td>{{ $visiteur->adresse }}</td>
                                    <td>{{ $visiteur->motif }}</td>
                                    <td class="text-md-end text-sm-center">
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/visiteurs/{{ $visiteur->id }}/edit">
                                            <i class="bi bi-pencil"></i>
                                            <span class="d-md-inline-block d-sm-none">Modifier</span>
                                        </a>
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/visiteurs/{{ $visiteur->id }}/destroy">
                                            <i class="bi bi-trash"></i>
                                            <span class="d-md-inline-block d-sm-none">Supprimer</span>
                                        </a>
                                    </td>
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