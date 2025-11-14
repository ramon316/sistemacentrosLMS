<x-user-layout
title="Dashboard"
:breadcrumbs="[
    ['name' => 'Dashboard', 'url' => route('dashboard')],
]">

{{-- Esto es lo que se coloca del lado derecho al nivel de las breadcrumbs --}}
<x-slot name="action">
    {{-- LMS actions to be implemented --}}
    {{-- <x-wire-button href="{{ route('user.my-courses') }}" primary>
        <i class="fas fa-book mr-2"></i>
        Mis Cursos
    </x-wire-button> --}}
</x-slot>

{{-- Contenido del dashboard --}}
<div class="py-6">
    <div class="max-w-7xl mx-auto">
        @livewire('user.dashboard')
    </div>
</div>

</x-user-layout>
