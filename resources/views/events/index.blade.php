<x-guest-layout>
    <x-navbar searchValue="{{ $search }}"/>
    @include('events.partials.jumbotron')
    @include('events.partials.events')
    <x-newslater/>
    <x-footer/>
</x-guest-layout>
