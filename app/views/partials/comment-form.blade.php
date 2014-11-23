<div class="row">
    <div class="col-sm-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" id="comment-form">Add New Comment</h3>
            </div>
            <div class="panel-body">
            {{ Form::open(array('route' => array('blog.post_new_comment', $post->post_slug),
                                'role' => 'form', 'class' => 'form-horizontal')) }}

                <div class="form-group @if($errors->has('content')) has-error @endif">
                    <div class="col-sm-12">
                        {{ Form::textarea('content', null,
                            array('class' => 'form-control', 'placeholder' => 'Your comment',
                                  'rows' => '3'))
                        }}
                    </div>
                    @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-sm-9">
                        {{ Form::submit('New Comment', array('class' => 'btn btn-default')) }}
                    </div>
                </div>

            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
