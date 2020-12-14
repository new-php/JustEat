@extends('layouts.app')

@section('header')
<vue-header>
</vue-header>
@endsection

@section('content')
<user-account tab="{{$tab}}">
</user-account>
@endsection

@section('footer')
<vue-footer>
</vue-footer>
@endsection
