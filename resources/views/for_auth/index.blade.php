@extends('page')

@section('title', 'AMpool.tech')



@section('content_header')


@stop



@section('content')

    <main_user
            :peoplee='{{json_encode($people)}}'
            :number_page='{{json_encode($number_page)}}'
            :count_pagee='{{json_encode($count_page)}}'

    />




@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('/css/noty.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themes/mint.css') }}">

@stop

@section('js')
    <script src="/js/app.js"></script>
@stop