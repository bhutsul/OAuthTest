@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login.phone') }}">
        @csrf

        <label for="phone">{{ __('Введіть номер телефона') }}</label><br />
        <input id="phone" type="text" name="phone" ><br />

        <button type="submit" >
            {{ __('Вхід') }}
        </button>
    </form>
    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
    <a href="{{ url('social-auth', 'facebook') }}" title="Facebook">
        Facebook
    </a>
    <a href="{{ url('social-auth', 'google') }}" title="Google">
        Google
    </a>
@endsection
