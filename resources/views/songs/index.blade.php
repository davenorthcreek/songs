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
                <h4 class="mt-5 mb-5">Songs</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ url('/song/create') }}" class="btn btn-success" title="Create New Song">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($songs) == 0)
            <div class="panel-body text-center">
                <h4>No Songs Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Songwriter</th>
                            <th>Hymnal Page</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($songs as $song)
                        <tr>
                            <td>{{ $song->title }}</td>
                            <td>{{ $song->songwriter }}</td>
                            <td>{{ $song->hymnal_page }}</td>

                            <td>

                                <form method="POST" action="{{ url('/song/'.$song->id) }}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ url('song/show/'.$song->id ) }}" class="btn btn-info" title="Show Songs">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ url('/song/'.$song->id.'/edit' ) }}" class="btn btn-primary" title="Edit Songs">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Songs" onclick="return confirm(&quot;Click Ok to delete Songs.&quot;)">
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
            {!! $songs->render() !!}
        </div>

        @endif

    </div>
@endsection
