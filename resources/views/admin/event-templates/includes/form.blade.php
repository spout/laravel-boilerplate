{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.event-templates.store'] : ['admin.event-templates.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT'
]) !!}

@include('includes.templates-tags-form', ['title' => _i("Available tags for summary and template:")])

{!! Form::openGroup('summary', _i('Summary')) !!}
{!! Form::text('summary') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('template', _i('Template')) !!}
{!! Form::textarea('template') !!}
{!! Form::closeGroup() !!}

<div class="row">
    <div class="col-sm-6">
        {!! Form::openGroup('time_start', _i('Time start')) !!}
        {!! Form::time('time_start') !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-sm-6">
        {!! Form::openGroup('time_end', _i('Time end')) !!}
        {!! Form::time('time_end') !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openGroup('time_modify', _i('Time modify')) !!}
{!! Form::text('time_modify') !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('color', _i('Color')) !!}
{!! Form::select('color', $colorList) !!}
{!! Form::closeGroup() !!}

{!! Form::submit(_i('Save'), ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@push('scripts')
    <script>
        $(function () {
          function formatState (state) {
            if (!state.id) {
              return state.text;
            }
            return $('<span style="background-color:{text}">{text}</span>'.format(state));
          }

          $('#color').select2({
            templateResult: formatState,
            templateSelection: formatState
          });
        });
    </script>
@endpush