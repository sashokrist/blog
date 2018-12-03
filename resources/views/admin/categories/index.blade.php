@extends('layouts.app')

@section('content')
    <table>
        <thead>
        <th>
            Category |
        </th>
        <th>
             Edit |
        </th>
        <th>
            Delete
        </th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-info">
                        <span><i class="fas fa-pencil-alt"></i></span>
                    </a>
                </td>
                <td>
                    <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-danger">
                        <span><i class="fas fa-trash-alt"></i></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection