@extends('page')

@section('title', 'AMpool.tech')



@section('content_header')


@stop



@section('content')


    <block_index :peoples='{{json_encode($peoples)}}' :new_boss='{{json_encode($flag)}}'></block_index>







@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{ asset('/css/noty.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/themes/mint.css') }}">

@stop

@section('js')
    <script src="/js/app.js"></script>
@stop