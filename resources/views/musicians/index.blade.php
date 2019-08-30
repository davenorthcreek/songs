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
                <h4 class="mt-5 mb-5">Musicians</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('musicians.musician.create') }}" class="btn btn-success" title="Create New Musician">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($musicians) == 0)
            <div class="panel-body text-center">
                <h4>No Musicians Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($musicians as $musician)
                        <tr>
                            <td>{{ $musician->name }}</td>
                            <td>{{ $musician->email }}</td>
                            <td>{{ $musician->phone }}</td>

                            <td>

                                <form method="POST" action="{!! route('musicians.musician.destroy', $musician->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('musicians.musician.show', $musician->id ) }}" class="btn btn-info" title="Show Musician">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('musicians.musician.edit', $musician->id ) }}" class="btn btn-primary" title="Edit Musician">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Musician" onclick="return confirm(&quot;Click Ok to delete Musician.&quot;)">
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
            {!! $musicians->render() !!}
        </div>

        @endif

    </div>
@endsection
