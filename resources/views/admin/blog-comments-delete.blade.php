@extends('layouts.admin')

@section('content')

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-2 card p-5 bg-light mt-4">
            <div class="col-md-12 text my-auto">
                <h1>Are You Sure You Want To Delete This Comment?</h1>
                <p>
                    <strong>Name: </strong>{{$comment->name}} <br>
                    <strong>Email: </strong>{{$comment->email}} <br>
                    <strong>Comment:<br></strong>{{$comment->comment}}
                </p>
                {!!Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE'])!!}
                {!!Form::submit('Yes Delete This Comment', ['class' => 'btn btn-danger btn-lg btn-block'])!!}
                {!!FORM::close()!!}
            </div>
        </div>
    </div>  
</div>  
@endsection