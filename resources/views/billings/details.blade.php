@extends('layouts.app')

@section('content')

    <billings-details :detail-id="{{ json_encode($id) }}"></billings-details>

@endsection
