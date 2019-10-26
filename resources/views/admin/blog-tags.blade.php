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
                            Tags
                        </div>
                        <div class="col-md-2">
                            <a href="/admin/blog/create" class="btn btn-info btn-sm float-right m-0 py-1">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-3">
                        <div class="col-md-8 my-5">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Tag</th>
                                    <th>Edit Tag Name</th>
                                    <th>Delete Tag</th>
                                </thead>
                                <tbody>
                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{$tag->name}}</td>
                                            <td>
                                                {!!Form::model($tag, ['route' => ['admin-blog-tags.blog-tags.update', $tag->id], 'method' => 'PUT'])!!}
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            {{Form::text('name', null, array('class' => 'form-control input-sm mb-2'))}} 
                                                            {!!Form::submit('Update', ['class' => 'btn btn-info'])!!}
                                                        </div>
                                                    </div>
                                                {!!FORM::close()!!}
                                            </td>
                                            <td>
                                                {!!Form::open(['route' => ['admin-blog-tags.blog-tags.destroy', $tag->id], 'method' => 'DELETE'])!!}
                                                {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                                                {!!FORM::close()!!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    	<div class="col-md-4 my-5 table-bordered bg-light pt-3">
                    		{!! Form::open(['route' => 'admin-blog-tags.blog-tags.store']) !!}
            					{{Form::label('name', 'Add New Tag:')}}
            					{{Form::text('name', null, array('class' => 'form-control mb-3'))}}

            					{{Form::submit('Add Tag', array('class' => 'btn btn-info btn-sm mb-3'))}}
            				{!! Form::close() !!}
                    	</div>
                    </div>
                </div>
            </div>
        </div>  
    </div>  
</div>  
@endsection