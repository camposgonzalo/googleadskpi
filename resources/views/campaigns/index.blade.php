@extends('layouts.app')

@section('content')

    <campaigns-index :current-user="{{ $vc_user }}"></campaigns-index>

@endsection
