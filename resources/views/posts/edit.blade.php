@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('posts.update', ['post' => $post['id']]) }}">
        @csrf
        {{ method_field('patch') }}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp"
                value={{ $post['title'] }}>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            {{-- {{dd($post)}} --}}
            <textarea name="description" class="form-control">{{ $post['description'] }}</textarea>
        </div>
        <div class="mb-3">
            <label for="post_creator" class="form-label">Post Creator</label>
            <select class="form-control" name="user_id">
              @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>

@endsection
