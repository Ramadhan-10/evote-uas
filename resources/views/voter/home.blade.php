@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-4">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6">
            <h1 class="text-2xl font-bold mb-6 text-center">Aturan dan Panduan Pemilihan</h1>
            <div class="prose max-w-none mx-auto my-8">
                <h2 class="text-2xl font-bold mb-3 text-center">Pengenalan</h2>
                <p class="mb-5">Selamat datang di sistem pemilihan. Silakan baca aturan dan panduan berikut dengan seksama sebelum berpartisipasi dalam proses pemilihan.</p>
            
                <h2 class="text-xl font-semibold mb-3">Kelayakan</h2>
                <ul class="list-disc list-inside mb-5">
                    <li>Hanya pengguna yang terdaftar yang diperbolehkan untuk memberikan suara.</li>
                    <li>Setiap pengguna hanya diperbolehkan memberikan satu suara per kategori.</li>
                </ul>
            
                <h2 class="text-xl font-semibold mb-3">Proses Pemilihan</h2>
                <ol class="list-decimal list-inside mb-5">
                    <li>Arahkan ke halaman pemilihan.</li>
                    <li>Pilih kandidat (paslon) pilihan Anda dari setiap kategori.</li>
                    <li>Klik tombol "Vote" untuk memberikan suara Anda.</li>
                    <li>Setelah Anda memberikan suara, Anda tidak dapat mengubah suara Anda untuk kategori tersebut.</li>
                </ol>
            
                <h2 class="text-xl font-semibold mb-3">Aturan Umum</h2>
                <ul class="list-disc list-inside mb-5">
                    <li>Pastikan Anda membuat pilihan Anda dengan hati-hati sebelum mengirimkan suara Anda.</li>
                    <li>Jangan mencoba memberikan suara lebih dari sekali dalam kategori yang sama menggunakan akun yang berbeda.</li>
                    <li>Hormati proses pemilihan dan hasilnya.</li>
                </ul>
            
                <h2 class="text-xl font-semibold mb-3">Kontak</h2>
                <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan hubungi tim dukungan kami di <a href="mailto:support@example.com" class="text-blue-600 underline">support@example.com</a>.</p>
            </div>
            
            <div class="text-center mt-6">
                <a href="{{ route('voter.vote') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Lanjut Pemilihan</a>
            </div>
        </div>

</div>
@endsection
