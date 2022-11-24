@extends('layouts.dashboard')

@section('content')

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Parent ID</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</a></td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->parent_id }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
        </tr>

</tbody>
</table>

@endsection
