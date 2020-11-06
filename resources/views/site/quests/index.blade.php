@extends('site.layouts.app')

@section('title', 'Квесты')

@section('content')
    <main>
        <section class="section-quests">
            <ul class="grid-x small-up-1 medium-up-2 large-up-3 menu align-center">
                @foreach($quests as $quest)
                    <li>
                        <a href="{{ route('site.quests.show', $quest->id) }}">
                            <div>
                                <img src="{{ $quest->photo_path }}">

                                <div class="content">
                                    <h2>{{ $quest->title }}</h2>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
@endsection

