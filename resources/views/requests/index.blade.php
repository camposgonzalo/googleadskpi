@extends('layouts.app')

@section('content')

    <requests-index :current-user="{{ $vc_user }}"></requests-index>

@endsection
