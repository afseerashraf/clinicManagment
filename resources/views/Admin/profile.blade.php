@extends('layout.layout')
@section('title')Doctor profile @endsection

@section('content')
<div class="continer">
    <ul>
        <li>Name: {{ $admin->name }}</li>
        <li>Email: {{ $admin->email }}</li>
        <li>Specialized: {{ $admin->phone }}</li>
    </ul>


@endsection