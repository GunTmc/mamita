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
            action="{{ route('pregnancy.update', ['id' => $pregnancy->id]) }}"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">EDIT PERKEMBANGAN KEHAMILAN</h1>
            @csrf
            <x-form.input label="Minggu" name="gestationalAge" type="text" value="{{ $pregnancy->gestational_age }}" />
            <x-form.input label="Mom Note" name="note" type="textarea" value="{{ $pregnancy->note }}" />
            <x-form.input label="berat" name="weight" type="text" value="{{ $pregnancy->weight }}" />
            <x-form.input label="Bentuk" name="fetus" type="file" value="{{ $pregnancy->fetus }}" />
            <x-form.input label="berat" name="usg" type="file" value="{{ $pregnancy->usg }}" />
        </form>
        <div class="flex w-1/2 justify-evenly mt-4 pb-3">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('pregnancy.index') }}">Kembali</a>
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('article.index', ['sourceId' => $pregnancy->id, 'type' => Article::TYPE_PREG]) }}">Artikel</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
