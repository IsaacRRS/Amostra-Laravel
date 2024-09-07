@extends('telaLayouts')
@section('titulo', 'Home')
@section('conteudo')
    {{auth()->user()->name}}
@endsection