@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 p-2 rounded-lg bg-white">
    <h1 class="text-3xl font-bold text-center">Kategori</h1>
    <a href="{{ route('admin.kategori.create') }}" class="my-5 px-4 py-2 bg-blue-500 text-white rounded-lg">Tambah</a>    
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
           
            <div class="py-2 inline-block min-w-full sm:px-1 lg:px-8 ">
                @if (session('success'))
                <div class="alert alert-success flex items-center p-4 mb-4 text-green-800 bg-green-100 rounded-lg"
                    role="alert">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="sr-only">Success</span>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error flex items-center p-4 mb-4 text-red-800 bg-red-100 rounded-lg"
                    role="alert">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span class="sr-only">Error</span>
                    <div>{{ session('error') }}</div>
                </div>
            @endif
                <div class="shadow overflow-hidden border-b border-gray-200 p-5 rounded-lg bg-white">
                    <table id="kategoriTable" class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Nama Kategori
                                </th>
                                <th scope="col" class="px-6 py-3 text-left font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($kategoris as $index => $kategori)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                                    {{ $kategori->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm space-x-4">
                                    <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a>
                                    <form action="{{ route('kategoris.destroy', $kategori->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

/
