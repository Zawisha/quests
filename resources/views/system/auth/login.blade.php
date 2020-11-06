@extends('system.layouts.app')

@section('content')

    <section>
        <div class="grid-x grid-padding-x align-center">
            <div class="cell small-12 medium-4 text-center">
                {!! Form::open(['route' => 'login']) !!}

                <label class="text-left">{{ __('Логин') }}
                    <input
                        type="text"
                        @error('login') class="is-invalid" @enderror
                        name="login"
                        value="{{ old('login') }}"
                        required
                        autocomplete="off"
                        autofocus
                    >
                    @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>

                <label class="text-left">{{ __('Пароль') }}

                    <input
                        type="password"
                        @error('password') class="is-invalid" @enderror
                        name="password"
                        required
                        autocomplete="off"
                    >

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </label>

                <button
                    type="submit"
                    class="button"
                >Войти
                </button>

                {!! Form::close() !!}
            </div>
        </div>
@endsection
