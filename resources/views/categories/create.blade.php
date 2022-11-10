@extends('layouts.dashboard')

@section('page-title', 'Create Category')

@section('content')


    <form action="/categories" method="post">
        @csrf

        @include('categories._form')

    </form>
@endsection
