<!-- Category Modal -->
<div class="modal fade" id="catModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Categories</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row border-bottom">
            <div class="col-sm-12 text-center">
                <h5><strong>Edit Current Categories</strong></h5>
            </div>
        </div>
        @foreach($categories as $category)
            <div class="row py-2 border-bottom">                   
                <div class="col-sm-8">
                    {!!Form::model($category, ['route' => ['admin-blog-categories.blog-categories.update', $category->id], 'method' => 'PUT'])!!}
                    {{Form::text('name', null, array('class' => 'form-control input-sm'))}} 
                </div>
                <div class="col-sm-2 text-center">
                    {!!Form::submit('Update', ['class' => 'btn btn-info btn-sm'])!!}
                    {!!FORM::close()!!}
                </div>  
                <div class="col-sm-2 text-center">
                    {!!Form::open(['route' => ['admin-blog-categories.blog-categories.destroy', $category->id], 'method' => 'DELETE'])!!}
                    {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
                    {!!FORM::close()!!}
                </div>
            </div>
            <hr>
        @endforeach
        <div class="col-md-10 my-5 table-bordered bg-light p-3">
            {!! Form::open(['route' => 'admin-blog-categories.blog-categories.store']) !!}
                {{Form::label('name', 'Add New Category:')}}
                <div class="row">  
                    <div class="col-md-9">
                        {{Form::text('name', null, array('class' => 'form-control mb-3'))}}
                    </div>
                    <div class="col-md-3">
                        {{Form::submit('Add Category', array('class' => 'btn btn-info btn-sm mb-2'))}}
                    </div>
                </div>                
            {!! Form::close() !!}
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Tags Modal -->
<div class="modal fade" id="tagModal">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tags</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row border-bottom">
            <div class="col-sm-12 text-center">
                <h5><strong>Edit Current Tags</strong></h5>
            </div>
        </div>
        @foreach($tags as $tag)
            <div class="row py-2 border-bottom">                   
                <div class="col-sm-8">
                    {!!Form::model($tag, ['route' => ['admin-blog-categories.blog-categories.update', $tag->id], 'method' => 'PUT'])!!}
                    {{Form::text('name', null, array('class' => 'form-control input-sm'))}}
                </div>
                <div class="col-sm-2 text-center">
                    {!!Form::submit('Update', ['class' => 'btn btn-info btn-sm'])!!}
                    {!!FORM::close()!!}
                </div>  
                <div class="col-sm-2 text-center">
                    {!!Form::open(['route' => ['admin-blog-categories.blog-categories.destroy', $tag->id], 'method' => 'DELETE'])!!}
                    {!!Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])!!}
                    {!!FORM::close()!!}
                </div>
            </div>
        @endforeach
        <div class="col-md-10 my-5 table-bordered bg-light p-3">
            {!! Form::open(['route' => 'admin-blog-tags.blog-tags.store']) !!}
                {{Form::label('name', 'Add New Tag:')}}
                <div class="row">  
                    <div class="col-md-9">
                        {{Form::text('name', null, array('class' => 'form-control mb-3'))}}
                    </div>
                    <div class="col-md-3">
                        {{Form::submit('Add Tag', array('class' => 'btn btn-info btn-sm mb-3'))}}
                    </div>
                </div>                
            {!! Form::close() !!}
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>