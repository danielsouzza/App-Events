<div class="page-breadcrumb mt-2 mb-9">
    <div class="row pb-9">
        <div class="col-7 align-self-center">
            @auth
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning {{auth()->user()->name}}!</h3>
            @endauth
            @guest
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning!</h3>
            @endguest
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a class="text-black-50" href="/">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
