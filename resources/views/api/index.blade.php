@extends('layouts.api')

@section('content')
    @foreach($posts as $post)
        <div>
            <div>{{ $post['title'] }}</div>
            <div><a href="{{ route('show', $post->id) }}">Подробнее</a></div>
            <br/>
        </div>
    @endforeach
@endsection

