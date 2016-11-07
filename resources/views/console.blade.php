@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <ul class="nav nav-pills">
                            <li role="presentation" class="active">
                                <a href="#console" role="tab" data-toggle="tab">Console</a>
                            </li>
                            <li role="presentation">
                                <a href="#documentation" role="tab" data-toggle="tab">Documentation</a>
                            </li>
                        </ul>
                    </div>

                    <div class="panel-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="console">
                                <console></console>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="documentation">
                                <documentation></documentation>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
