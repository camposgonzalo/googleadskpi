@extends('layouts.app')

@section('content')

    <requests-edit :request-id="{{ json_encode($id) }}"></requests-edit>

@endsection
