@extends('layouts.app')

@section('header')
<vue-header
login_form=false>
</vue-header>
@endsection

@section('content')
<restaurant-page
    restaurant="{{ $restaurant }}"
    product_categories="{{ $product_categories }}"
    >
</restaurant-page>
@endsection

@section('footer')
<vue-footer>
</vue-footer>
@endsection
