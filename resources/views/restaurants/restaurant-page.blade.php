@extends('layouts.app')

@section('header')
<vue-header
login_form=false>
</vue-header>
@endsection

@section('content')
<restaurant-page
    restaurant="{{ $restaurant }}">
</restaurant-page>
@endsection

@section('footer')
    @include('footer')
@endsection
