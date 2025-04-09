@extends('app')
@section('content')
    <div class=" bg-gray-200 w-full h-screen flex flex-col items-center justify-center py-6">
        <form method="post" class="bg-white rounded-3xl w-1/2 px-8 pb-6 pt-1 flex flex-col items-center gap-4 h-fit ">
            <h1 class="text-xl font-bold  text-black">Login</h1>
            @csrf
            <x-form.input name="email" type="email" placeholder="Email" />
            <x-form.input name="password" type="password" placeholder="*******" />

            <button class="btn px-10 rounded bg-pink-300 text-white hover:bg-pink-400" type="submit">Login</button>
        </form>
        @if (session('errorLogin'))
            <p class="text-red-500 text-xs mt-4"> {{ session('errorLogin') }}</p>
        @endif
        <p class="mt-4 text-black">Tidak memiliki akun? <a class="underline" href="{{ route('register') }}">Daftar</a>
        </p>
    </div>
@endsection
