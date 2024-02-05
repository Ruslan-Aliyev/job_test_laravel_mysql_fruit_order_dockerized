<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-dropdown-link :href="route('fruit.index')">
                        {{ __('Manage fruit items') }}
                    </x-dropdown-link>
                </div>
                <div class="p-6 text-gray-900">
                    <x-dropdown-link :href="route('order.index')">
                        {{ __('Make order') }}
                    </x-dropdown-link>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
