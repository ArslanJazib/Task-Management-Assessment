@include('layouts.head')
@include('layouts.header')

<main class="container mt-4">
    @yield('content')
</main>

@include('layouts.footer')
@include('layouts.scripts')