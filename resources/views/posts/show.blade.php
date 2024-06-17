<x-app-layout>
    <x-slot name="header">
        <div class="w-full h-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Post Details') }}
            </h2>
            <div>
                @if (Auth::check() && Auth::user()->hasRole('editor') || (Auth::user()->hasRole('admin') || Auth::user()->hasPermissionTo('edit posts')))
                    <a href="{{ route('posts.edit', $post->id) }}" class="w-fit px-4 py-2 rounded-md text-white bg-blue-500">Edit Post</a>
                @endif
                @if (Auth::check() && (Auth::user()->hasRole('admin') || Auth::user()->hasPermissionTo('delete posts')))
                    <a href="{{ route('posts.edit', $post->id) }}" class="w-fit px-4 py-2 rounded-md text-white bg-red-500">Delete Post</a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('show-post', ['postId' => request()->route('id')])
            </div>
        </div>
    </div>
</x-app-layout>
