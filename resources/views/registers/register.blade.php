@extends('app')
@section('content')
    <div class=" bg-gray-200 w-full h-screen flex flex-col items-center justify-center py-6">
        <form method="post" class="bg-white rounded-3xl w-1/2 px-8 pb-2 pt-6 flex flex-col items-center gap-1 h-full">
            <h1 class="text-xl font-bold  text-black">Daftar Akun</h1>
            @csrf
            <x-form.input label="Nama Admin" name="name" type="text" />
            <x-form.input label="Nomor Admin" name="phone" type="text" />
            <x-form.input label="Email Admin / Puskesmas" name="email" type="email" />
            <x-form.input label="Name Puskesmas" name="healthcareName" type="text" />
            <x-form.input label="Alamat Puskesmas" name="healthcareAddress" type="text" />
            <x-form.input label="Username" name="username" type="text" />
            <x-form.input label="Password" name="password" type="password" />
            <x-form.input label="Password Confirm" name="passwordConfirmation" type="password" />

            <button class="btn px-10 rounded my-1 bg-pink-300 text-white hover:bg-pink-400" type="submit">Daftar</button>
        </form>
        <p class="mt-4 text-black">Sudah memiliki akun? <a class="underline" href="{{ route('auth.login') }}">Login</a></p>
    </div>
@endsection
