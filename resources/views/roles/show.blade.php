@extends('layouts.admin')

@section('title', 'Show role')

@section('content')
    {{ $role->name }}
@endsection
