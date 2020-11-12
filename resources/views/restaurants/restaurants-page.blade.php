@extends('layouts.app')
@section('content')
<restaurants-page
    address="{{ $address }}"
    restaurants="{{ $restaurants }}"
    categories="{{ $categories }}"
    >
</restaurants-page>
@endsection
