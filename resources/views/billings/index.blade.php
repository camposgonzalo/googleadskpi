@extends('layouts.app')

@section('content')

    <billings-index :current-user="{{ $vc_user }}"></billings-index>

@endsection
