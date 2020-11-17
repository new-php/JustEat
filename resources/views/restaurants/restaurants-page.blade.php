@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<restaurants-page
    :address="{{ json_encode($address) }}"
    :restaurants="{{ json_encode($restaurants) }}"
    :categories="{{ json_encode($categories) }}"
    >
</restaurants-page>
@endsection

@section('footer')
<vue-footer>
</vue-footer>
@endsection
