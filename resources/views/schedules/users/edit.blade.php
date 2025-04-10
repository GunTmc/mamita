@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form id="form" method="post" enctype="multipart/form-data"
            action="{{ route('schedules.user.update', ['type' => $type, 'userId' => $userId, 'id' => $schedule->id]) }}"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-2 h-fit">
            <h1 class="text-xl font-bold  text-black">EDIT JADWAL</h1>
            @csrf
            <x-form.input label="{{ $type == 'child' ? 'Tanggal Jadwal Imuniasi' : 'Tanggal Jadwal Konsultasi' }}"
                name="date" type="date" value="{{ date('Y-m-d', strtotime($schedule->date)) }}" />
            @if ($type == 'child')
                <x-form.input label="Informasi vaksine" name="note" type="text" value="{{ $schedule->note }}" />
            @endif
            <div class="flex w-full justify-between">
                <h1>Keterangan</h1>
                <select name="status" id="category" class="rounded border-2 border-[#D690DF] py-2 px-10">
                    <option value="Telah Mendaftar" @if ($schedule->status == 'Telah Mendaftar') selected @endif>Belum Mendaftar
                    <option value="Belum Mendaftar" @if ($schedule->status == 'Belum Mendaftar') selected @endif>Telah Mendaftar
                    <option value="Selesai" @if ($schedule->status == 'Selesai') selected @endif>Selesai</option>
                    </option>
                </select>
            </div>
        </form>
        <div class="flex w-1/2 justify-evenly mt-4 pb-3">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('schedules.user.index', ['type' => $type, 'userId' => $userId]) }}">Kembali</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
