<div class="container mx-auto px-4 py-8">
    @if ($post)
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700 mb-4">{{ $post->body }}</p>
        <div class="flex items-center">
            <p class="text-gray-500 mr-2">by {{ $post->user->name }}</p>
            <span class="text-gray-500 text-sm">{{ $post->created_at->format('d M Y') }}</span>
        </div>

        @if ($post->comments)
            <h2>Comments</h2>
            <ul>
                @foreach ($post->comments as $comment)
                    <li class="mb-4">
                        <p class="text-gray-700">{{ $comment->body }}</p>
                        <div class="flex items-center text-gray-500 text-sm">
                            <p class="mr-2">by {{ $comment->user->name }}</p>
                            <span>{{ $comment->created_at->format('d M Y') }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No comments yet.</p>
        @endif

        @livewire('comment-form', ['postId' => $post->id])
    @else
        <p>Post not found.</p>
    @endif
</div>
