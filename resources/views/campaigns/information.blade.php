@extends('layouts.app')

@section('content')

    <campaigns-information :campaign-id="{{ json_encode($id) }}" :current-user="{{ $vc_user }}"></campaigns-information>

@endsection
