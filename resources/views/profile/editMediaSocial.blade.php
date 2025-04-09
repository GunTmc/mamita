@extends('layout.panel')
@section('panel')
    <div class=" flex flex-col w-full h-full items-center gap-1">
        <form id="form" method="post" action="{{ route('profile.media-social.update') }}"
            class="bg-white rounded-3xl w-1/2 px-8  py-10 flex flex-col items-center gap-1 h-fit">
            <h1 class="text-xl font-bold  text-black">Edit Medical Sosial</h1>
            @csrf
            <x-form.input label="Sosial Media" name="mediaSocial" type="text" value="{{ $mediaSocial['name'] }}" />
            <x-form.input label="Name" name="{{ $mediaSocial['name'] }}" type="text"
                value="{{ $mediaSocial['value'] }}" />
        </form>
        <div class="flex w-1/2 justify-evenly mt-4">
            <a class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                href="{{ route('profile.media-social.show') }}">Kembali</a>
            <button class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400"
                onclick="document.getElementById('form').submit()">Submit</button>

        </div>
    </div>
@endsection
