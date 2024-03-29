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
                <h4 class="mt-5 mb-5">Services</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('services.service.create') }}" class="btn btn-success" title="Create New Service">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($services) == 0)
            <div class="panel-body text-center">
                <h4>No Services Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Prelude</th>
                            <th>Offertory</th>
                            <th>Special</th>
                            <th>Leader</th>
                            <th>Speaker</th>
                            <th>Theme</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->date }}</td>
                            <td>{{ $service->prelude }}</td>
                            <td>{{ $service->offertory }}</td>
                            <td>{{ $service->special }}</td>
                            <td>{{ $service->leader }}</td>
                            <td>{{ $service->speaker }}</td>
                            <td>{{ $service->theme }}</td>

                            <td>

                                <form method="POST" action="{!! route('services.service.destroy', $service->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('services.service.show', $service->id ) }}" class="btn btn-info" title="Show Service">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('services.service.edit', $service->id ) }}" class="btn btn-primary" title="Edit Service">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Service" onclick="return confirm(&quot;Click Ok to delete Service.&quot;)">
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
            {!! $services->render() !!}
        </div>

        @endif

    </div>
@endsection
