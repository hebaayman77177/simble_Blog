@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    <table class="table  mt-5 container">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">posted by</th>
                <th scope="col">created at</th>
                <th scope="col">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post['id'] }}</th>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
                    <?php $createdAt = new Carbon($post['created_at']) ?>
                    <td>{{$createdAt->toFormattedDateString() }}</td>
                    <td class="col">
                        <a href="{{ route('posts.show', ['post' => $post['id']]) }}" class="btn btn-info">View</a>
                        <a href="{{ route('posts.edit', ['post' => $post['id']]) }}" class="btn btn-primary">Edit</a>
                        <form method="post" action="{{ route('posts.destroy', ['post' => $post['id']]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="delete" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
