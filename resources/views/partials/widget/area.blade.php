{{-- Area widget per posisi (Admin Web > Widget). Widget kanan tetap dirender sidebar tema; atas & kiri tampil di atas baris artikel, bawah di bawahnya, selebar container tema. --}}
@if (! function_exists('widget_aktif'))
    @yield('layout')
@else
    <div class="container mx-auto lg:px-5 px-3">
        @include('theme::partials.widget.posisi', ['posisi' => 'atas'])
        @include('theme::partials.widget.posisi', ['posisi' => 'kiri'])
    </div>
    @yield('layout')
    <div class="container mx-auto lg:px-5 px-3">
        @include('theme::partials.widget.posisi', ['posisi' => 'bawah'])
    </div>
    <style>
        .opensid-widget-area { display:grid; gap:1.25rem; margin-top:1.25rem; }
        .opensid-widget-bawah { margin-bottom:1.25rem; }
        .opensid-widget-item { min-width:0; background:#fff; border-radius:.5rem; box-shadow:0 1px 3px rgba(0,0,0,.1); padding:1rem 1.25rem; overflow:hidden; }
    </style>
@endif
