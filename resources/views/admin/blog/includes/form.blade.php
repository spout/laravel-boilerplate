@include('includes.tinymce')
@include('includes.elfinder-standalonepopup')

{!! Form::model($object, [
    'route' => empty($object->id) ? ['admin.blog.store'] : ['admin.blog.update', $object->id],
    'method' => empty($object->id) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('title', __('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('slug', __('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('category_id', __('Category')) !!}
{!! Form::select('category_id', $categoryList, null, ['placeholder' => '-']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('excerpt', __('Excerpt')) !!}
{!! Form::textarea('excerpt', null, ['rows' => 3]) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('image', __('Featured image')) !!}
<div class="input-group">
    {!! Form::text('image') !!}
    <div class="input-group-addon">
        <a href="#" class="popup_selector" data-inputid="image">{{ __("Select image") }}</a>
    </div>
</div>
{!! Form::closeGroup() !!}


{!! Form::openGroup('content', __('Content')) !!}
{!! Form::textarea('content', null, ['class' => 'wysiwyg']) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}