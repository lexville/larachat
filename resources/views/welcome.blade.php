
@extends('layouts.master')

@section('title')
    Larachat
@endsection

@section('content')
    @include('includes.auth')
    @include('includes.dashboard')
@endsection
