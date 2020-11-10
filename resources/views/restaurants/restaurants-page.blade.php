@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<restaurants-page
    address="{{ $address }}">
</restaurants-page>
@endsection

@section('footer')
    @include('footer')
@endsection
