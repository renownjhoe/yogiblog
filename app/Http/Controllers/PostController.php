<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index($platform = null)
    {
        $posts = Post::with('user')->latest()->get();
        if($platform != null){
            return response()->json($posts, 200);
        }
        return view('dashboard', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->save();

        if($request->platform){
            if (!$post) {
                return response()->json(['error' => 'Could not save your post.'], 404);
            }
            return response()->json($post, 200);
        }
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post) // Route model binding
    {
        return view('posts.edit', compact('post'));
    }

    public function show($id, $platform = null)
    {
        $post = Post::findOrFail($id);


        if($platform != null){
            if (!$post) {
                return response()->json(['error' => 'Post not found'], 404);
            }
            return response()->json($post, 200);
        }
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, Post $post) // Model binding injects the Post based on the ID
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);

        $post->update($request->all());

        if($request->platform){
            if (!$post) {
                return response()->json(['error' => 'Post not updated'], 404);
            }
            return response()->json($post, 200);
        }

        if($request->platform){
            return response()->json($post, 200);
        }

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post) // Route model binding
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->get('q');  // Assuming search query parameter is "q"

        $posts = Post::where('title', 'like', "%{$searchTerm}%")
            ->orWhere('body', 'like', "%{$searchTerm}%")
            ->get();

        if($request->platform){
            return response()->json($posts, 200);
        }
        return view('dashboard', compact('posts'));
    }
}
