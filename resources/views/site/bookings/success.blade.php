@extends('site.layouts.app')

@section('title', 'Успех')

@section('content')
    <main>
        <section>
            <div class="grid-x grid-padding-x">
                <div class="cell small-12">
                    <h2>Ваша заявка на бронирование принята!</h2>
                </div>
                <hr>
                <div class="cell small-12">
                    <table class="unstriped hover">
                        <tbody>
                        <tr>
                            <td>Квест:</td>
                            <td>{{ $booking->quest->title }}</td>
                        </tr>
                        <tr>
                            <td>Дата:</td>
                            <td>{{ $booking->booked_at->format('d.m.Y') }} {{ $booking->booked_at->format('H:i') }}</td>
                        </tr>
                        <tr>
                            <td>Данные:</td>
                            <td>
                                <ul class="menu vertical">
                                    <li>{{ $booking->name }}</li>
                                    <li>{{ $booking->formatPhone }}</li>
                                    @isset($booking->email)
                                        <li>{{ $booking->email }}</li>
                                    @endisset
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cell small-12">
                    <a href="{{ route('site.index') }}" class="button">На главную</a>
                </div>
            </div>
        </section>
    </main>
@endsection
