@extends('layouts.admin')

@section('content')

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.messages')
            <div class="card">
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
                    <table class="table">
                    	<thead>
                    		<th>#</th>
                    		<th>Title</th>
                    		<th>Body</th>
                    		<th>Created At</th>
                    		<th></th>
                    	</thead>
                    	<tbody>
                    		@foreach($posts as $post)
            					<tr>
            						<th>{{$post->id}}</th>
            						<td>{{$post->title}}</td>
            						<td>{{substr($post->body, 0, 50)}}{{strlen($post->body) > 50 ? '...' : ''}}</td>
            						<td>{{date('M j, Y', strtotime($post->created_at))}}</td>
            						<td>
            							<a href="{{route('admin-blog.blog.show', $post->id)}}" class="btn btn-info btn-sm mx-1">View</a>
            							<a href="{{route('admin-blog.blog.edit', $post->id)}}" class="btn btn-info btn-sm mx-1">Edit</a>
            						</td>
            					</tr>
                    		@endforeach
                    	</tbody>
                    </table>
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