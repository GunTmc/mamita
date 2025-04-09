@php
    use App\Models\Masters\Article;
@endphp
@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <table class="table">
                <thead
                    class="bg-[#D9D9D9] font-bold text-center text-black sticky top-0 z-10 overflow-hidden border-2 border-[#D9D9D9]">
                    <tr>
                        <td class="border">Profile</td>
                        <td class="border">
                            <a class="btn bg-[#D690DF] text-white font-bold px-4 py-2"
                                href="{{ route('profile.edit') }}">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border">Jadwal</td>
                        <td class="border">
                            <a class="btn bg-[#D690DF] text-white font-bold px-4 py-2"
                                href="{{ route('schedule.index') }}">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border">Sosial Media</td>
                        <td class="border">
                            <a class="btn bg-[#D690DF] text-white font-bold px-4 py-2"
                                href="{{ route('profile.media-social.show') }}">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border">News</td>
                        <td class="border">
                            <a class="btn bg-[#D690DF] text-white font-bold px-4 py-2"
                                href="{{ route('article.index', ['type' => Article::TYPE_NEWS, 'sourceId' => Auth::user()->id]) }}">Edit</a>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
