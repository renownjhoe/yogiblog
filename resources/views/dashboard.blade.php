<x-app-layout>
    <x-slot name="header">
        <div class="w-full h-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Post') }}
            </h2>
            <a href="{{ route('posts.create') }}" class="w-fit px-4 py-2 rounded-md text-white bg-blue-500">Create Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mx-auto px-4 py-8">
                    <h1 class="text-3xl font-bold mb-8">Latest Posts</h1>

                    <div class="mb-4">

                        <form action="{{ route('posts.search') }}" method="GET">
                            <div class="form-group">
                              <label for="search">Search Posts:</label>
                              <input type="text" class="w-full p-2 border rounded" id="search" name="q" placeholder="Search by title or body">
                            </div>
                            <button type="submit" class="bg-blue-400 rounded w-fit px-4 py-2 text-white">Search</button>
                        </form>
                    </div>


                    @if ($posts)
                        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($posts as $post)
                                <li class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300x200" alt="Post Image">
                                    <div class="p-4">
                                        <h2 class="text-xl font-bold mb-2">
                                            <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                        </h2>
                                        <p class="text-gray-700 mb-2">{{ Str::limit($post->body, 100) }}</p>
                                        <div class="flex items-center">
                                            <p class="text-gray-500 mr-2">by {{ $post->user->name }}</p>
                                            <span class="text-gray-500 text-sm">{{ $post->created_at->format('d M Y') }}</span>
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
