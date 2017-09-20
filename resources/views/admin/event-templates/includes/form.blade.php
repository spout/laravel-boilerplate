{!! Form::model($object, [
    'route' => empty($object->pk) ? ['admin.event-templates.store'] : ['admin.event-templates.update', $object->pk],
    'method' => empty($object->pk) ? 'POST' : 'PUT',
    'data-event-type' => $object->event_type,
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
        @if ($object->event_type === 'household')
            {!! Form::hidden('time_end', null, ['id' => 'time_end']) !!}
            <p class="help-text">{{ _i("The time end is calculated from time start with added property household hours.") }}</p>
        @else
            {!! Form::time('time_end') !!}
        @endif
        {!! Form::closeGroup() !!}
    </div>
</div>

@if ($object->event_type === 'departure')
    <?php
    $timeModifyList = ['' => _i("Same day")];
    foreach (range(1, 10) as $i) {
        $timeModifyList["+{$i} day"] = _n("+%d day", "+%d days", $i, $i);
    }
    ?>
    {!! Form::openGroup('time_modify', _i('Modify the date from the day of departure')) !!}
    {!! Form::select('time_modify', $timeModifyList) !!}
    {!! Form::closeGroup() !!}
@endif

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

          $('form[data-event-type="household"] #time_start').on('change', function () {
            $('#time_end').val($(this).val());
          });
        });
    </script>
@endpush