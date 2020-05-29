@extends('layouts.app')
@section('content')
    <div class="flex flex-wrap justify-center">
@foreach ($items as $item)
    <x-item :item="$item" />
@endforeach
    </div>

@endsection