@extends('layouts.app')


@section('content')
<style>
    
</style>
<div class="container mx-auto px-4 p-2 rounded-lg bg-white">
    <h1 class="text-3xl font-bold text-center text-black">Daftar Paslon</h1>
    <a href="{{ route('admin.paslon.create') }}" class="my-5 px-4 py-2 bg-blue-500 text-white rounded-lg">Tambah</a>
    <div class="flex flex-col">
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-1 lg:px-8 ">
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
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 " id="paslonTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bio
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Photo
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($paslons as $paslon)
                            <tr class="hover:bg-gray-100">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $paslon->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{!! $paslon->description !!}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    @php
                                        $kategori = $kategoris->firstWhere('id', $paslon->kategori_id);
                                    @endphp
                                    {{ $kategori ? $kategori->name : 'No Kategori' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                                    @if($paslon->photo)
                                        <img src="{{ asset('storage/images/' . $paslon->photo) }}" alt="Paslon Photo" class="w-16 h-16 rounded-full">
                                    @else
                                        <span class="text-sm text-gray-500">No Photo</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                                    <a href="{{ route('admin.paslon.edit', $paslon->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('paslons.destroy', $paslon->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
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