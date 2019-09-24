@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('confirm.number') }}">
        @csrf
        <label for="confirmNumber">{{ __('Введіть код з SMS') }}</label><br />
        <input id="confirmNumber" type="text" name="confirmNumber" ><br />

        <button type="submit">
            {{ __('Підтвердити') }}
        </button>
    </form>
    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
@endsection
