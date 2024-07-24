@extends('layouts.app') {{-- Assuming you have a main layout file --}}

@section('content')
<div class="flex justify-center items-center min-h-screen">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Pilih sesuai Pilihan Anda</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @foreach($kategoris as $kategori)
            <div class="mb-8">
                <h2 class="text-lg font-semibold text-gray-800 mb-4 text-center">{{ $kategori->name }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-center">
                    @php
                        $userVotedInCategory = isset($userVotes[$kategori->id]);
                    @endphp

                    @foreach($kategori->paslons as $paslon)
                        <div class="card bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="flex flex-col items-center p-4">
                                <img src="{{ asset('storage/images/'.$paslon->photo) }}" alt="{{ $paslon->name }}" class="rounded-full h-32 w-32 mb-4 object-cover">
                                <h5 class="text-md font-medium text-gray-900">{{ $paslon->name }}</h5>
                                <p class="text-sm text-gray-600 text-center">{{ $paslon->description }}</p>
                                <form method="POST" action="{{ route('voter.store') }}" class="mt-4 w-full">
                                    @csrf
                                    <input type="hidden" name="paslon_id" value="{{ $paslon->id }}">
                                    <button type="submit" class="btn w-full bg-blue-500 hover:bg-blue-700 text-white rounded-lg py-2 mt-2"
                                            @if($userVotedInCategory) disabled @endif>
                                        @if($userVotedInCategory) Voted @else Vote @endif
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
