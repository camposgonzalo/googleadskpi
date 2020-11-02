@extends('layouts.app')

@section('content')

    <dashboard-index :current-user="{{ $vc_user }}"></dashboard-index>

@endsection
