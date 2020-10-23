@extends('layouts.app')

@section('content')

    <requests-form :request-level="{{ json_encode($level) }}"></requests-form>

@endsection
