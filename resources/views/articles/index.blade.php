@extends('layouts.master')

@section('content')
<table>
    <thead>
        <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
        <tr>
        <td>{{ $article->id }}</td>
        <td>{{ $article->title }}</td>
        <td>
            <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                <a href="{{ route('articles.show',$article->id) }}">Show</a>
                <a href="{{ route('articles.edit',$article->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
