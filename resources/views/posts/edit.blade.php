<x-app-layout>
    <x-slot name="header">
        <div class="w-full h-full flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Post') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="w-fit px-4 py-2 rounded-md text-white bg-blue-500">View Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form method="POST" action="{{ route('posts.update', $post->id) }}">
                    @csrf
                    @method('PUT') <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
                        @error('title') <span class="text-red-500 error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea name="body" id="body" class="form-control" rows="3">{{ old('body', $post->body) }}</textarea>
                        @error('body') <span class="text-red-500 error">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Post</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
