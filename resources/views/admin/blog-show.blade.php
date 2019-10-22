@extends('layouts.admin')

@section('content')

<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
          <div class="card-header bg-dark text-light">
            <div class="row">
                <div class="col-md-10 text my-auto">
                  Post: {{$post->title}}
                </div>
                <div class="col-md-2">
                  <a href="/admin/blog" class="btn btn-info btn-sm float-right m-0 py-1">Blog Home</a>
                </div>
            </div>
          </div>
          <div class="card-body p-3">
              <div class="row">
              	<div class="col-md-8 p-2">
              		<h1>{{$post->title}}</h1>
              		<p class="lead pt-2">{{$post->body}}</p>
                  <hr>
                  <div class="div">
                    <h5>
                      @foreach($post->tags as $tag)
                        <span class="badge badge-secondary">{{$tag->name}}</span>
                      @endforeach
                    </h5>
                  </div>
              	</div>
              	<div class="col-md-4 card p-4 bg-light">
                  <div class="py-2 my-0">
                    <label class=""><strong>Url: </strong></label>
                    <a href="{{url('blog/'.$post->slug)}}" class="ml-2">{{url('blog/'.$post->slug)}}</a>
                  </div>
                  <div class="py-2 my-0">
                    <label class=""><strong>Category: </strong> {{$post->category->name}}</label>
                  </div>
              		<div class="py-2 my-0">
              			<label class=""><strong>Created At:</strong> {{date('M j,Y h:ia', strtotime($post->created_at))}}</label>
              		</div>
              		<div class="my-0">
              			<label class=""><strong>Last Updated:</strong> {{date('M j,Y h:ia', strtotime($post->updated_at))}}</label>
              		</div>
             			<hr>
             			<div class="row">
             				<div class="col-sm-6">
             					{!! Html::linkRoute('admin-blog.blog.edit', 'Edit', array($post->id), array('class' => 'btn btn-info btn-block')) !!}
             				</div>
             				<div class="col-sm-6">
                      {!!Form::open(['route' => ['admin-blog.blog.destroy', $post->id], 'method' => 'DELETE'])!!}
                      {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-block'])!!}
                      {!!FORM::close()!!}
             				</div>
             			</div>
              	</div>
              </div>
          </div>
      </div>
    </div>  
  </div>  
</div>  
@endsection