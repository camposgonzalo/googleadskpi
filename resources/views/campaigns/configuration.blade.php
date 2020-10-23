@extends('layouts.app')

@section('content')

    <campaigns-configuration :campaign-id="{{ json_encode($id) }}"></campaigns-configuration>

@endsection
