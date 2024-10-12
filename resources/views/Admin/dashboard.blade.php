@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')
<div class="continer">
<ul>
        <li>Name: {{ $admin->name }}</li>
        <li>Email: {{ $admin->email }}</li>
        <li>Specialized: {{ $admin->phone }}</li>
    </ul>
</div>   
@endsection
