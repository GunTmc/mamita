@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form method="post" class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">Detail Akun</h1>
            @csrf
            <x-form.input label="Nama Admin" name="name" type="text" value="{{ $user->name }}" disabled="true" />
            <x-form.input label="Nomor Admin" name="phone" type="text" value="{{ $user->phone }}" disabled="true" />
            <x-form.input label="Email Admin / Puskesmas" name="email" type="email" value="{{ $user->email }}"
                disabled="true" />
            <x-form.input label="Name Puskesmas" name="healthcareName" type="text" value="{{ $user->healthcare_name }}"
                disabled="true" />
            <x-form.input label="Alamat Puskesmas" name="healthcareAddress" type="text"
                value="{{ $user->healthcare_address }}" disabled="true" />
            <x-form.input label="Username" name="username" type="text" value="{{ $user->username }}" disabled="true" />

        </form>
        <div class="flex w-1/2 justify-evenly mt-4">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('home') }}">Kembali</a>
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
                @csrf
                <input type="hidden" name="verified" value="true">
                <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                    type="submit">Verivikasi</button>
            </form>
            <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="post">
                @csrf
                <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400" type="submit">Hapus
                    Akun</button>
            </form>

        </div>
    </div>
@endsection
