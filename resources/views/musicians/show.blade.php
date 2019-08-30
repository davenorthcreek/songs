@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($musician->name) ? $musician->name : 'Musician' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('musicians.musician.destroy', $musician->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('musicians.musician.index') }}" class="btn btn-primary" title="Show All Musician">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('musicians.musician.create') }}" class="btn btn-success" title="Create New Musician">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('musicians.musician.edit', $musician->id ) }}" class="btn btn-primary" title="Edit Musician">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Musician" onclick="return confirm(&quot;Click Ok to delete Musician.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $musician->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $musician->email }}</dd>
            <dt>Phone</dt>
            <dd>{{ $musician->phone }}</dd>
            <dt>Created At</dt>
            <dd>{{ $musician->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $musician->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
