<x-guest-layout>
    <x-navbar/>
    <section class="py-8 antialiased md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <x-breadcrumb :items="[
                ['label' => __('Home'), 'url' => route('home')],
                ['label' => __('Account'), 'url' => route('profile.edit')],
                ['label' => __('My Events'), 'url' => '#'],
            ]" />
            <div class="gap-8 lg:flex">
            <!-- Sidenav -->
            <x-profile-sidebar/>
            <!-- Right content -->
            <div class="w-full space-y-6 lg:space-y-8">
                @include('events.partials.my')
            </div>
        </div>
    </section>
    <x-footer/>
</x-guest-layout>
