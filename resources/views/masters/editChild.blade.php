@php
    use App\Models\Masters\Article;
@endphp

@error('sourceId')
    <p class="text-red-500 text-xs mt-4">{{ $message }}</p>
@enderror

@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form id="form" method="post" enctype="multipart/form-data"
            action="{{ route('child.update', ['id' => $child->id]) }}"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">EDIT PERKEMBANGAN ANAK</h1>
            @csrf
            <x-form.input label="Bulan" name="age" type="text" value="{{ $child->age }}" />
            <x-form.input label="Deskripsi" name="note" type="textarea" value="{{ $child->note }}" />
            <x-form.input label="Vaksin Info" name="vaccine" type="textarea" value="{{ $child->vaccine }}" />
            <x-form.input label="lingkar kepala" name="headCircumference" type="text"
                value="{{ $child->head_circumference }}" />
            <x-form.input label="berat" name="weight" type="text" value="{{ $child->weight }}" />
            <x-form.input label="tinggi" name="height" type="text" value="{{ $child->height }}" />
        </form>
        <div class="flex w-1/2 justify-evenly mt-4 pb-3">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('child.index') }}">Kembali</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('article.index', ['sourceId' => $child->id, 'type' => Article::TYPE_CHILD]) }}">Artikel</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
