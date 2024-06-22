@php

    $minu = [
        [
            'title' => 'Панель приборов',
            'icon' => 'zmdi zmdi-view-dashboard',
            'name' => 'dashboard',
            // 'blank' => true
        ],
        [
            'title' => 'Сертификаты',
            'icon' => 'zmdi zmdi-calendar-check',
            'name' => 'sertificates.index',
        ],
    ];

@endphp
<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{ asset('dashboard') }}">
            <img src="{{ asset('assets/certificates/logo.png') }}" class="logo-icon" alt="logo icon" />
            <h5 class="logo-text">Dashtreme Admin</h5>
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">ГЛАВНАЯ НАВИГАЦИЯ</li>
        @foreach ($minu as $item)
            <li>
                <a href="@isset($item['name']) {{ route($item['name']) }} @else {{ $item['link'] ?? '' }}  @endisset"
                    @isset($item['blank']) target="_blank"  @endisset>
                    <i class="{{ $item['icon'] ?? '' }}"></i> <span>{{ $item['title'] ?? 'No Title' }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
<!--End sidebar-wrapper-->
