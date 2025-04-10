@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form id="form" method="post" enctype="multipart/form-data"
            action="{{ route('registrationPregnancy.update', ['id' => $pregnancy->id, 'userId' => $userId]) }}"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">INFORMASI PERKIRAAN KELAHIRAN</h1>
            @csrf
            <x-form.input label="Periode Kehamilan" name="periodPregnancy" type="text"
                value="{{ $pregnancy->period_pregnancy }}" />
            <x-form.input label="Riwayat Medis" name="history" type="text" value="{{ $pregnancy->history }}" />
            <x-form.input label="Tanggal Terahir haid" name="lastPeriodMenstruation" type="date"
                value="{{ date('Y-m-d', strtotime($pregnancy->last_period_menstruation)) }}" />
            <x-form.input label="Tanggal perkiraan kelahiran" name="estimatedDateOfDelivery" type="date"
                value="{{ date('Y-m-d', strtotime($pregnancy->estimated_date_of_delivery)) }}" />


        </form>
        <div class="flex w-1/2 justify-evenly mt-4 pb-3 gap-2">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('registrationPregnancy.index', ['userId' => $userId]) }}">Kembali</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('registrationPregnancy.index', ['userId' => $userId]) }}">Check To Do</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('schedules.user.index', ['userId' => $userId, 'type' => 'preg']) }}">Jadwal Konsultasi</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('schedules.user.index', ['userId' => $userId, 'type' => 'preg']) }}">Daftar Konsultasi</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
