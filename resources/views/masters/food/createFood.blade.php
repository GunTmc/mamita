@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form id="form" method="post" enctype="multipart/form-data" action="{{ route('food.store') }}"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">TAMBAHKAN MAKANAN</h1>
            @csrf
            <x-form.input label="Nama Makanan" name="name" type="text" />
            <x-form.input label="Deskripsi" name="description" type="textarea" />
            <x-form.input label="Gambar" name="image" type="file" />
            <div class="flex w-full justify-between">
                <h1>Kategori</h1>
                <select name="category" id="category" class="rounded border-2 border-[#D690DF] py-2 px-10">
                    <option selected disabled value="">Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" @if (old('category') == $category) selected @endif>
                            {{ $category }}</option>
                    @endforeach
                </select>
            </div>

        </form>
        <div class="flex w-1/2 justify-evenly mt-4 pb-3">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('food.index') }}">Kembali</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
