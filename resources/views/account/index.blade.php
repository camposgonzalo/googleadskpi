@extends('layouts.app')

@section('content')

    <account-index :current-user="{{ $vc_user }}"></account-index>

@endsection
