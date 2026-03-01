@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Edit Post</h1>

<form action="/posts/{{ $post->id }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block mb-1 font-semibold">Judul</label>
        <input type="text" name="title" value="{{ $post->title }}" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block mb-1 font-semibold">Konten</label>
        <textarea name="content" class="w-full border rounded px-3 py-2">{{ $post->content }}</textarea>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Update
    </button>
</form>

@endsection