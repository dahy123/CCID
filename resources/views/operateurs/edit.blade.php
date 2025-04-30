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
                    <h3>Modifier un opérateur</h3>
                    <a href="/operateurs" class="btn btn-dark rounded-0 d-flex align-items-center gap-1">
                        <span>Retour</span>
                    </a>
                </div>

                <form action="/operateurs/{{ $operateur->id }}/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="mb-1" for="photo">Photo</label>
                        <input class="form-control rounded-0 " type="file" name="photo" id="photo">
                    </div>
                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="nom">Nom</label>
                            <input class=" rounded-0 "="text" name="nom" id="nom" required
                                value="{{ $operateur->nom }}">
                        </div>
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="email">Email</label>
                            <input class=" rounded-0 " type="email" name="email" id="email" required
                                value="{{ $operateur->email }}">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="contact">Contact</label>
                            <input class=" rounded-0 " type="text" name="contact" id="contact" required
                                value="{{ $operateur->contact }}">
                        </div>
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="adresse">Adresse</label>
                            <input class=" rounded-0 " type="text" name="adresse" id="adresse" required
                                value="{{ $operateur->adresse }}">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="type">Type</label>
                            <input class=" rounded-0 " type="text" name="type" id="type" required
                                value="{{ $operateur->type }}">
                        </div>
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="activites_id">Secteur d'activité</label>
                            <select class="form-select rounded-0" name="activites_id" id="activites_id" required>
                                {{-- <option value="{{ $operateur->activites_id }}">{{ $activite-> }}</option> --}}
                                @foreach ($activites as $activite)
                                    <option value="{{ $activite->id }}">{{ $activite->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="raison">Raison</label>
                            <input class=" rounded-0 " type="text" name="raison" id="raison" required
                                value="{{ $operateur->raison }}">
                        </div>
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="formel">Formel</label>
                            <select class="form-select rounded-0" name="formel" id="formel" required>
                                <option value="{{ $operateur->formel }}" selected>{{ $operateur->formel }}</option>
                                <option value="formel">Formel</option>
                                <option value="Informel">Informel</option>
                            </select>
                        </div>

                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="form-group mb-3 w-100">
                            <label class="mb-1" for="nif">NIF</label>
                            <input class=" rounded-0 " type="text" name="nif" id="nif"
                                value="{{ $operateur->nif }}">
                        </div>
                        <div class="form-group mb-3 w-100">
                            <label class="mb-1" for="stat">STAT</label>
                            <input class=" rounded-0 " type="text" name="stat" id="stat"
                                value="{{ $operateur->stat }}">
                        </div>
                        <div class="form-group mb-3 w-100">
                            <label class="mb-1" for="rc">RC</label>
                            <input class=" rounded-0 " type="text" name="rc" id="rc"
                                value="{{ $operateur->rc }}">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-center gap-4 border-top pt-4 mt-2">
                        <button class="d-flex align-content-center btn btn-outline-dark px-md-4 rounded-0" type="submit">
                            {{-- <i class="bi bi-save me-2"style="margin-right:4px;"></i>  --}}
                            <span>Enregistrer</span>
                        </button>
                        <a class="btn btn-dark px-md-4 d-none" href="/operateurs">
                            <i class="bi bi-x-circle"></i> Annuler
                        </a>
                    </div>

                </form>

            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>