@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <a href="{{ route('food.create') }}"
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
                    @foreach ($foods as $food)
                        <tr class="bg-base-200">
                            <td class="text-center">{{ $food->category }}</td>
                            <td class="text-center">{{ $food->name }}</td>
                            <td class="text-center">
                                <p class="max-w-sm">
                                    {{ $food->description }}
                                </p>
                            </td>
                            <th class="text-center">
                                <div class="flex justify-center items-center">
                                    @if ($food->image)
                                        <img class="w-20 h-20" src="{{ asset('storage/' . $food->image) }}"
                                            alt="{{ $food->name }}">
                                    @else
                                        <h1 class="text-center text-black">No Image</h1>
                                    @endif
                                </div>
                            </th>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('food.edit', ['id' => $food->id]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Edit</a>
                                    <form action="{{ route('food.delete', ['id' => $food->id]) }}" method="post">
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
