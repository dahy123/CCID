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
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2  border-bottom">
                    <h3>Utilisateurs</h3>
                    <a href="utilisateurs/create"
                        class="btn  btn-outline-dark rounded-0 d-flex align-items-center gap-1">
                        <span>Ajouter un utilisateur</span>
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
                                <th scope="col">Pseudo</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-end " style="padding-right: 80px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($utilisateurs as $utilisateur)
                                <tr>
                                    <td>{{ $utilisateur->id }}</td>
                                    <td>
                                        @if ($utilisateur->image)
                                            <img src="{{ asset('storage/' . $utilisateur->image) }}"
                                                alt="Photo de {{ $utilisateur->nom }}"
                                                style="width: 50px; height: 50px; object-fit: cover;">
                                            {{-- <img src="{{ asset('storage/' . $utilisateur->image) }}"
                                                alt="Image de {{ $utilisateur->nom }}" class="img-thumbnail"
                                                style="width: 100px; height: auto;"> --}}
                                        @else
                                            <span>Aucune image</span>
                                        @endif
                                    </td>
                                    <td>{{ $utilisateur->pseudo}}</td>
                                    <td>{{ $utilisateur->email }}</td>
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/utilisateurs/{{ $utilisateur->id }}/edit">
                                            <i class="bi bi-pencil"></i>
                                            <span>Modifier</span>
                                        </a>
                                        <a class="btn btn-sm btn-light rounded-0"
                                            href="/utilisateurs/{{ $utilisateur->id }}/destroy">
                                            <i class="bi bi-trash"></i>
                                            <span>Supprimer</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex flex-wrap gap-4 justify-content-start py-4 mb-5 pb-5">
                    @foreach ($utilisateurs as $utilisateur)
                        <div class="d-flex flex-column text-center justify-content-between shadow p-4">
                            <div class="mb-3 px-3">
                                @if ($utilisateur->image)
                                    <img class="rounded-circle" src="{{ asset('storage/' . $utilisateur->image) }}"
                                        alt="Image de {{ $utilisateur->nom }}" class="img-thumbnail"
                                        style="width: 140px; height: 140px; object-fit: cover;">
                                @else
                                    <img class="rounded-circle" src="{{ asset('storage/images/' . 'default.png') }}" alt="Photo de default"
                                        style="width: 230px; height: auto;">
                                @endif
                            </div>
                            <div>
                                <h3 class="mb-2 text-capitalize">{{ $utilisateur->name }}</h3>
                                <p class="mb-3">{{ $utilisateur->email }}</p>
                                <div class="d-flex justify-content-center gap-3">
                                    <a class="btn btn-sm btn-light rounded-0"
                                        href="/utilisateurs/{{ $utilisateur->id }}/edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm btn-light rounded-0"
                                        href="/utilisateurs/{{ $utilisateur->id }}/destroy">
                                        <i class="bi bi-trash"></i>
                                    </a>
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