@extends('layouts.app')

@section('content')
<div class="container mx-auto px-5 ">
    <div class=" bg-white p-5 ">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Paslon</h2>
        <form action="{{ route('paslons.update', $paslons->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                <input type="text" name="name" id="name"  value="{{ $paslons->name }}"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-2">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Biografi:</label>
                <textarea id="summernote"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    id="description" name="description" required="">{{ $paslons->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="kategori_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Kategori') }}</label>
                <select id="kategori_id" class="form-input rounded-md shadow-sm w-full @error('kategori_id') border-red-500 @enderror" name="kategori_id" required>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
        
                @error('kategori_id')
                    <span class="text-red-500 text-sm mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="block text-gray-700 text-sm font-bold my-4" for="photo">Photo</label>
                <input type="file" class="form-control " id="photo" name="photo">
                @if ($paslons->photo)
                    <img src="{{ asset('storage/images/' . $paslons->photo) }}" width="100" class="my-4 " alt="Photo">
                @endif
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 my-4 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
        </form>
    </div>
</div>
@endsection