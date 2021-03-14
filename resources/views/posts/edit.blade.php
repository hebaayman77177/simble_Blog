@extends('layouts.app')

@section('content')
<form method="PATCH" action="{{route('posts.update',[ 'post' => $post['id'] ])}}">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">{{$post["title"]}}</label>
      <input type="text" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">{{$post['description']}}</label>
      <textarea class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
  </form>

@endsection