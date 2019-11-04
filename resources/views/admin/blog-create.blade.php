@extends('layouts.admin')

@section('content')
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-11">
            @include('layouts.messages')
            <div class="card bg-light">
                <div class="card-header bg-dark text-light">Create New Post</div>
                <div class="card-body">
                    <div class="row">
                    	<div class="col-md-8 offset-md-2 my-2">
                    		{!! Form::open(['route' => 'admin-blog.blog.store', 'files' => true]) !!}
            					{{Form::label('title', 'Title:')}}
            					{{Form::text('title', null, array('class' => 'form-control mb-3'))}}

                                {{Form::label('slug', 'Slug:')}}
                                {{Form::text('slug', null, array('class' => 'form-control mb-3', 'minlength' => '5', 'maxlength' => '100'))}}

                                {{Form::label('category_id', 'Category:')}} 
                                <button type="button" class="btn btn-link btn-sm ml-4" data-toggle="modal" data-target="#catModal">
                                  Add/Delete Category
                                </button>
                                
                                <select name="category_id" id="" class="form-control mb-3">
                                    @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                {{Form::label('tags', 'Tags:')}} 
                                <button type="button" class="btn btn-link btn-sm ml-4" data-toggle="modal" data-target="#tagModal">
                                  Add/Delete Tags
                                </button><br>
                                <select name="tags[]" id="" class="select2-multi form-control mb-3" multiple="multiple">
                                    @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                                <div class="my-3">
                                {{Form::label('featured_image', 'Upload Featured Image:')}}
                                {{Form::file('featured_image', null, array('class' => 'form-control mb-3'))}}
                                </div>
            					{{Form::label('body', 'Content:')}}
            					{{Form::textarea('body', null, array('class' => 'form-control mb-3'))}}

            					{{Form::submit('Create Post', array('class' => 'btn btn-info btn-lg mt-2'))}}
            				{!! Form::close() !!}
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>

@include('admin.blog-modals')
@endsection