@extends('frontend.layout')
@section('title', 'LILAC')
@section('user-list')
    @foreach($users as $user)
        <div class="user-card">
            <div class="user-name mt-1">{{ $user->name }}</div>
            <div class="user-title mt-1">{{ $user->designation->name }}</div>
            <div class="user-department mt-1">{{ $user->department->name }}</div>
        </div>
    @endforeach
@endsection

