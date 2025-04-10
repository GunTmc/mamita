@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <table class="table">
                <thead class="bg-[#D690DF] text-white font-bold text-center sticky top-0 z-10">
                    <tr>
                        <th>Nama Anak</th>
                        <th>Jenis Kelamin</th>
                        <th>Tinggi Bandan</th>
                        <th>Berat Bandan</th>
                        <th>Status Gizi</th>
                        <th>Tanggal Lahir</th>
                        <th>Bulan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($children as $child)
                        <tr class="bg-base-200">
                            <td class="text-center">{{ $child->name }}</td>
                            <td class="text-center">{{ $child->gender }}</td>
                            <td class="text-center">{{ $child->height }}</td>
                            <td class="text-center">{{ $child->weight }}</td>
                            <td class="text-center">{{ $child->status }}</td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($child->date_of_birth)) }}</td>

                            <td class="text-center">{{ $child->month_registered_at }}</td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('registrationChild.edit', ['id' => $child->id, 'userId' => $userId]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Edit</a>
                                    <form
                                        action="{{ route('registrationChild.delete', ['id' => $child->id, 'userId' => $userId]) }}"
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
