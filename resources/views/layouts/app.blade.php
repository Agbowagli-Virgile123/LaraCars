@props(['title' => '', 'bodyClass' => null, 'footerLinks' => '' ])

<x-base-layout :$title :$bodyClass >
   
   <x-layouts.header/>

    {{ $slot }}

    @push('scripts')
        <script src="{{ asset('js/app.js') }}"></script>
    @endpush  
</x-base-layout>













