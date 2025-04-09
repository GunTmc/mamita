@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full">
            <table class="table">
                <thead class="bg-[#D690DF] text-white font-bold text-center sticky top-0 z-10">
                    <tr>
                        <th>Bulan</th>
                        <th>Deskripsi</th>
                        <th>Vaksin Info</th>
                        <th>Linkar Kepala</th>
                        <th>Berat</th>
                        <th>Tinggi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($children as $child)
                        <tr class="bg-base-200">
                            <td class="text-center">{{ $child->age }}</td>
                            <td class="text-center">{{ $child->note }}</td>
                            <td class="text-center">{{ $child->vaccine }}</td>
                            <td class="text-center">{{ $child->head_circumference }}</td>
                            <td class="text-center">{{ $child->weight }}</td>
                            <td class="text-center">{{ $child->hight }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('child.edit', ['id' => $child->id]) }}"
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
