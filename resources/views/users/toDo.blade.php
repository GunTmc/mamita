@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
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
                                <div class="flex justify-center">
                                    <input type="checkbox" @if ($toDo->user_to_do_status) checked="checked" @endif
                                        disabled />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ url()->previous() }}"
            class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400">Kembali</a>
    </div>
@endsection
