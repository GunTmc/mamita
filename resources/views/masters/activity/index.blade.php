@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <a href="{{ route('activity.create') }}"
                class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400">Tambahkan Makanan</a>
            <table class="table">
                <thead class="bg-[#D690DF] text-white font-bold text-center sticky top-0 z-10">
                    <tr>
                        <th>Kategori</th>
                        <th>Nama Makanan</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr class="bg-base-200">
                            <td class="text-center">{{ $activity->category }}</td>
                            <td class="text-center">{{ $activity->name }}</td>
                            <td class="text-center">
                                <p class="max-w-sm">
                                    {{ $activity->description }}
                                </p>
                            </td>
                            <th class="text-center">
                                <div class="flex justify-center items-center">
                                    @if ($activity->image)
                                        <img class="w-20 h-20" src="{{ asset('storage/' . $activity->image) }}"
                                            alt="{{ $activity->name }}">
                                    @else
                                        <h1 class="text-center text-black">No Image</h1>
                                    @endif
                                </div>
                            </th>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('activity.edit', ['id' => $activity->id]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Edit</a>
                                    <form action="{{ route('activity.delete', ['id' => $activity->id]) }}" method="post">
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
    </div>
@endsection
