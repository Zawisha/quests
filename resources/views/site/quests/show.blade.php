@extends('site.layouts.app')

@section('title', $quest->title)

@section('content')
    <main>
        <section class="section-quest">
            <div class="grid-x grid-padding-x">
                <div class="cell small-12 text-center">
                    <h2>{{ $quest->title }}</h2>
                </div>

                <div class="cell small-12 medium-4 text-center">
                    <img src="{{ $quest->photo_path }}">
                </div>

                <div class="cell small-12 medium-8">
                    <p>{{ $quest->description }}</p>
                </div>

                <hr>
            </div>
        </section>

        <section
            class="section-booking"
        >
            <div class="grid-x">
                <div class="cell small-12 text-center">
                    <p>Выберите и забронируйте свободное время, кликнув по нему</p>
                </div>
            </div>

            {!! Form::open(['route' => 'site.bookings.store']) !!}

            <booking-component
                :quest='@json($quest)'
            ></booking-component>

            <fieldset class="fieldset">
                <legend class="text-center">Укажите ваши данные</legend>

                <div class="grid-x grid-padding-x">

                    <div class="cell small-12">

                        <input
                            type="hidden"
                            name="quest_id"
                            value="{{ $quest->id }}"
                        >

                        <div class="grid-x grid-padding-x align-center">
                            <div class="cell small-12 medium-4">
                                <label>
                                    <input
                                        type="text"
                                        name="name"
                                        autocomplete="off"
                                        placeholder="Имя и фамилия"
                                        required
                                    >
                                </label>
                            </div>
                            <div class="cell small-12 medium-4">
                                <label>
                                    <phone-component></phone-component>
                                </label>
                            </div>
                            <div class="cell small-12 medium-4">
                                <label>
                                    <input
                                        type="email"
                                        name="email"
                                        autocomplete="off"
                                        placeholder="E-mail"
                                        pattern="^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$"
                                    >
                                </label>
                            </div>

                        </div>
                        <div class="grid-x grid-padding-x align-center">
                            <div class="cell small-12 medium-8 text-center">
                                <p>Нажимая на кнопку Забронировать, я принимаю правила и условия обслуживания, политики
                                    конфиденциальности и даю согласие на обработку персональных данных.</p>
                            </div>
                            <div class="cell small-12 text-center">
                                <button class="button" type="submit" value="Submit">Забронировать</button>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </section>
    </main>
@endsection
