@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="container-fluid">
        <h1 class="h3 text-gray-800">Dashboard</h1>
    </div>

    @if (Request::route('user'))
        @foreach (SubmitForm::get()->inputs()['edit'] as $key => $value)
            @submit(['value' => $value, 'title' => $key])
            @endsubmit
        @endforeach
    @else
        @foreach (SubmitForm::get()->inputs()['create'] as $key => $value)
            @submit(['value' => $value, 'title' => $key .' user'])
            @endsubmit
        @endforeach
    @endif

@endsection