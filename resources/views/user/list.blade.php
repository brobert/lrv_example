@extends('layouts._landerv2_blank')

@section('content')
<div class="container-fluid">
<!-- START row -->
    <div class="row">
        <div class="col-md-12">
            <!-- START panel -->
            <div class="panel panel-primary">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-table22"></i></span> Table Showcase</h3>
                    <!-- panel toolbar -->
                    <div class="panel-toolbar text-right">
                        <!-- option -->
                        <div class="option">
                            <button class="btn up" data-toggle="panelcollapse"><i class="arrow"></i></button>
                            <button class="btn" data-toggle="panelremove" data-parent=".col-md-12"><i class="remove"></i></button>
                        </div>
                        <!--/ option -->
                    </div>
                    <!--/ panel toolbar -->
                </div>
                <!--/ panel heading/header -->
                <!-- panel toolbar wrapper -->
                <div class="panel-toolbar-wrapper pl0 pt5 pb5">
                    <div class="panel-toolbar pl10">
                        <div class="checkbox custom-checkbox pull-left">
                            <input type="checkbox" id="customcheckbox-one0" value="1" data-toggle="checkall" data-target="#users_table">
                            <label for="customcheckbox-one0">&nbsp;&nbsp;Select all</label>
                        </div>
                    </div>
                    <div class="panel-toolbar text-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-default"><i class="ico-upload22"></i></button>
                            <button type="button" class="btn btn-sm btn-default"><i class="ico-archive2"></i></button>
                        </div>

                        <button type="button" class="btn btn-sm btn-danger"><i class="ico-remove3"></i></button>
                    </div>
                </div>
                <!--/ panel toolbar wrapper -->

                <!-- panel body with collapse capabale -->
                <div class="table-responsive panel-collapse pull out">
                    <table class="table table-bordered table-hover" id="users_table">
                        <thead>
                            <tr>
                                <th width="3%" class="text-center"></th>
                                <th width="5%">Płeć</th>
                                <th class="sorting">
                                    <a href="{{ route('users', ['sort' => 'surName', 'dir' => $sort['surName']]) }}">
                                        Nazwisko
                                    </a>
                                </th>

                                <th>
                                    <a href="{{ route('users', ['sort' => 'name', 'dir' => $sort['name']]) }}">
                                        Imię
                                    </a>
                                </th>

                                <th>
                                    <a href="{{ route('users', ['sort' => 'email', 'dir' => $sort['email']]) }}">
                                        E-mail
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th><input type="search" class="form-control" name="search_engine" placeholder="Płeć"></th>
                                <th><input type="search" class="form-control" name="search_engine" placeholder="Nazwisko"></th>
                                <th><input type="search" class="form-control" name="search_engine" placeholder="Imię"></th>
                                <th><input type="search" class="form-control" name="search_engine" placeholder="E-mail"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="checkbox custom-checkbox nm">
                                        <input type="checkbox" id="user_{{ $user->id}}" value="1" data-toggle="selectrow" data-target="tr" data-contextual="success" >
                                        <label for="user_{{ $user->id}}"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="media-object">
                                        <img src="../image/avatar/{{$user->gender}}.jpg" alt="" class="img-circle">
                                    </div>
                                </td>

                                <td>{{ $user->surName}}</td>
                                <td>{{ $user->name}}</td>

                                <td>{{ $user->email}}</td>
                                <td class="text-center">
                                    <!-- button toolbar -->
                                    <div class="toolbar">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-default">Action</button>
                                            <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="javascript:void(0);"><i class="icon ico-pencil"></i>Update</a></li>
                                                <li><a href="javascript:void(0);"><i class="icon ico-print3"></i>Print</a></li>
                                                <li class="divider"></li>
                                                <li><a href="javascript:void(0);" class="text-danger"><i class="icon ico-remove3"></i>Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/ button toolbar -->
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!--/ panel body with collapse capabale -->
            </div>
        </div>
    </div>
    <!--/ END row -->


</div>
@endsection
