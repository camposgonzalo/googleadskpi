@extends('layouts.app')

@section('content')

    <campaigns-details :campaign-id="{{ json_encode($id) }}"></campaigns-details>

@endsection
