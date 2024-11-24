<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date'=>'required',
            'author' => 'required|string|max:255',
            'content' => 'required|string',  // CKEditor content will be stored as a string
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['name','date' ,'author', 'content']);
    
        if ($request->hasFile('image')) {
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $fileName);
            $data['image'] = $fileName;
        }
        // dd($data);
        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }
    

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'content' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->only(['name', 'author', 'content']);
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete($post->image);
            $data['image'] = $request->file('image')->store('images');
        }

        $post->update($data);

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post)
    {
        // Delete the image
        Storage::delete($post->image);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
