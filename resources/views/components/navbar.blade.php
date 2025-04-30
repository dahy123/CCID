<div class="offcanvas-body  d-md-flex flex-column p-0   overflow-y-auto ">
    <ul class="nav flex-column bg-white">
        <li class="nav-item ">
            <a class="nav-link  fs-5 d-flex align-items-center gap-2 active" aria-current="page" href="/">
                <svg class="bi " aria-hidden="true">
                    <use xlink:href="#house-fill" />
                </svg>
                Tableau de bord
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  fs-5  d-flex align-items-center gap-2" href="/operateurs">
                <svg class="bi" aria-hidden="true">
                    <use  xlink:href="#file-earmark" />
                </svg>
                <span class="d-block">Operateurs</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  fs-5  d-flex align-items-center gap-2" href="/activites">
                <svg class="bi" aria-hidden="true">
                    <use  xlink:href="#cart" />
                </svg>
                Secteur d'activités
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  fs-5  d-flex align-items-center gap-2" href="/visiteurs">
                <svg class="bi" aria-hidden="true">
                    <use xlink:href="#people" />
                </svg>
                Visiteurs
            </a>
        </li>
    </ul>
    <hr class="my-3 d-none" />

    <ul class="nav flex-column mb-auto bg-white">
        <li class="nav-item">
            <a class="nav-link  fs-5  d-flex align-items-center gap-2" href="/utilisateurs">
                <svg class="bi" aria-hidden="true">
                    <use xlink:href="#people" />
                </svg>
                Utilisateurs
            </a>
        </li>

        <li class="nav-item d-none">
            <a class="nav-link  fs-5  d-flex align-items-center gap-2" href="/paramètres">
                <svg class="bi" aria-hidden="true">
                    <use xlink:href="#gear-wide-connected" />
                </svg>
                Paramètres
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link  fs-5  d-flex align-items-center gap-2" href="/auth/logout">
                <svg class="bi" aria-hidden="true">
                    <use xlink:href="#door-closed" />
                </svg>
                Se deconnecter
            </a>
        </li>
    </ul>
</div>

{{ $slot }}