@extends('layouts.admin')

@section('content')

<div class="container-fluid my-4">
  <div class="row justify-content-center">
    <div class="col-md-11">
        @include('layouts.messages')
        <div class="card bg-light">
            <div class="card-header bg-dark text-light">Edit Post: {{$post->title}}</div>

            <div class="card-body p-3">
                {!!Form::model($post, ['route' => ['admin-blog.blog.update', $post->id], 'method' => 'PUT', 'files' => true])!!}
                    <div class="row">
                        <div class="col-md-8 p-2 px-4">
                            {{Form::label('title', 'Title:')}}
                            {{Form::text('title', null, ["class" => 'form-control form-control-lg mb-4'])}}
                            {{Form::label('slug', 'Slug:')}}
                            {{Form::text('slug', null, ["class" => 'form-control mb-4'])}}
                            {{Form::label('category_id', 'Category:')}} 
                            <button type="button" class="btn btn-link btn-sm ml-4" data-toggle="modal" data-target="#catModal">
                              Add/Delete Category
                            </button>
                            {{Form::select('category_id', $cats, null, ['class' => 'form-control mb-4'])}}
                            {{Form::label('tags', 'Tags:')}} 
                            <button type="button" class="btn btn-link btn-sm ml-4" data-toggle="modal" data-target="#tagModal">
                                Add/Delete Tags
                            </button><br>
                            {{Form::select('tags[]', $tags2, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple'])}}
                            <div class="mt-3">
                                @if($post->image)<img src="{{ asset('images/' . $post->image) }}" alt="" height="auto" width="100px" class="mb-1"><br>@endif
                                {{Form::label('featured_image', 'Update Featured Image:')}}
                                {{Form::file('featured_image', null, array('class' => 'form-control mb-3'))}}
                            </div>
                            {{Form::label('body', 'Content:', ['class' => 'mt-2'])}}
                            {{Form::textarea('body', null, ["class" => 'form-control'])}}
                        </div>
                        <div class="col-md-4 card p-4 bg-light">
                            <div class="py-2 my-0">
                                <label class=""><strong>Created At:</strong> {{date('M j,Y h:ia', strtotime($post->created_at))}}</label>
                            </div>
                            <div class="my-0">
                                <label class=""><strong>Last Updated:</strong> {{date('M j,Y h:ia', strtotime($post->updated_at))}}</label>
                            </div>
                                    <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    {{Form::submit('Update Post', array('class' => 'btn btn-info btn-block'))}}
                                </div>
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('admin-blog.blog.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>  
  </div>
</div>  
@include('admin.blog-modals')
@endsection