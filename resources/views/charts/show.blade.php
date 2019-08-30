@extends('layouts.app')

@section('main-content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Chart' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('charts.chart.destroy', $chart->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('charts.chart.index') }}" class="btn btn-primary" title="Show All Chart">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('charts.chart.create') }}" class="btn btn-success" title="Create New Chart">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('charts.chart.edit', $chart->id ) }}" class="btn btn-primary" title="Edit Chart">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Chart" onclick="return confirm(&quot;Click Ok to delete Chart.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Song</dt>
            <dd>{{ optional($chart->song)->title }}</dd>
            <dt>Type</dt>
            <dd>{{ $chart->type }}</dd>
            <dt>Platform</dt>
            <dd>{{ $chart->platform }}</dd>
            <dt>Link</dt>
            <dd>{{ $chart->link }}</dd>
            <dt>Key</dt>
            <dd>{{ $chart->key }}</dd>
            <dt>Created At</dt>
            <dd>{{ $chart->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $chart->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
