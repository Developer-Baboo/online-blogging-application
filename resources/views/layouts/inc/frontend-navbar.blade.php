{{-- frontend-navbar --}}
{{--  --}}

<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('assets/images/logo.png') }}" style="width:50%" alt="Logo" />
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-top" >
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                @php
                    $categories = App\Models\Category::where('navbar_status', '0')
                        ->where('status', '0')
                        ->get();
                @endphp
                @foreach ($categories as $cateitem)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('tutorial/' . $cateitem->slug) }}">{{ $cateitem->name }}</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </nav>
</div>
