@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('confirm.login') }}">
        @csrf
        <label for="confirmLogin">{{ __('Введіть код з SMS') }}</label><br />
        <input id="confirmLogin" type="text" name="confirmLogin" ><br />

        <button type="submit">
            {{ __('Підтвердити') }}
        </button>
    </form>
    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
@endsection
