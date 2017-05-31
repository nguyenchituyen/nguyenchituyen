<div class="row">
    <div>
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input class='form-control' type="text" name="name" placeholder="Name" value="{!! isset($user->name) ? $user->name : "" !!}">
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div>
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input class='form-control' type="text" name="email" placeholder="Email" value="{!! isset($user->email) ? $user->email : ""!!}">
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-lg-12">
        <div class="form-group">
            <strong>Password:</strong></br>
            <input class='form-control' type="password" name="password" placeholder="Password">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-lg-12">
        <div class="form-group">
            <strong>Password confirm:</strong></br>
            <input class='form-control' type="password" name="password_confirmation" placeholder="Password">
        </div>
        {{ Form::hidden('hdEmail', isset($hdEmail) ? $hdEmail: '') }}
        <div class="col-md-12 text-center">
            <button type="submit" class="btn-submit btn btn-primary">Submit</button>
            <a class="btn-back btn btn-default" href="{{ route('user.index') }}"> Back</a>
        </div>
    </div>
</div>