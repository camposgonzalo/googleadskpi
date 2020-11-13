@extends('layouts.app')

@section('content')

    <campaigns-details :campaign-id="{{ json_encode($id) }}" :current-user="{{ $vc_user }}"></campaigns-details>

@endsection
