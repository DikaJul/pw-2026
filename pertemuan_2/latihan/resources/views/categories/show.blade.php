@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-2xl font-bold text-gray-800 mb-2">
        📂 Kategori: {{ $category->name }}
    </h1>

    <p class="text-sm text-gray-500 mb-6">
        Total Post: {{ $category->posts->count() }}
    </p>

    <div class="space-y-4">

        @forelse($category->posts as $post)

            <div class="bg-white shadow rounded-xl p-5">

                <h2 class="text-lg font-semibold text-gray-800">
                    {{ $post->title }}
                </h2>

                <p class="text-xs text-gray-400">
                    Oleh: {{ $post->user->name ?? 'Unknown' }}
                </p>

                <p class="text-sm text-gray-600 mt-2">
                    {{ $post->content }}
                </p>

                @if($post->image)
                    <img src="{{ asset('storage/'.$post->image) }}"
                         class="mt-3 w-40 rounded">
                @endif

            </div>

        @empty

            <p class="text-gray-500">Belum ada post di kategori ini.</p>

        @endforelse

    </div>

</div>

@endsection