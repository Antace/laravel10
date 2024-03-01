@extends('layout')
@section('title', 'Add')
@section('content')
   <h2 class="text text-center py-2">Add Blog</h2>
    <form method="POST" action="/insert">
        @csrf
        <div class="form-group">
            <label for="title">Name Blog :</label>
            <input type="text" name="title" class="form-control">
        </div>
        @error('title')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror
        <div class="form-group">
            <label for="content">Contents :</label>
            <textarea name="content" cols="30" rows="5" class="form-control"></textarea>
        </div>
        @error('content')
            <div class="my-2">
                <span class="text-danger">{{$message}}</span>
            </div>
        @enderror
        <br>
        <input type="submit" value="Save" class="btn btn-primary">
        <a href="/blog" class="btn btn-secondary">Back</a>
    </form>



@endsection
