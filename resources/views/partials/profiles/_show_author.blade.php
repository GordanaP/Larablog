@extends('layouts.app')

@section('title', $profile->full_name)

@section('content')

    <h3 class="mb-3">{{ $profile->full_name }}</h3>

@endsection