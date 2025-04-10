@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form method="post" class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">INFORMASI USER</h1>
            @csrf
            <x-form.input label="Nama Istri" name="wife" type="text" value="{{ $user->wife }}" disabled="true" />
            <x-form.input label="Nama Suami" name="husband" type="text" value="{{ $user->husband }}" disabled="true" />
            <x-form.input label="Email" name="email" type="text" value="{{ $user->email }}" disabled="true" />
            <x-form.input label="Nomor Telpon" name="phone" type="text" value="{{ $user->phone }}" disabled="true" />
        </form>
        <div class="flex w-1/2 justify-evenly mt-4">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('home') }}">Kembali</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('registrationPregnancy.index', ['userId' => $user->id]) }}">Lihat
                Perkiraan Lahiran</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('registrationChild.index', ['userId' => $user->id]) }}">Lihdat
                Data Anak</a>


        </div>
    </div>
@endsection
