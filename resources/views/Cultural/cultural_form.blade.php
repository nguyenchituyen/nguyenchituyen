<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            <strong>Image File 1: </strong>
            {!! Form::file('image_1', array('id' => 'image_input0'))!!}
            @if(!empty($cultural->image_1))
                <img src="{{ URL::to($cultural->image_1) }}" id='image_show0'>
            @endif
        </div>
        <div class="form-group">
            <strong>Image File 2: </strong>
            {!! Form::file('image_2', array('id' => 'image_input1'))!!}
            @if(!empty($cultural->image_2))
                <img src="{{ URL::to($cultural->image_2) }}" id='image_show1'>
            @endif
        </div>
        <div class="form-group">
            <strong>Image File 3: </strong>
            {!! Form::file('image_3', array('id' => 'image_input2'))!!}
            @if(!empty($cultural->image_3))
                <img src="{{ URL::to($cultural->image_3) }}" id='image_show2'>
            @endif
        </div>
        <div class="form-group">
            <strong>Image File 4: </strong>
            {!! Form::file('image_4', array('id' => 'image_input3'))!!}
            @if(!empty($cultural->image_4))
                <img src="{{ URL::to($cultural->image_4) }}" id='image_show3'>
            @endif
        </div>
        <div class="form-group">
            <strong>Image File 5: </strong>
            {!! Form::file('image_5', array('id' => 'image_input4'))!!}
            @if(!empty($cultural->image_5))
                <img src="{{ URL::to($cultural->image_5) }}" id='image_show4'>
            @endif
        </div>
        <div class="form-group">
            <strong>Image File 6: </strong>
            {!! Form::file('image_6', array('id' => 'image_input5'))!!}
            @if(!empty($cultural->image_6))
                <img src="{{ URL::to($cultural->image_6) }}" id='image_show5'>
            @endif
        </div>
        <div class="form-group">
            <strong>Image File 7: </strong>
            {!! Form::file('image_7', array('id' => 'image_input6'))!!}
            @if(!empty($cultural->image_7))
                <img src="{{ URL::to($cultural->image_7) }}" id='image_show6'>
            @endif
        </div>
        <div class="form-group">
            <strong>Cultural Description:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Cultural Description','class' => 'form-control','style'=>'height:100px', 'id' => 'description')) !!}
        </div>
        <div class="col-md-12 text-center">
            <button class="btn-submit btn btn-primary" type="submit">Submit</button>
            <a class="btn-back btn btn-default" href="{{ route('cultural.index') }}"> Back</a>
        </div>
    </div>
</div>