@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-8">
    <div class="max-w-6xl mx-auto px-4">

        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">
                Dashboard
            </h1>
            <p class="text-gray-500 text-sm">
                Selamat datang, {{ auth()->user()->name }} 👋
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                <p class="text-gray-500 text-sm">Total Post</p>
                <h2 class="text-3xl font-bold text-blue-600">
                    {{ \App\Models\Post::count() }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
                <p class="text-gray-500 text-sm">Total User</p>
                <h2 class="text-3xl font-bold text-green-600">
                    {{ \App\Models\User::count() }}
                </h2>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                <p class="text-gray-500 text-sm mb-2">Aksi Cepat</p>
                <a href="/posts/create"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                    + Buat Post
                </a>
            </div>

        </div>

        <div class="bg-white rounded-xl shadow-md p-6">

            <h3 class="text-lg font-semibold mb-4 text-gray-700">
                Post Terbaru
            </h3>

            @php
                $latestPosts = \App\Models\Post::latest()->take(3)->get();
            @endphp

            <div class="space-y-3">

                @forelse($latestPosts as $post)
                    <div class="p-4 border rounded-lg hover:bg-gray-50 transition flex justify-between items-center">

                        <div>
                            <div class="font-semibold text-gray-800">
                                {{ $post->title }}
                            </div>

                            <div class="text-sm text-gray-500">
                                {{ $post->created_at->format('d M Y H:i') }} WIB
                            </div>
                        </div>

                        </a>

                    </div>
                @empty
                    <p class="text-gray-400 text-center py-6">
                        Belum ada post
                    </p>
                @endforelse

            </div>

            <div class="mt-4 text-right">
                <a href="/posts"
                   class="text-blue-600 hover:underline text-sm font-medium">
                    Lihat semua posts →
                </a>
            </div>

        </div>

    </div>
</div>

@endsection