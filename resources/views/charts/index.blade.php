@extends('layouts.app')

@section('main-content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Charts</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('charts.chart.create') }}" class="btn btn-success" title="Create New Chart">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($charts) == 0)
            <div class="panel-body text-center">
                <h4>No Charts Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Song</th>
                            <th>Type</th>
                            <th>Platform</th>
                            <th>Link</th>
                            <th>Key</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($charts as $chart)
                        <tr>
                            <td>{{ optional($chart->song)->title }}</td>
                            <td>{{ $chart->type }}</td>
                            <td>{{ $chart->platform }}</td>
                            <td>{{ $chart->link }}</td>
                            <td>{{ $chart->key }}</td>

                            <td>

                                <form method="POST" action="{!! route('charts.chart.destroy', $chart->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('charts.chart.show', $chart->id ) }}" class="btn btn-info" title="Show Chart">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('charts.chart.edit', $chart->id ) }}" class="btn btn-primary" title="Edit Chart">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Chart" onclick="return confirm(&quot;Click Ok to delete Chart.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $charts->render() !!}
        </div>

        @endif

    </div>
@endsection
