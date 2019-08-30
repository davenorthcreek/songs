@extends('layouts.app')

@section('main-content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($song->title) ? $song->title : 'Songs' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('songs.song.destroy', $song->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{url('/song') }}" class="btn btn-primary" title="Show All Songs">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{url('/song/create')  }}" class="btn btn-success" title="Create New Songs">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ url('/song'.$song->id.'/edit') }}" class="btn btn-primary" title="Edit Songs">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Song" onclick="return confirm(&quot;Click Ok to delete Song?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Title</dt>
            <dd>{{ $song->title }}</dd>
            <dt>Songwriter</dt>
            <dd>{{ $song->songwriter }}</dd>
            <dt>Hymnal Page</dt>
            <dd>{{ $song->hymnal_page }}</dd>
            <dt>Created At</dt>
            <dd>{{ $song->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $song->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
