@extends('layouts.app')

@section('content')

    <campaigns-form :current-user="{{ $vc_user }}"></campaigns-form>

@endsection
