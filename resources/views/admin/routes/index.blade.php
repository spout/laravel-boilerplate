@extends('layouts.admin')

@section('title', _i("Routes"))

@section('content')
    @if (!empty($routes))
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-condensed">
                <thead>
                <tr>
                    {{--<th>{{ _i("Domain") }}</th>--}}
                    <th>{{ _i("Method") }}</th>
                    <th>{{ _i("URI") }}</th>
                    <th>{{ _i("Name") }}</th>
                    <th>{{ _i("Action") }}</th>
                    <th>{{ _i("Middleware") }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($routes as $route)
                    <tr>
                        {{--<td>{{ $route->domain() }}</td>--}}
                        <td>{{ implode('|', $route->methods()) }}</td>
                        <td>{{ $route->uri() }}</td>
                        <td>{{ $route->getName() }}</td>
                        <td>{{ $route->getActionName() }}</td>
                        <td>
                            @foreach($route->middleware() as $middleware)
                                <span class="label label-default">{{ $middleware }}</span>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection