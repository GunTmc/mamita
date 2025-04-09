@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form method="post" id="form" enctype="multipart/form-data"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">Edit Akun</h1>
            @csrf
            <x-form.input label="Nama Admin" name="name" type="text" value="{{ $user->name }}" />
            <x-form.input label="Nomor Admin" name="phone" type="text" value="{{ $user->phone }}" />
            <x-form.input label="Email Admin / Puskesmas" name="email" type="email" value="{{ $user->email }}" />
            <x-form.input label="Name Puskesmas" name="healthcareName" type="text"
                value="{{ $user->healthcare_name }}" />
            <x-form.input label="Alamat Puskesmas" name="healthcareAddress" type="text"
                value="{{ $user->healthcare_address }}" />
            <x-form.input label="Username" name="username" type="text" value="{{ $user->username }}" />
            <x-form.input label="Gambar Puskesmas" name="image" type="file" value="{{ $user->image }}" />

        </form>
        <div class="flex w-1/2 justify-evenly mt-4">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('profile.properties') }}">Kembali</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Simpan</button>
        </div>
    </div>
@endsection
