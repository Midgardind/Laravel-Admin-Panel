@extends('layouts.admin')

@section('content')

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    <div class="row">
                        <div class="col-md-10 text my-auto">
                            Edit Comment
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/blog/create" class="btn btn-info btn-sm float-right m-0 py-1">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
            </div>
        </div>
    </div>  
</div>  
@endsection