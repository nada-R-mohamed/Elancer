@extends('layouts.dashboard')

@section('page-title', 'Create Category')

@section('content')


    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        @include('categories._form')

    </form>
@endsection
