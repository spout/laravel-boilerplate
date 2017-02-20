{{--{!! Form::open(['route' => sprintf('%s.bulk', $resourcePrefix)]) !!}--}}
{!! $dataTable->table(['class' => 'table table-bordered table-condensed table-striped']) !!}
{{--<div class="row">--}}
    {{--<div class="col-sm-4">--}}
        {{--<div class="input-group">--}}
            {{--{!! Form::select('action', ['' => '-'] + $bulkActions) !!}--}}
            {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-xs" type="submit">{{ __("Submit") }}</button>--}}
                {{--</span>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--{!! Form::close() !!}--}}

@include('includes.datatables.assets')