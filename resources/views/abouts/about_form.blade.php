<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Content:</strong>
            {!! Form::textarea('contents', null, array('placeholder' => 'JobName', 'class' => 'form-control', 'id' => 'description')) !!}
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 text-center">
            <button type="submit" class="btn-submit btn btn-primary">Submit</button>
        </div>
    </div>
</div>