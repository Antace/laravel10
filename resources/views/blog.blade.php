@extends('layout')
@section('title', 'blog')
@section('content')
    <h2 class="text-center py-2">Blogs</h2>
    <a href="/create" class="btn btn-primary my-1">Add Content</a>
    
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $item)
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['content'] }}</td>
                    <td>
                    @if ($item['status'] == true)
                        <a href="#" class="btn btn-success">เผยแพร่</a>
                    @else
                        <a href="#" class="btn btn-secondary">ฉบับร่าง</a>
                    @endif
                </td>
                </tr>
            @endforeach

        </tbody>
    </table>




@endsection
