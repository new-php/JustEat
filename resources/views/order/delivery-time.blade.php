@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<order-delivery-time
    :order="{{ json_encode($order) }}">
</order-delivery-time>
@endsection
