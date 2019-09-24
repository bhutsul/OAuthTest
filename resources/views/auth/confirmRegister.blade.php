@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('confirm.register') }}">
    @csrf
    <label for="confirmRegister">{{ __('Введіть код з SMS') }}</label><br />
    <input id="confirmRegister" type="text" name="confirmRegister" ><br />

    <button type="submit">
        {{ __('Підтвердити') }}
    </button>
</form>
@if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
@endif
@endsection