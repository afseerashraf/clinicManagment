@extends('layout.adminLayout')
@section('title')Admin Dashboard @endsection
@section('content')
<div class="continer">
<ul>
        <li>Name: {{ $admin->name }}</li>
        <li>Email: {{ $admin->email }}</li>
        <li>Specialized: {{ $admin->phone }}</li>
    </ul>
    <a href="{{ route('admin.logout', encrypt($admin->id)) }}" class="btn">Logout</a>
</div>   
@endsection
