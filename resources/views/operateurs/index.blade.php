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
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-4 h-100 overflow-auto pb-5" style="">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2  border-bottom">
                    <h3>Opérateurs</h3>
                    <a href="operateurs/create" class="btn btn-outline-dark rounded-0 d-flex align-items-center gap-1">
                        <span>Ajouter un opérateur</span>
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success rounded-0">{{ session('success') }}</div>
                @endif

                <div class="table-responsive small d-none">
                    <table class="table table-striped table-border fs-6">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                {{-- <th scope="col">Photo</th> --}}
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                {{-- <th scope="col">Raison</th>
                                <th scope="col">Formel</th>
                                <th scope="col">NIF</th>
                                <th scope="col">STAT</th>
                                <th scope="col">RC</th> --}}
                                <th scope="col">Secteur d'activité</th>
                                <th scope="col" class="text-end" style="padding-right: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operateurs as $operateur)
                                <tr>
                                    <td>{{ $operateur->id }}</td>
                                    {{-- <td>
                                        @if ($operateur->photo)
                                        <img src="{{ asset('storage/' . $operateur->photo) }}"
                                            alt="Photo de {{ $operateur->nom }}"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                        <img src="{{ asset('storage/images/default.png') }}" alt="Photo de default"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </td> --}}
                                    <td>{{ $operateur->nom }}</td>
                                    <td>{{ $operateur->adresse }}</td>
                                    <td>{{ $operateur->contact }}</td>
                                    <td>{{ $operateur->email }}</td>
                                    <td>{{ $operateur->type }}</td>
                                    {{-- <td>{{ $operateur->raison }}</td>
                                    <td>{{ $operateur->formel }}</td>
                                    <td>{{ $operateur->nif }}</td>
                                    <td>{{ $operateur->stat }}</td>
                                    <td>{{ $operateur->rc }}</td> --}}
                                    <td>{{ $operateur->activites->nom }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="{{ route('operateurs.show', $operateur->id) }}">
                                            <i class="bi bi-eye"></i>
                                            <span class="d-md-inline-block d-sm-none">Voir</span>
                                        </a>
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/operateurs/{{ $operateur->id }}/edit">
                                            <i class="bi bi-pencil"></i>
                                            <span class="d-md-inline-block d-sm-none">Modifier</span>
                                        </a>
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/operateurs/{{ $operateur->id }}/destroy">
                                            <i class="bi bi-trash"></i>
                                            <span class="d-md-inline-block d-sm-none">Supprimer</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row row-cols-1 row-cols-md-2 g-4 mb-5 py-4">
                    @foreach ($operateurs as $operateur)
                        <div class="col">
                            <div class="card shadow-lg border-0 h-100">
                                <div class="card-body d-flex align-items-center">
                                    <!-- Image à gauche -->
                                    <div class="me-4">
                                        @if ($operateur->photo)
                                            <img src="{{ asset('storage/' . $operateur->photo) }}" 
                                                alt="Photo de {{ $operateur->nom }}" 
                                                class="img-fluid rounded-circle border border-3 border-secondary"
                                                style="width: 120px; height: 120px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('storage/images/default.png') }}" 
                                                alt="Photo de default" 
                                                class="img-fluid rounded-circle border border-3 border-secondary"
                                                style="width: 120px; height: 120px; object-fit: cover;">
                                        @endif
                                    </div>

                                    <!-- Contenu à droite -->
                                    <div class="flex-grow-1">
                                        <h3 class="card-title fw-bold text-primary text-uppercase mb-1">{{ $operateur->nom }}</h3>
                                        <p class="mb-1"><i class="bi bi-envelope"></i> {{ $operateur->email }}</p>
                                        <p class="mb-0"><i class="bi bi-telephone"></i> {{ $operateur->contact }}</p>
                                    </div>

                                    <!-- Boutons d'action sous forme de dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light rounded-circle" type="button" id="dropdownMenuButton{{ $operateur->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton{{ $operateur->id }}">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('operateurs.show', $operateur->id) }}">
                                                    <i class="bi bi-eye"></i> Voir
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="/operateurs/{{ $operateur->id }}/edit">
                                                    <i class="bi bi-pencil"></i> Modifier
                                                </a>
                                            </li>
                                            <li>
                                                <form action="/operateurs/{{ $operateur->id }}/destroy" method="GET" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-black">
                                                        <i class="bi bi-trash"></i> Supprimer
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>