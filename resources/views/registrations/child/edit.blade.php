@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form id="form" method="post" enctype="multipart/form-data"
            action="{{ route('registrationChild.update', ['id' => $child->id, 'userId' => $userId]) }}"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">INFORMASI DATA ANAK</h1>
            @csrf
            <x-form.input label="Nama Anak" name="name" type="text" value="{{ $child->name }}" />
            <x-form.input label="Jenis kelamin" name="gender" type="text" value="{{ $child->gender }}" />
            <x-form.input label="Tinggi Badan" name="height" type="text" value="{{ $child->height }}" />
            <x-form.input label="Berat Badan" name="weight" type="text" value="{{ $child->weight }}" />
            <x-form.input label="Status" name="status" type="text" value="{{ $child->status }}" />
            <x-form.input label="Tanggal lahir" name="dateOfBirth" type="date"
                value="{{ date('Y-m-d', strtotime($child->date_of_birth)) }}" />
            <x-form.input label="Bulan" name="monthRegistration" type="text" value="{{ $child->month_registered }}" />

        </form>
        <div class="flex w-1/2 justify-evenly mt-4 pb-3 gap-2">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('registrationChild.index', ['userId' => $userId]) }}">Kembali</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('schedules.user.index', ['type' => 'child', 'userId' => $userId]) }}">Jadwal Imunisasi</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
