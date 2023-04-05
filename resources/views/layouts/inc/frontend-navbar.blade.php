<div class="global-navbar">

    {{-- Logo --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img.png') }}" alt="logo" class="w-50" alt="Logo">
            </div>
        </div>
    </div>
    <!-- End Logo -->

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-light navbar-light">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"--}}
{{--                           aria-expanded="false">--}}
{{--                            Dropdown--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                            <li>--}}
{{--                                <hr class="dropdown-divider">--}}
{{--                            </li>--}}
{{--                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    @php
                        $categories = \App\Models\Category::where('navbar_status', 1)->where('status', 1)->get();
                    @endphp
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ $category->slug }}">{{ $category->name }}</a>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <!-- End Navbar -->

</div>
