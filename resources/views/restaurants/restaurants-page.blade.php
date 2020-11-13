@extends('layouts.app')
@section('content')
<restaurants-page
    address="{{ $address }}"
    restaurants="{{ $restaurants }}"
    >
</restaurants-page>
@endsection
