@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<order-delivery-address
    :order="{{ json_encode($order) }}">
</order-delivery-address>
@endsection
