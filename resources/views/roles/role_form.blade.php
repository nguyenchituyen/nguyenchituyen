<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Description:</strong>
            {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
        </div>
        <div class="col-md-12 text-left role-create-btn customize-form-btn">
            <button type="submit" class="btn-submit btn btn-primary">Submit</button>
            <a class="btn-back btn btn-default" href="{{ route('role.index') }}"> Back</a>
        </div>
    </div>
</div>