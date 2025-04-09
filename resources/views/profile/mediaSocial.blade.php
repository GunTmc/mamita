@extends('layout.panel')
@section('panel')
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full w-3/4 mx-auto">
            <table class="table text-center bg-[#D9D9D9] rounded-xl border-2 overflow-hidden">
                <thead class="font-bold sticky top-0 z-10 text-black">
                    <tr>
                        <th class="border">Sosial Media</th>
                        <th class="border">Nama</th>
                        <th class="border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border"> Instagram </td>
                        <td class="border">{{ $user->instagram }}</td>
                        <td class="border">
                            <a class="px-6 py-2 rounded-xl bg-[#D690DF] text-white font-bold"
                                href="{{ route('profile.media-social.edit', 'instagram') }}">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border"> x </td>
                        <td class="border">{{ $user->x }}</td>
                        <td class="border">
                            <a class="px-6 py-2 rounded-xl bg-[#D690DF] text-white font-bold"
                                href="{{ route('profile.media-social.edit', 'x') }}">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border"> Facebook </td>
                        <td class="border">{{ $user->facebook }}</td>
                        <td class="border">
                            <a class="px-6 py-2 rounded-xl bg-[#D690DF] text-white font-bold"
                                href="{{ route('profile.media-social.edit', 'facebook') }}">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
