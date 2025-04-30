<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-white">
    <div class="offcanvas-md offcanvas-end bg-white" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header py-0 bg-white">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">
                {{-- Gestion CCID --}}
                <img src="{{ asset('storage/' . "images/Logo.PNG") }}" alt="Photo de Logo" class="img-fluid "
                    style="height:51px">
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>

        <x-navbar></x-navbar>

    </div>
</div>