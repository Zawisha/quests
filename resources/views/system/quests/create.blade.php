@extends('system.layouts.app')

@section('title', 'Новый квест')

@section('content')
    <section>
    {!! Form::open(['route' => 'system.quests.store', 'files' => 'true']) !!}
    <div class="grid-x grid-padding-x">
        <div class="cell small-12 medium-8">

            <ul class="tabs" data-tabs id="tabs">
                <li class="tabs-title is-active"><a href="#tab-general" aria-selected="true">Основные данные</a></li>
            </ul>
            <br>
            <div class="tabs-content" data-tabs-content="tabs">
                <div class="tabs-panel is-active" id="tab-general">

                    <label for="title">Название</label>
                    <input
                        name="title"
                        value="{{ $quest->title }}"
                        id="title"
                        type="text"
                        required
                    >
                    <label for="description">Описание</label>
                    <textarea
                        name="description"
                        id="description"
                        type="text"
                        class="form-control"
                        rows="5"
                    >{{ $quest->description }}</textarea>

                    <photo-upload-component
                        @if($quest->exist)
                        :item="{{ $quest }}"
                        @endif
                    ></photo-upload-component>

                </div>
            </div>
        </div>

        <div class="cell small-12 medium-3">
            <div class="grid-x">
                <div class="cell small-12">
                    <button type="submit" class="button">Сохранить</button>
                </div>
            </div>
            <br>
        </div>

    </div>
    {!! Form::close() !!}
    </section>
@endsection

