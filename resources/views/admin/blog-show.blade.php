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
                  @if($post->image)<img src="{{ asset('images/' . $post->image) }}" alt="" height="auto" width="100%">@endif
              		<h1>{{$post->title}}</h1>
              		<p class="lead pt-2">{!!$post->body!!}</p>
                  <hr>
                  <div class="div">
                    <div class="tags">
                      @foreach($post->tags as $tag)
                        <span class="badge badge-secondary">{{$tag->name}}</span>
                      @endforeach
                    </div>
                    <div id="backend-comments" style="margin-top: 50px;">
                      <h3>Comments <small>{{$post->comments()->count()}} total</small></h3>
                      @foreach($post->comments as $comment)
                        <div class="row border-bottom p-2 mx-0 mb-2 border">
                            <div class="col-sm-5">
                              <strong>Name: </strong>{{$comment->name}}
                            </div>
                            <div class="col-sm-5">
                              <strong>Email: </strong>{{$comment->email}}
                            </div>
                            <div class="col-sm-2 text-center">
                              <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal"><i class="fas fa-pencil-alt"></i></button>
                              <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#commentModal"><i class="fas fa-trash"></i></button>
                            </div>
                            <div class="col-sm-12">
                              <strong>Comment: </strong><br>{{$comment->comment}}
                            </div>
                        </div>  
                      @endforeach  
                    </div>
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
@if(!empty($comment->name))
<!-- Category Modal -->
<div class="modal fade" id="commentModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="modal-title">Are You Sure You Want To Delete This Comment?</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p>
          <strong>Name: </strong>{{$comment->name}} <br>
          <strong>Email: </strong>{{$comment->email}} <br>
          <strong>Comment:<br></strong>{{$comment->comment}}
        </p>
        {!!Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])!!}
        {!!Form::submit('Yes Delete This Comment', ['class' => 'btn btn-danger btn-lg btn-block'])!!}
        {!!FORM::close()!!}
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>

<!-- Category Modal -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h2 class="modal-title">Edit Comment</h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row px-3">
            <div class="col-md-8 offset-md-2 my-2">
                {{Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT'])}}
                {{Form::label('name', 'Name:')}}
                {{Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                {{Form::label('email', 'Email:')}}
                {{Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                {{Form::label('comment', 'Comment:')}}
                {{Form::textarea('comment', null, ['class' => 'form-control'])}}
                {{Form::submit('Update Comment', ['class' => 'btn btn-info mt-3'])}}
                {{Form::close()}}
            </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
      </div>

    </div>
  </div>
</div>
@endif
@endsection