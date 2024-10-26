<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create News') }}
        </h2>
    </x-slot>

    <x-dashboard-content>  
    <form method="POST" action="{{ route('admin.news.store') }}" class="mx-auto" enctype="multipart/form-data">
        @csrf
        @include('admin.news.partials.form')
    </form>
    </x-dashboard-content>
</x-app-layout>
