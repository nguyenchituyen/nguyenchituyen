<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Name Tags:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name Tags','class' => 'form-control', 'id' => 'name')) !!}
            </div>
            <div class="form-group">
                <strong>Alias Tags:</strong>
                {!! Form::text('alias', null, array('placeholder' => 'Alias Tags','class' => 'form-control', 'id' => 'alias')) !!}
            </div>
            <div class="col-md-12 text-left customize-form-btn">
                <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                <a class="btn-back btn btn-default" href="{{ route('job.indexTag') }}"> Back</a>
            </div>
        </div>
    </div>
</div>