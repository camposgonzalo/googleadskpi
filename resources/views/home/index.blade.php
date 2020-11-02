@extends('layouts.app')

@section('content')

    <dashboard-index :current-user="{{ $auth_user }}"></dashboard-index>

@endsection
