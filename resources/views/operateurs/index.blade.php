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

                <div class="table-responsive small d-none">
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
                                <th scope="col">Secteur d'activité</th>
                                <th scope="col" class="text-end" style="padding-right: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operateurs as $operateur)
                                <tr>
                                    <td>{{ $operateur->id }}</td>
                                    <td>
                                        @if ($operateur->photo)
                                            <img src="{{ asset('storage/' . $operateur->photo) }}"
                                                alt="Photo de {{ $operateur->nom }}"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('storage/images/' . 'default.png') }}" alt="Photo de default"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>{{ $operateur->nom }}</td>
                                    <td>{{ $operateur->adresse }}</td>
                                    <td>{{ $operateur->contact }}</td>
                                    <td>{{ $operateur->email }}</td>
                                    <td>{{ $operateur->type }}</td>
                                    <td>{{ $operateur->raison }}</td>
                                    <td>{{ $operateur->formel }}</td>
                                    <td>{{ $operateur->nif }}</td>
                                    <td>{{ $operateur->stat }}</td>
                                    <td>{{ $operateur->rc }}</td>
                                    <td>{{ $operateur->activites->nom }}</td>
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

                <div class="d-flex flex-wrap gap-4 justify-content-around mb-5 py-4">
                    @foreach ($operateurs as $operateur)
                        <div class="d-flex justify-content-around shadow gap-4 py-5 px-5 align-items-center align-content-center">
                            <div class="mb-3">
                                @if ($operateur->photo)
                                    <img src="{{ asset('storage/' . $operateur->photo) }}" alt="Photo de {{ $operateur->nom }}"
                                        style="max-width:230px ; height: auto;">
                                @else
                                    <img src="{{ asset('storage/images/' . 'default.png') }}" alt="Photo de default"
                                        style="max-width:230px ; height: auto;">
                                @endif
                            </div>
                            <div>
                                <h3 class="mb-2 fw-bold">{{ $operateur->nom }}</h3>
                                <h5 class="mb-2 fw-medium">{{ $operateur->activites->nom }}</h5>
                                <div class="d-flew align-items-center">
                                    <span class="mb-3 fw-light">{{ $operateur->email }}</span>
                                    <span>|</span>
                                    <span class="mb-3">{{ $operateur->contact }}</span>
                                </div>

                                {{-- Modifier en formulaire --}}
                                <div class="d-flex align-items-center justify-content-around gap-2 d-none">
                                    <span class="mb-3">{{ $operateur->adresse }}</span>
                                    <span class="mb-3">{{ $operateur->email }}</span>
                                    <span class="mb-3">{{ $operateur->contact }}</span>
                                </div>

                                <div class="d-flex justify-content-start gap-3 pt-3">
                                    <a class="btn btn-sm btn-warning rounded-0"
                                        href="{{ route('operateurs.show', $operateur->id) }}">Voi</a>
                                    <a class="btn btn-sm btn-info rounded-0"
                                        href="/operateurs/{{ $operateur->id }}/edit">Mod</a>
                                    <a class="btn btn-sm btn-danger rounded-0"
                                        href="/operateurs/{{ $operateur->id }}/destroy">Sup</a>
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