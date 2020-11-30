@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<order-payment
    :order="{{ json_encode($order) }}">
</order-payment>
@endsection
