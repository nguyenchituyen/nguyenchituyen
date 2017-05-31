<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::select('name', $roleNameList, isset($roleId) ? $roleId : null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Role Action:</strong><br/> <strong>Ex: User:create:1|User:update:2 </strong>
            {!! Form::text('role_action', null, array('placeholder' => 'User:create:1|User:store:1','class' => 'form-control')) !!}
        </div>
        <div class="col-md-12 text-left customize-form-btn">
            <button type="submit" class="btn-submit btn btn-primary">Submit</button>
            <a class="btn-back btn btn-default" href="{{ route('resource.index') }}"> Back</a>
        </div>
    </div>
</div>