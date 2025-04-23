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
                    <h3>Operateurs</h3>
                    <a href="operateurs/create"
                        class="btn btn-outline-secondary rounded-0 d-flex align-items-center gap-1">
                        <span>Ajouter un operateur</span>
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
                                <th scope="col">Photo</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Raison</th>
                                <th scope="col">Formel</th>
                                <th scope="col">NIF</th>
                                <th scope="col">STAT</th>
                                <th scope="col">RC</th>
                                <th scope="col" class="text-end" style="padding-right: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operateurs as $operateur)
                                <tr>
                                    <td>{{ $operateur->id }}</td>
                                    <td>
                                        @if ($operateur->photo)
                                            <img src="{{ asset('storage/' . $operateur->photo) }}" alt="Photo de {{ $operateur->nom }}" style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <span>Aucune photo</span>
                                        @endif
                                    </td>
                                    <td>{{ $operateur->nom }}</td>
                                    <td>{{ $operateur->adresse }}</td>
                                    <td>{{ $operateur->contact }}</td>
                                    <td>{{ $operateur->email }}</td>
                                    <td>{{ $operateur->type }}</td>
                                    <td>{{ $operateur->raison }}</td>
                                    <td>{{ $operateur->formel ? 'Formel' : 'Informel' }}</td>
                                    <td>{{ $operateur->nif }}</td>
                                    <td>{{ $operateur->stat }}</td>
                                    <td>{{ $operateur->rc }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-warning rounded-0"
                                            href="{{ route('operateurs.show', $operateur->id) }}">Voir</a>
                                        <a class="btn btn-info rounded-0"
                                            href="/operateurs/{{ $operateur->id }}/edit">Modifier</a>
                                        <a class="btn btn-danger rounded-0"
                                            href="/operateurs/{{ $operateur->id }}/destroy">Supprimer</a>
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