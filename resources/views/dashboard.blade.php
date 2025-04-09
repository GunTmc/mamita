@extends('layout.panel')
@section('panel')
    <form action="" id="searchForm">
        <input type="text" class="rounded-xl w-full border-none input placeholder:font-bold" name="search"
            value="{{ request('search') }}" placeholder="Cari berdasarkan email.." oninput="submitOnChange(this)">
        @if (request('search'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const searchInput = document.querySelector('input[name="search"]');
                    if (searchInput) {
                        searchInput.focus();
                        const val = searchInput.value;
                        searchInput.setSelectionRange(val.length, val.length);
                    }
                });
            </script>
        @endif


    </form>
    <div class="overflow-x-hidden mt-10 mb-4">
        <div class="overflow-x-scroll rounded-xl max-h-full">
            <table class="table">
                <thead class="bg-[#D690DF] text-white font-bold text-center sticky top-0 z-10">
                    <tr>
                        <th>Email</th>
                        <th>Nama Admin</th>
                        <th>Nama Puskesmas</th>
                        <th>Nomor Admin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="bg-base-200">
                            <th class="text-center">{{ $user->email }}</th>
                            <th class="text-center">{{ $user->name }}</th>
                            <th class="text-center">{{ $user->healthcare_name }}</th>
                            <th class="text-center">{{ $user->phone }}</th>
                            <th>
                                <div class="flex justify-center items-center">
                                    <a href="{{ route('user.show', ['id' => $user->id]) }}"
                                        class="bg-[#D690DF] px-10 py-4 rounded-xl btn text-white font-bold">Lihat
                                        Detail</a>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
<script>
    let typingTimer;
    const delay = 500;

    function submitOnChange(input) {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, delay);
    }
</script>
