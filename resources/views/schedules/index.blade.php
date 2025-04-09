@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <table class="table text-center bg-[#D9D9D9] rounded-xl border-2 overflow-hidden">
                <thead class="font-bold sticky top-0 z-10 text-black">
                    <tr>
                        <th class="border">Hari</th>
                        <th class="border">Jam</th>
                        <th class="border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td class="border"> {{ $schedule->day }} </td>
                            <td class="border">{{ $schedule->time }}</td>
                            <td class="border">
                                <div class="flex gap-2 items-center justify-center">
                                    <a href="{{ route('schedule.edit', ['id' => $schedule->id]) }}"
                                        class="px-6 py-2 rounded-xl bg-[#D690DF] text-white font-bold">
                                        Edit
                                    </a>
                                    <form action="{{ route('schedule.delete', ['id' => $schedule->id]) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="px-6 py-2 rounded-xl bg-[#D690DF] text-white font-bold">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex w-1/2 justify-evenly mt-4 pb-3">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('profile.properties') }}">Kembali</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('schedule.create') }}">Tambahkan</a>
        </div>
    </div>
@endsection
