{{-- Area widget per posisi (Admin Web > Widget). Widget kanan tetap dirender sidebar tema. --}}
@if (! function_exists('widget_aktif'))
    @yield('layout')
@else
    @include('theme::partials.widget.posisi', ['posisi' => 'atas'])
    @php($adaWidgetKiri = widget_aktif('kiri')->isNotEmpty())
    @if ($adaWidgetKiri)
        <div class="opensid-widget-layout">
            @include('theme::partials.widget.posisi', ['posisi' => 'kiri'])
            <div class="opensid-widget-content">@yield('layout')</div>
        </div>
    @else
        @yield('layout')
    @endif
    @include('theme::partials.widget.posisi', ['posisi' => 'bawah'])
    <style>
        .opensid-widget-area { width:100%; padding:1rem; }
        .opensid-widget-item { min-width:0; margin-bottom:1rem; }
        .opensid-widget-layout { display:flex; flex-direction:column; }
        .opensid-widget-content { flex:1; min-width:0; }
        @media (min-width:1024px) {
            .opensid-widget-layout { flex-direction:row; align-items:flex-start; }
            .opensid-widget-layout > .opensid-widget-kiri { width:25%; flex-shrink:0; }
        }
    </style>
@endif
