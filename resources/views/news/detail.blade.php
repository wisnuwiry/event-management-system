<x-guest-layout>
    <x-navbar/>
    @include('news.partials.thumbnail')
    @include('news.partials.content')
    @include('news.partials.related')
    <x-newslater/>
    <x-footer/>
</x-guest-layout>
