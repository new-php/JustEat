@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<menu-restaurant-page
    restaurant="{{ $restaurant }}"
    products="{{ $products }}"
    >
</menu-restaurant-page>
@endsection

@section('footer')
<vue-footer>
</vue-footer>
@endsection