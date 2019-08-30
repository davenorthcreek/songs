@extends('layouts.app')

@section('main-content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Service' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('services.service.destroy', $service->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('services.service.index') }}" class="btn btn-primary" title="Show All Service">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('services.service.create') }}" class="btn btn-success" title="Create New Service">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('services.service.edit', $service->id ) }}" class="btn btn-primary" title="Edit Service">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Service" onclick="return confirm(&quot;Click Ok to delete Service.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Date</dt>
            <dd>{{ $service->date }}</dd>
            <dt>Prelude</dt>
            <dd>{{ $service->prelude }}</dd>
            <dt>Offertory</dt>
            <dd>{{ $service->offertory }}</dd>
            <dt>Special</dt>
            <dd>{{ $service->special }}</dd>
            <dt>Leader</dt>
            <dd>{{ $service->leader }}</dd>
            <dt>Speaker</dt>
            <dd>{{ $service->speaker }}</dd>
            <dt>Theme</dt>
            <dd>{{ $service->theme }}</dd>
            <dt>Created At</dt>
            <dd>{{ $service->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $service->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
