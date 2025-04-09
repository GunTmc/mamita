@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <a href="{{ route('toDo.create') }}"
                class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400">Tambahkan To Do</a>
            <table class="table">
                <thead class="bg-[#D690DF] text-white font-bold text-center sticky top-0 z-10">
                    <tr>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($toDos as $toDo)
                        <tr class="bg-base-200">
                            <td class="text-center">
                                <p class="max-w-sm">
                                    {{ $toDo->description }}
                                </p>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('toDo.edit', ['id' => $toDo->id]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Edit</a>
                                    <form action="{{ route('toDo.delete', ['id' => $toDo->id]) }}" method="post">
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
