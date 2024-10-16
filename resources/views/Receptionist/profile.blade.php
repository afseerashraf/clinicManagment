@extends('layout.layout')
@section('title')Receptionist profile @endsection

@section('content')
<div class="continer">
    <ul>
        <li>Name: {{ $receptionist->name }}</li>
        <li>Email: {{ $receptionist->email }}</li>
        <li>Specialized: {{ $receptionist->phone }}</li>
    </ul>


@endsection