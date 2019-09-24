@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
    <form method="POST">
        @csrf
        <label for="lastName">{{ __('Прізвище') }}</label><br />
        <input id="lastName" type="text"  name="lastName" class="@error('lastName') is-invalid @enderror" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus><br />
            @error('lastName')
                <strong>{{ $message }}</strong><br />
            @enderror

        <label for="name">{{ __('Ім\'я') }}</label><br />
        <input id="name" type="text" name="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus><br />
            @error('name')
                <strong>{{ $message }}</strong><br />
            @enderror

        <label for="patronimicName">{{ __('По-батькові') }}</label><br />
        <input id="patronimicName" type="text" name="patronimicName" class="@error('patronimicName') is-invalid @enderror" value="{{ old('patronimicName') }}" required autocomplete="patronimicName" autofocus><br />
            @error('patronimicName')
                <strong>{{ $message }}</strong><br />
            @enderror

        <label for="dateOfBirth">{{ __('Дата народження') }}</label><br />
        <input id="dateOfBirth" type="date" name="dateOfBirth" value="{{ old('dateOfBirth') }}" required autocomplete="dateOfBirth" autofocus><br />

        <label for="phone">{{ __('Телефон формату +380111222333') }}</label><br />
        <input id="phone" type="tel" name="phone"  pattern="[\+]\d{12}" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" required autocomplete="phone" autofocus><br />
            @error('phone')
                <strong>{{ $message }}</strong><br />
            @enderror

        <label for="email" >{{ __('Електронна пошта') }}</label><br />
        <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus><br />
            @error('email')
                <strong>{{ $message }}</strong><br />
            @enderror

        <label for="city">{{ __('Місто') }}</label><br />
        <input id="city" type="text" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus><br />

        <button type="submit">
            {{ __('Реєстрація') }}
        </button>
    </form>
    <a href="{{ url('social-auth', 'facebook') }}" title="Facebook">
        Facebook
    </a>
    <a href="{{ url('social-auth', 'google') }}" title="Google">
        Google
    </a>
@endsection
