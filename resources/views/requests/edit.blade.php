@extends('layouts.app')

@section('content')

    <requests-edit :request-id="{{ json_encode($id) }}" :current-user="{{ $vc_user }}"></requests-edit>

@endsection
