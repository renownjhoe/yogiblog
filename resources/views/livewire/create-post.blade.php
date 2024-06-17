<div class="w-full">
    <div class="w-1/2 p-20">
        <h1 class="text-3xl font-bold">Create Post</h1>
        <p class="mb-8 text-gray-400">Create post by filling out the form below.</p>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        {{--  <form method="POST" action="{{ route('posts.store') }}">  --}}
        <form wire:submit.prevent="submit">
            @csrf
            <div>
                <x-label for="title" value="{{ __('Title') }}" />
                <x-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" required autofocus autocomplete="title" />
                @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-label for="body" value="{{ __('Body') }}" />
                <x-text-area wire:model="body" id="body" class="block mt-1 w-full @error('body') is-invalid @enderror" rows="5" placeholder="Write your post here" />
                @error('body') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button class="ms-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </div>
</div>
