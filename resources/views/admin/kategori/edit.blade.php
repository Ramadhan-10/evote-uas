@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="bg-white p-5">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Kategori</h2>
        <form method="POST" action="{{ route('kategoris.update', $kategoris->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" name="name" id="name"  value="{{ $kategoris->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 my-4 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
        </form>
    </div>
</div>
@endsection