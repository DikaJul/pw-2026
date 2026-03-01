@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <h1 class="text-2xl font-bold mb-6">📂 Daftar Kategori</h1>

    <div class="grid md:grid-cols-2 gap-6">

        @foreach($categories as $category)

        <div class="bg-white shadow-md rounded-xl p-6 hover:shadow-xl transition">

            <h2 class="text-lg font-semibold text-gray-800">
                <a href="{{ route('categories.show', $category->id) }}"
                   class="hover:text-blue-600 hover:underline">
                    {{ $category->name }}
                </a>
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                {{ $category->posts_count }} post
            </p>

        </div>

        @endforeach

    </div>

</div>

@endsection