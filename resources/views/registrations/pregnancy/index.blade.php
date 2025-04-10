@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <table class="table">
                <thead class="bg-[#D690DF] text-white font-bold text-center sticky top-0 z-10">
                    <tr>
                        <th>Periode Kehamilan</th>
                        <th>Riwayat Medis</th>
                        <th>Tanggal Haid Terahir</th>
                        <th>Tanggal Perkiraan Kelahiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pregnancies as $pregnancy)
                        <tr class="bg-base-200">
                            <td class="text-center">{{ $pregnancy->period_pregnancy }}</td>
                            <td class="text-center">{{ $pregnancy->history }}</td>
                            <td class="text-center">{{ $pregnancy->last_period_menstruation }}</td>
                            <td class="text-center">{{ $pregnancy->estimated_date_of_delivery }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('registrationPregnancy.edit', ['id' => $pregnancy->id, 'userId' => $userId]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Edit</a>
                                    <form
                                        action="{{ route('registrationPregnancy.delete', ['id' => $pregnancy->id, 'userId' => $userId]) }}"
                                        method="post">
                                        @csrf
                                        <button
                                            class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Hapus</button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex mt-2 max-w-lg w-full">
            <a href="{{ route('user.show', ['id' => $userId]) }}"
                class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Kembali</a>

        </div>
    </div>
@endsection
