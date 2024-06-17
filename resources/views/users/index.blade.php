<x-app-layout>
    <x-slot name="header">
        <div class="w-full h-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User List') }}
            </h2>
            <a href="{{ route('users.create') }}" class="w-fit px-4 py-2 rounded-md text-white bg-blue-500">Create Users</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-8">
                    <h1 class="text-3xl font-bold mb-8">Latest Posts</h1>

                    <div class="mb-4">

                        <form action="{{ route('users.search') }}" method="GET">
                            <div class="form-group">
                              <label for="search">Search Users:</label>
                              <input type="text" class="w-full p-2 border rounded" id="search" name="q" placeholder="Search user by name or email">
                            </div>
                            <button type="submit" class="bg-blue-400 rounded w-fit px-4 py-2 text-white">Search</button>
                        </form>
                    </div>


                    @if ($users)
                        <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($users as $user)
                                <li class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300x200" alt="Post Image">
                                    <div class="p-4">
                                        <h2 class="text-xl font-bold mb-2">
                                            <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                                        </h2>
                                        <p class="text-gray-700 mb-2">{{ $user->email }}</p>
                                        <div class="flex items-center">
                                            <p class="text-gray-500 mr-2">Role: {{ $user->hasRole('editor') ? 'Editor' : 'Admin' }}</p> | <span class="text-gray-500 text-sm">{{ $user->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No posts found.</p>
                    @endif
                </div>

                {{--  <x-welcome />  --}}
                {{--  @livewire('post-list')  --}}
            </div>
        </div>
    </div>
</x-app-layout>
