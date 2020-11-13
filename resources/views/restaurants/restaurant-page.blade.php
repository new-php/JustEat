@extends('layouts.app')
@section('content')
<restaurant-page
    restaurant="{{ $restaurant }}"
    product_categories="{{ $product_categories }}"
    >
</restaurant-page>
@endsection
