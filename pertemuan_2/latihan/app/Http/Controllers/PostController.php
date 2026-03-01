<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $query = Post::with(['user','category'])->latest();

        if ($request->search) {
            $query->where(function($q) use ($request){
                $q->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('content', 'like', '%'.$request->search.'%')
                  ->orWhereHas('user', function($userQuery) use ($request){
                      $userQuery->where('name', 'like', '%'.$request->search.'%');
                  })
                  ->orWhereHas('category', function($catQuery) use ($request){
                      $catQuery->where('name', 'like', '%'.$request->search.'%');
                  });
            });
        }

        $posts = $query->paginate(5)->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all(); // kirim kategori ke view
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id
        ]);

        return redirect('/posts')->with('success', 'Post berhasil ditambahkan');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('posts.edit', compact('post','categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $post = Post::findOrFail($id);

        $imagePath = $post->image;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $$request->input('content'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath
        ]);

        return redirect('/posts')->with('success', 'Post berhasil diupdate');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post berhasil dihapus');
    }
}