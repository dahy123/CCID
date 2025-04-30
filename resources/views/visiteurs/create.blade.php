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
                    <h3>Ajouter un visiteur</h3>
                    <a href="/visiteurs" class="btn btn-outline-dark rounded-0 d-flex align-items-center gap-1">
                        <span>Retour</span>
                    </a>
                </div>

                <form action="/visiteurs/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="nom">Nom</label>
                            <input class=" rounded-0 " type="text" name="nom" id="nom" required>
                        </div>
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="prenom">Prénom</label>
                            <input class=" rounded-0 " type="text" name="prenom" id="email" required>
                        </div>
                    </div>
                    <div class="form-group mb-3 ">
                        <label class="mb-1" for="email">Email</label>
                        <input class=" rounded-0 " type="email" name="email" id="email" required>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-4">
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="contact">Contact</label>
                            <input class=" rounded-0 " type="text" name="contact" id="contact" required>
                        </div>
                        <div class="form-group mb-3 w-50">
                            <label class="mb-1" for="adresse">Adresse</label>
                            <input class=" rounded-0 " type="text" name="adresse" id="adresse" required>
                        </div>
                    </div>

                    <div class="form-group mb-3 ">
                        <label class="mb-1" for="motif">Motif</label>
                        <textarea class="w-100 rounded-0" name="motif" id="" cols="30"
                            rows="8"></textarea>
                    </div>

                    <div class="d-flex align-items-center justify-content-center   gap-4 border-top  pt-4 mt-2">
                        <input class="btn btn-outline-dark px-md-4 rounded-0 " type="submit" value="Enregistrer">
                        <a class="btn btn-dark px-md-4 d-none" href="/visiteurs">Annuler</a>
                    </div>

                </form>

            </main>

        </div>
    </div>

    <x-footer></x-footer>

</body>

</html>