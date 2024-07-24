@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6 text-center">Voting History</h1>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">Voter Name</th>
                        <th scope="col" class="py-3 px-6">Paslon</th>
                        <th scope="col" class="py-3 px-6">Kategori</th>
                        <th scope="col" class="py-3 px-6">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($votes as $vote)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6">{{ $vote->user->name }}</td>
                            <td class="py-4 px-6">{{ $vote->paslon->name }}</td>
                            <td class="py-4 px-6">{{ $vote->paslon->kategori->name }}</td>
                            <td class="py-4 px-6">{{ $vote->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
