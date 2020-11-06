@extends('system.layouts.app')

@section('title', 'Квесты')

@section('content')
    <section>
        <div class="grid-x grid-padding-x">
            <div class="cell small-12">
                <a class="button" href="{{ route('system.quests.create') }}">Добавить</a>
                <table class="unstriped hover">
                    <thead>
                    <th>#</th>
                    <th>Фото</th>
                    <th>Название</th>
                    <th class=hide-for-small-onlyl">Описание</th>
                    <th></th>
                    </thead>

                    <tbody>
                    @foreach($quests as $quest)
                        <tr>
                            <td>{{ $quest->id }}</td>
                            <td><img src="{{$quest->photo_path }}"></td>
                            <td>{{ $quest->title }}</td>
                            <td class="hide-for-small-only">{{ $quest->description }}</td>
                            <td>
                                {!! Form::open(['route' => ['system.quests.destroy', $quest->id]]) !!}
                                @method('DELETE')
                                <button class="button tiny">Удалить</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

