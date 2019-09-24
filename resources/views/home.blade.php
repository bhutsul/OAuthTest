@extends('layouts.app')

@section('content')
    Привіт {{ Auth::user()->name }}, Ви ввійшли
    <a href="{{ route('logout') }}"
       onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        {{ __('Вихід') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endsection
