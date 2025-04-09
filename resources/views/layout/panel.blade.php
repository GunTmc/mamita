@extends('app')
@section('content')
    <div class="flex flex-col w-full h-full bg-gray-200 ">
        <div class="w-full bg-[#D690DF] p-2 flex items-center ">
            <button class=" p-2 rounded-bl-lg" onclick="toggleSidebar()" id ="toggleSidebar">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <h1 class="text-center w-full font-bold">{{ $title ?? '' }}</h1>
        </div>
        <div class=" w-full h-full overflow-x-auto relative">
            @include('layout.sidebar')
            <div class="w-full h-full flex flex-col px-6 py-4">
                @yield('panel')
            </div>
        </div>
    </div>
@endsection
