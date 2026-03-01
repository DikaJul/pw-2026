@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">📄 Daftar Posts</h1>

            <p class="text-sm text-gray-500 flex items-center gap-2 mt-1">
                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded-full text-xs font-semibold">
                    {{ $posts->total() }}
                </span>
                total post
            </p>
        </div>

        <a href="/posts/create"
           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
            + Tambah Post
        </a>
    </div>

    <form method="GET" action="/posts" class="mb-6">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari judul, konten, atau nama user..."
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200">

            <button class="bg-blue-600 text-white px-4 rounded-lg">
                Cari
            </button>
        </div>
    </form>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-6">

        @forelse($posts as $post)

        <div class="bg-white shadow-md hover:shadow-2xl border border-gray-100 rounded-xl p-6 transition duration-300 transform hover:-translate-y-1">

            <div class="flex justify-between items-start">

                <div>
                    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}"
             class="w-full h-48 object-cover rounded-lg mb-4">
    @endif
                    <h2 class="text-xl font-semibold text-gray-800">    
                        {{ $post->title }}
                    </h2>

                    <p class="text-xs text-gray-400 mt-1">
                        Oleh: {{ $post->user->name ?? 'Unknown' }}
                    </p>

                    <p class="text-gray-600 mt-2 text-sm">
                        {{ $post->content }}
                    </p>

                    <p class="text-xs text-gray-400 mt-3">
                        Diposting: {{ $post->created_at->format('d M Y, H:i') }} WIB
                    </p>
                </div>

                <div class="flex gap-4 text-sm mt-1">
                    <a href="/posts/{{ $post->id }}/edit"
                       class="text-blue-600 hover:text-blue-800 font-medium">
                        Edit
                    </a>

                    <form action="/posts/{{ $post->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800 font-medium">
                            Hapus
                        </button>
                    </form>
                </div>

            </div>

        </div>

        @empty

        <div class="text-center py-16">
            <div class="text-4xl mb-3">📝</div>
            <p class="text-gray-500 text-lg">Belum ada postingan</p>

            <a href="/posts/create"
               class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                Buat Post Pertama
            </a>
        </div>

        @endforelse

    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>

</div>

@endsection