@extends('layouts.app')

@section('content')

    <requests-modify :request-id="{{ json_encode($id) }}" :current-user="{{ $vc_user }}"></requests-modify>

@endsection
