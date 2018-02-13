@extends('layouts.app')

@section('title', _i("Favorites"))

@section('content')
    @if (!$favorites->isEmpty())
        <?php dump($favorites); ?>
    @else
        @component('components.alert', ['type' => 'danger'])
            {{ _i("No favorites yet!") }}
        @endcomponent
    @endif
@endsection