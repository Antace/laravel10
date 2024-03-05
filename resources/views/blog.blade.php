@extends('layout')
@section('title', 'blog')
@section('content')
    @if (count($blogs) > 0){
        <h2 class="text-center py-2">Blogs</h2>
        <a href="/create" class="btn btn-primary my-1">Add Content</a>

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    {{-- <th scope="col">Content</th> --}}
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        {{-- <td>{{ Str::limit($item->content,10) }}</td> --}}
                        <td>
                            @if ($item->status == true)
                                <a href="{{ route('change', $item->id) }}" class="btn btn-success">เผยแพร่</a>
                            @else
                                <a href="{{ route('change', $item->id) }}" class="btn btn-secondary">ฉบับร่าง</a>
                            @endif
                        </td>
                        <td><a href="{{ route('edit', $item->id) }}" class="btn btn-warning">Edit</a></td>
                        <td><a href="{{ route('delete', $item->id) }}" class="btn btn-danger"
                                onclick="return confirm('คุณต้องการลบบทความหรือไม่ {{ $item->title }} ?')">Delete</a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $blogs->links() }}
        }
    @else{
        <h2 class="text-center py-2">Empty</h2>
    }
    @endif



@endsection
