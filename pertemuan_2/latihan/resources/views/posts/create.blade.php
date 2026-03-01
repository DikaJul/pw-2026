@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Post</h1>

        <a href="/posts"
           class="text-sm text-gray-500 hover:text-gray-700">
            ← Kembali ke daftar post
        </a>
    </div>

    <div class="bg-white shadow-lg rounded-xl p-6">

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                <input type="text" name="title"
                       value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                       placeholder="Masukkan judul post..."
                       required>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Konten</label>
                <textarea name="content" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:outline-none"
                          placeholder="Tulis isi postingan..."
                          required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>

                <select name="category_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200"
                        required>

                    <option value="">-- Pilih Kategori --</option>

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Gambar (opsional)</label>
                <input type="file" name="image"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2">

                <p class="text-xs text-gray-400 mt-1">
                    Format: JPG, PNG, JPEG. Maks 2MB
                </p>
            </div>

            <div class="flex justify-between items-center">
                <a href="/posts"
                   class="text-gray-500 hover:text-gray-700 text-sm">
                    Batal
                </a>

                <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow transition">
                    💾 Simpan Post
                </button>
            </div>

        </form>

    </div>

</div>
@endsection