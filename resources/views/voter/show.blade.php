@extends('layouts.app')
@section('content')
    <div class="container mx-auto ">
        <div class="flex justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
                <h2 class="text-2xl font-bold mb-2 text-gray-800 text-center">Details</h2>
                <div class="bg-white px-6 py-5 sm:gap-4 sm:px-6">
                    <div class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 flex  justify-center items-center">
                        @if ($paslons->photo)
                            <img src="{{ asset('storage/images/' . $paslons->photo) }}" alt="Profile Picture"
                                class="h-80 max-w-full">
                        @else
                            No photo provided.
                        @endif
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 r">
                    <span class="text-sm font-medium text-gray-500">
                        Full name
                    </span>
                    <span class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $paslons->name }}
                    </span>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 text-justify">
                    <span class="text-sm font-medium text-gray-500">
                        Biography
                    </span>
                    <span class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {!! $paslons->description !!}
                    </span>
                </div>
                <div class="flex justify-center mt-4">
                    <a href="{{ route('voter.vote') }}"
                        class="inline-block px-6 py-2 text-xs mx-2 font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg focus:outline-none">
                        Back
                    </a>
                </div>
                <div class="flex justify-center mt-4">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
