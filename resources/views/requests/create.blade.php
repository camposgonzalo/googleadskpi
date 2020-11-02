@extends('layouts.app')

@section('content')

    <requests-form :request-level="{{ json_encode($level) }}" :current-user="{{ $vc_user }}"></requests-form>

@endsection
