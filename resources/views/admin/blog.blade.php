@extends('layouts.admin')

@section('content')

<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @include('layouts.messages')
            <div class="card bg-light">
                <div class="card-header bg-dark text-light">
                	<div class="row">
                		<div class="col-md-10 text my-auto">
                			Blog Page
                		</div>
                		<div class="col-md-2">
                			<a href="/admin/blog/create" class="btn btn-info btn-sm float-right m-0 py-1">Create New Post</a>
                		</div>
                	</div>
                </div>

                <div class="card-body">
                    <div class="row border-bottom">
                        <div class="col-sm-1 text-center">
                            <p>#</p>
                        </div>
                        <div class="col-sm-2">
                            <p>Title</p>
                        </div>
                        <div class="col-sm-4">
                            <p>Body</p>
                        </div>
                        <div class="col-sm-2 text-center">
                            <p>Created At</p>
                        </div>
                        <div class="col-sm-2 text-center">
                            <p>Featured Image</p>
                        </div>
                        <div class="col-sm-1 text-center">
                            <p></p>
                        </div>
                    </div>
                    @foreach($posts as $post)
                        <div class="row border-bottom pt-1">
                            <div class="col-sm-1 text-center">
                                <p>{{$post->id}}</p>
                            </div>
                            <div class="col-sm-2">
                                <p>{{$post->title}}</p>
                            </div>
                            <div class="col-sm-4">
                                <p>{{substr(strip_tags($post->body), 0, 50)}}{{strlen(strip_tags($post->body)) > 50 ? '...' : ''}}</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p>{{date('M j, Y', strtotime($post->created_at))}}</p>
                            </div>
                            <div class="col-sm-2 text-center">
                                <p>@if($post->image)<img src="{{ asset('images/' . $post->image) }}" alt="" height="auto" width="100%">@endif</p>
                            </div>
                            <div class="col-sm-1 text-center">
                                <a href="{{route('admin-blog.blog.show', $post->id)}}" class="btn btn-info btn-sm m-1">View</a>
                                <a href="{{route('admin-blog.blog.edit', $post->id)}}" class="btn btn-info btn-sm m-1">Edit</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="row mx-auto">
                        <div class="col-md-12 mx-auto">
                            {!!$posts->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection