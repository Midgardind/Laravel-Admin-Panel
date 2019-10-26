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
                            Categories
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
                                    <th>Category</th>
                                    <th>Edit Category Name</th>
                                    <th>Delete Category</th>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                {!!Form::model($category, ['route' => ['admin-blog-categories.blog-categories.update', $category->id], 'method' => 'PUT'])!!}
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            {{Form::text('name', null, array('class' => 'form-control input-sm mb-2'))}} 
                                                            {!!Form::submit('Update', ['class' => 'btn btn-info'])!!}
                                                        </div>
                                                    </div>
                                                {!!FORM::close()!!}
                                            </td>
                                            <td>
                                                {!!Form::open(['route' => ['admin-blog-categories.blog-categories.destroy', $category->id], 'method' => 'DELETE'])!!}
                                                {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                                                {!!FORM::close()!!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    	<div class="col-md-4 my-5 table-bordered bg-light pt-3">
                    		{!! Form::open(['route' => 'admin-blog-categories.blog-categories.store']) !!}
            					{{Form::label('name', 'Add New Category:')}}
            					{{Form::text('name', null, array('class' => 'form-control mb-3'))}}

            					{{Form::submit('Add Category', array('class' => 'btn btn-info btn-sm'))}}
            				{!! Form::close() !!}
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>  
@endsection