@include('includes.tinymce')
@include('includes.elfinder-standalonepopup')

{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.blog.store'] : ['admin.blog.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

{!! Form::openGroup('title', _i('Title')) !!}
{!! Form::text('title') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('slug', _i('Slug')) !!}
{!! Form::text('slug') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('category_id', _i('Category')) !!}
{!! Form::select('category_id', $categoryList) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('excerpt', _i('Excerpt')) !!}
{!! Form::textarea('excerpt', null, ['rows' => 3]) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('image', _i('Featured image')) !!}
<div class="input-group">
    {!! Form::text('image') !!}
    <div class="input-group-addon">
        <a href="#" class="popup_selector" data-inputid="image">{{ _i("Select image") }}</a>
    </div>
</div>
{!! Form::closeGroup() !!}

{!! Form::openGroup('content', _i('Content')) !!}
{!! Form::textarea('content', null, ['class' => 'wysiwyg']) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}