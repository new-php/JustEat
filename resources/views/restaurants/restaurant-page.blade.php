@extends('layouts.app')

@section('header')
    @include('header')
@endsection

@section('content')
<restaurant-page
    restaurant="{{ $restaurant }}">
</restaurant-page>
@endsection
