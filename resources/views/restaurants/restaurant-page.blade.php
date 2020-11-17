@extends('layouts.app')

@section('header')
<vue-header
login_form=false>
</vue-header>
@endsection

@section('content')
<restaurant-page
    :restaurant="{{ json_encode($restaurant) }}"
    :product_categories="{{ json_encode($product_categories) }}"
    >
</restaurant-page>
@endsection

@section('footer')
<vue-footer>
</vue-footer>
@endsection
