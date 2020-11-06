@extends('system.layouts.app')

@section('title', 'Брони')

@section('content')
    <section>
        <div class="grid-x grid-padding-x">
            <div class="cell small-12">
                <table class="unstriped hover">
                    <thead>
                    <th>#</th>
                    <th>Квест</th>
                    <th>Дата</th>
                    <th>Данные</th>
                    <th>Статус</th>
                    </thead>

                    <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->quest->title }}</td>
                            <td>{{ $booking->booked_at->format('d.m.Y H:i') }}</td>
                            <td>
                                <ul class="menu vertical">
                                    <li>{{ $booking->name }}</li>
                                    <li>{{ $booking->formatPhone }}</li>
                                    <li>{{ $booking->email }}</li>
                                </ul>
                            </td>
                            <td>
                                <status-component
                                    :statuses='@json($statuses)'
                                    :item="{{ $booking }}"
                                    :key="{{ $booking->id }}"
                                ></status-component>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

