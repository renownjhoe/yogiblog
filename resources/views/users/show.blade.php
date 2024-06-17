<x-app-layout>
    <x-slot name="header">
        <div class="w-full h-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-8">
                        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                <li class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300x200" alt="Post Image">
                                    <div class="p-4">
                                        <h2 class="text-xl font-bold mb-2">
                                            <a href="#">{{ $user->name }}</a>
                                        </h2>
                                        <p class="text-gray-700 mb-2">{{ $user->email }}</p>
                                        <div class="flex items-center">
                                            <p class="text-gray-500 mr-2">Role: {{ $user->hasRole('editor') ? 'Editor' : 'Admin' }}</p> | <span class="text-gray-500 text-sm">{{ $user->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </li>
                        </ul>
                </div>

                {{--  <x-welcome />  --}}
                {{--  @livewire('post-list')  --}}
            </div>
        </div>
    </div>
</x-app-layout>
