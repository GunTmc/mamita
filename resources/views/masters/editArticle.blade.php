@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form id="form" method="post" enctype="multipart/form-data"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">EDIT {{ $article->type == 'news' ? 'BERITA' : 'ARTIKEL' }}</h1>
            @csrf
            <x-form.input label="Judul" name="title" type="text" value="{{ $article->title }}" />
            <x-form.input label="Isi {{ $article->type == 'news' ? 'Berita' : 'Artikel' }}" name="body" type="textarea"
                value="{{ $article->body }}" />
            <x-form.input label="Gambar" name="image" type="file" value="{{ $article->image }}" />

        </form>
        <div class="flex w-1/2 justify-evenly mt-4">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('article.index', ['sourceId' => $article->source_id, 'type' => $article->type]) }}">Kembali</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
