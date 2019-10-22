@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light">Create New Post</div>
                <div class="card-body">
                    <div class="row">
                    	<div class="col-md-8 offset-md-2 my-5">
                    		{!! Form::open(['route' => 'admin-blog.blog.store']) !!}
            					{{Form::label('title', 'Title:')}}
            					{{Form::text('title', null, array('class' => 'form-control mb-3'))}}

                                {{Form::label('slug', 'Slug:')}}
                                {{Form::text('slug', null, array('class' => 'form-control mb-3', 'minlength' => '5', 'maxlength' => '100'))}}

                                {{Form::label('category_id', 'Category:')}} <a href="/admin/blog-categories " class="ml-4">Add/Delete Category</a>
                                <select name="category_id" id="" class="form-control mb-3">
                                    @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                {{Form::label('tags', 'Tags:')}} <a href="/admin/blog-tags " class="ml-4">Add/Delete Tags</a><br>
                                <select name="tags[]" id="" class="select2-multi form-control mb-3" multiple="multiple">
                                    @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>

            					{{Form::label('body', 'Content:')}}
            					{{Form::textarea('body', null, array('class' => 'form-control mb-3'))}}

            					{{Form::submit('Create Post', array('class' => 'btn btn-info btn-lg'))}}
            				{!! Form::close() !!}
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection