@php
    use App\Models\Masters\Article;

    $sourceId = request('sourceId');
    $type = request('type');
    $editUrl = match ($type) {
        Article::TYPE_PREG => route('pregnancy.edit', ['id' => $sourceId]),
        Article::TYPE_CHILD => route('child.edit', ['id' => $sourceId]),
        Article::TYPE_NEWS => route('profile.properties'),
        default => '#',
    };

    $subTitle = match ($type) {
        Article::TYPE_PREG => 'ARTIKEL PERKEMBANGAN KEHAMILAN',
        Article::TYPE_CHILD => 'ARTIKEL PERKEMBANGAN ANAK',
        Article::TYPE_NEWS => 'NEWS',
        default => '#',
    };
@endphp

@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4 w-1/2 mx-auto">
        <h1 class="text-2xl font-bold text-center p-1  bg-[#D690DF] rounded-xl  mb-10">
            {{ $subTitle }}
        </h1>
        <div class="overflow-x-scroll rounded-xl max-h-full">
            <table class="table">
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="bg-base-200">
                            <td class="text-center">{{ $article->title }}</td>
                            <td>
                                <p class="text-center line-clamp-3 max-w-xl">
                                    {{ $article->body }}
                                </p>
                            </td>
                            <td>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('article.edit', [
                                        'id' => $article->id,
                                        'sourceId' => request('sourceId'),
                                        'type' => request('type'),
                                    ]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4 flex w-1/2 justify-evenly mb-2">
        <a href="{{ $editUrl }}" class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400">Kembali</a>
        <a href="{{ route('article.create', ['sourceId' => $sourceId, 'type' => $type]) }}"
            class="btn px-10 rounded my-1 bg-[#D690DF] text-white hover:bg-pink-400">Tambah
            {{ $type == Article::TYPE_NEWS ? 'News' : 'Artikel' }}</a>
    </div>
@endsection
