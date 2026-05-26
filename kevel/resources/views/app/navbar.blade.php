{{-- Cek apakah pengguna sudah login --}}
@auth
    <span class="navbar-text me-3">
        Halo, <strong>{{ Auth::user()->name }}</strong>
    </span>

    {{-- Tombol Logout menggunakan form POST --}}
    <form action="{{ url('/logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
    </form>
@else
    <a href="{{ url('/login') }}" class="btn btn-outline-primary btn-sm me-2">Login</a>
    <a href="{{ url('/register') }}" class="btn btn-primary btn-sm">Daftar</a>
@endauth
