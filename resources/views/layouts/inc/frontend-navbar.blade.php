{{-- frontend-navbar --}}
{{--  --}}

<div class="global-navbar bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
                @php
                    $setting = App\Models\Setting::find(1);
                @endphp
                <img src="{{ asset('uploads/settings/'.$setting->logo) }}" style="width:50%" alt="Logo" />
            </div>
            <div class="col-md-9 my-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
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
                @if(Auth::check())
                <li>
                    <a class="nav-link btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </li>
                @endif
                <form action=" {{ route('logout') }} " id="logout-form" class="d-none" method="POST">
                    @csrf
                </form>
            </ul>

        </div>
    </nav>
</div>
