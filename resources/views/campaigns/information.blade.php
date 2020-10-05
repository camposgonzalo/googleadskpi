@extends('layouts.app')

@section('content')

    <campaigns-information :campaign-id="{{ json_encode($id) }}"></campaigns-information>

@endsection
