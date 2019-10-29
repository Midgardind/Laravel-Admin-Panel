@extends('layouts.app')

@section('content')
<div class="portfolio fill">
	<div class="hero2 jumbotron jumbotron-fluid text-center align-middle" style="background-image:url('');">
	  	<div class="herooverlay2">
		    <div class="container text-center hero-text2">
		      	<h1 class="display-3">Blog</h1>
		    </div>
		</div>
	</div>
	<div class="container mb-5 mt-5">
		<div class="row">
    		<!-- Blog Entries Column -->
	      	<div class="col-md-9">
	      		@include('layouts.messages')
				<div class="mb-3">
					<h2 class=""><a href="">{{$post->title}}</a></h2>
					<p class="">{!!$post->body!!}</p>
					<hr>
					<p>Posted In: {{$post->category->name}}</p>
				</div>
				<br>
				<hr>
				<br>
				<div class="row">
					<div class="col-md-12">
						<h3 class="comments-title"><i class="fa fa-comment" aria-hidden="true"></i>{{$post->comments()->count()}} Comments</h3>
						@foreach($post->comments as $comment)
							<div class="comment p-2">
								<div class="author-info">
									<img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=wavatar"}}" alt="" class="author-image">
									<div class="author-name">
										<h4>{{$comment->name}}</h4>
										<p class="author-time">{{date('F nS, Y - g:i a',strtotime($comment->created_at))}}</p>
									</div>
									
								</div>
								<div class="comment-content">
									{{$comment->comment}}
								</div>
							</div>
						@endforeach
					</div>
					<div class="col-md-8 offset-md-2">	
						
						<div class="card p-4 bg-light">
							<h5>Add Comment:</h5>
							{{Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST'])}}
								<div class="row">
									<div class="col-md-12">
										{{form::label('name', 'Name:')}}
										{{Form::text('name', null, ['class' => 'form-control input-sm'])}}
									</div>
									<div class="col-md-12 mt-2">
										{{form::label('email', 'Email:')}}
										{{Form::text('email', null, ['class' => 'form-control input-sm'])}}
									</div>
									<div class="col-md-12 mt-2">
										{{form::label('comment', 'Comment:')}}
										{{Form::textarea('comment', null, ['class' => 'form-control input-sm', "rows" => "3"])}}
										{{Form::submit('Add Comment', ['class' => 'btn btn-success mt-2 btn-sm'])}}
									</div>
								</div>
							{{Form::close()}}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 offset-md-1">
				<h2>Sidebar</h2>
			</div>
		</div>  
    </div>
</div>
@endsection