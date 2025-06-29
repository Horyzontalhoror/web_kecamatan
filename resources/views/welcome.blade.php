@extends('layouts.app')

@section('head')
    @include('partials.head')
@endsection

@section('header')
    @include('partials.navbar')
@endsection

@section('content')
    @include('pages.home')
@endsection

@section('footer')
    @include('partials.footer')
@endsection
