<!DOCTYPE html>
<html lang="fr" data-bs-theme="auto" class="h-100">

<x-head></x-head>

<style>
    .btn{

    }
</style>

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
                    <a href="/operateurs" class="btn btn-outline-dark rounded-0 d-flex align-items-center gap-1">
                        <span>Retour</span>
                    </a>
                </div>

                <form action="/utilisateurs/{{ $utilisateur->id }}/update" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group mb-3">
                        <label class="mb-1" for="photo">Image</label>
                        <input class="form-control rounded-0 " type="file" name="image" id="photo">
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="mb-1" for="nom">Pseudo</label>
                        <input class="rounded-0 " type="text" name="name" id="nom" required
                            value="{{ $utilisateur->name }}">
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="mb-1" for="email">Email</label>
                        <input class=" rounded-0 " type="email" name="email" id="" required
                            value="{{ $utilisateur->email }}">
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="mb-1" for="email">Mot de passe</label>
                        <input class=" rounded-0 " type="password" name="password" id="" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-center   gap-4 border-top  pt-4 mt-2">
                        <input class="btn btn-outline-dark  px-md-4 rounded-0 " type="submit" value="Enregistrer">
                        <a class="btn btn-secondary px-md-4 d-none" href="/operateurs">Annuler</a>
                    </div>

                </form>

            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>