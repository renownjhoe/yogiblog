<x-app-layout>
    <x-slot name="header">
        <div class="w-full h-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create Post') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="w-fit px-4 py-2 rounded-md text-white bg-blue-500">View Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                {{--  <x-welcome />  --}}
                @livewire('create-post')
            </div>
        </div>
    </div>
</x-app-layout>
