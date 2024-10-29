<x-guest-layout>
    <x-navbar searchValue="{{ $search }}"/>
    @include('news.partials.jumbotron')
    @include('news.partials.news')
    <x-newslater/>
    <x-footer/>
</x-guest-layout>
