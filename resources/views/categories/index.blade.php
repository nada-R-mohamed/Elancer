@extends('layouts.dashboard')

@section('page-title')
    Categories <small><a href="{{ route('categories.create') }}" class="btn btn-sm btn-outline-primary">Create</a></small>
@endsection

@section('content')

    {{-- @if ($flashMessage)
        <div class="alert alert-success">

            {{ $flashMessage }}

        </div>
    @endif --}}

<x-flash-message/>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Parent ID</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('categories.show',$category->id )}}">{{ $category->name }}</a></td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td><a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-dark">Edit</a></td>
                    <td>
                        <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    </div>
@endsection
