@extends('layouts.app')

@section('content')
<restaurant-page
    :restaurant="{{ json_encode($restaurant) }}"
    >
</restaurant-page>
@endsection

@section('footer')
<vue-footer>
</vue-footer>
@endsection
