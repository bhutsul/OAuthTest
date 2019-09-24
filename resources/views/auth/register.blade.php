@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
    <form method="POST">
        @csrf
        <label for="lastName">{{ __('Прізвище') }}</label><br />
        <input id="lastName" type="text"  name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus><br />

        <label for="name">{{ __('Ім\'я') }}</label><br />
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br />

        <label for="patronimicName">{{ __('По-батькові') }}</label><br />
        <input id="patronimicName" type="text" name="patronimicName" value="{{ old('patronimicName') }}" required autocomplete="patronimicName" autofocus><br />

        <label for="dateOfBirth">{{ __('Дата народження') }}</label><br />
        <input id="dateOfBirth" type="date" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autocomplete="dateOfBirth" autofocus><br />

        <label for="phone">{{ __('Телефон формату +380111222333') }}</label><br />
        <input id="phone" type="tel" name="phone"  pattern="[\+]\d{12}" value="{{ old('phone') }}" required autocomplete="phone" autofocus><br />

        <label for="email" >{{ __('Емайл') }}</label><br />
        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br />

        <label for="city">{{ __('Місто') }}</label><br />
        <input id="city" type="text" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus><br />

        <button type="submit">
            {{ __('Реєстрація') }}
        </button>
    </form>
@endsection
