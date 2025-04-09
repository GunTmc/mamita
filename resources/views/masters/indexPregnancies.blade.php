@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full">
            <table class="table">
                <thead class="bg-[#D690DF] text-white font-bold text-center sticky top-0 z-10">
                    <tr>
                        <th>Minggu</th>
                        <th>Mom Note</th>
                        <th>Bentuk</th>
                        <th>Berat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pregnancies as $pregnancy)
                        <tr class="bg-base-200">
                            <td class="text-center">{{ $pregnancy->gestational_age }}</td>
                            <td class="text-center">{{ $pregnancy->note }}</td>
                            <th class="text-center">
                                <div class="flex justify-center items-center">
                                    @if ($pregnancy->fetus)
                                        <img class="w-20 h-20" src="{{ asset('storage/' . $pregnancy->fetus) }}"
                                            alt="{{ $pregnancy->gestational_age }}">
                                    @else
                                        <h1 class="text-center text-black">No Image</h1>
                                    @endif
                                </div>
                            </th>
                            <td class="text-center">{{ $pregnancy->weight }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('pregnancy.edit', ['id' => $pregnancy->id]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Lihat
                                        Detail</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
