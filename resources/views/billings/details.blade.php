@extends('layouts.app')

@section('content')

    <billings-details :current-user="{{ $vc_user }}"></billings-details>

@endsection
