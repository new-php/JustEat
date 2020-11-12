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
<vue-footer>
</vue-footer>
@endsection
