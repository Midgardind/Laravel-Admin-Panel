@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">Edit Post: {{$post->title}}</div>

    <div class="card-body p-3">
        {!!Form::model($post, ['route' => ['admin-blog.blog.update', $post->id], 'method' => 'PUT'])!!}
            <div class="row">
                <div class="col-md-8 p-2">
                    {{Form::label('title', 'Title:')}}
                    {{Form::text('title', null, ["class" => 'form-control form-control-lg mb-4'])}}
                    {{Form::label('slug', 'Slug:')}}
                    {{Form::text('slug', null, ["class" => 'form-control mb-4'])}}
                    {{Form::label('category_id', 'Category:')}} <a href="/admin/blog-categories " class="ml-4">Add/Delete Category</a>
                    {{Form::select('category_id', $categories, null, ['class' => 'form-control mb-4'])}}
                    {{Form::label('tags', 'Tags:')}} <a href="/admin/blog-tags " class="ml-4">Add/Delete Tags</a><br>
                    {{Form::select('tags[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple'])}}
                    {{Form::label('body', 'Content:', ['class' => 'mt-4'])}}
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
                            {{Form::submit('Update Post', array('class' => 'btn btn-success btn-block'))}}
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

@endsection