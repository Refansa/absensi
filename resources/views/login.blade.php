@extends('layouts.main')
@section('body')
  <main class="min-h-screen min-w-full max-h-screen max-w-full grid place-items-center">
    <form class="py-4 px-6 border-2 border-black flex flex-col gap-2" action="{{ route('login.post') }}" method="POST">
      @csrf
      <h1 class="text-center font-bold text-xl mb-4">Login Page</h1>
      <label class="text-sm font-medium w-64" for="username">Username</label>
      <input class="border-2 border-black outline-none p-1" type="text" name="username" id="username" maxlength="255"
        required>
      <label class="text-sm font-medium w-64" for="password">Password</label>
      <input class="border-2 border-black outline-none p-1" type="password" name="password" id="password" maxlength="255"
        required>
      <button class="border-2 border-black px-4 font-medium self-center mt-2 border-r-4 border-b-4 hover:scale-105 transition-all"
        type="submit">Login</button>
    </form>
  </main>
@endsection
