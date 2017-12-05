@extends('layouts.app')
@section('title', 'Timetable Settings')
@section('content')
<div class="content-wrapper">
     <section class="content-header">
        <h1>
            Timetable
            <small>Settings</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Subject Registration</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }}" id="alert-message">
                <h4>
                  {!! Session::get('message') !!}
                </h4>
            </div>
        @endif
        <div class="row no-print">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="callout callout-warning">
                    <i  style="color: red;" class="fa fa-exclamation-circle">&emsp;<b><i> Warning</i></b></i>
                    <br><br>
                    <ul>
                        <li>
                            <b style="color: maroon;">&emsp;Any changes to the current settings would invalidate the current timetable.</b>
                        </li>
                        <li>
                            <b style="color: maroon;">&emsp;Generating new timetable would delete the existing timetable and generate the new one.</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Main row -->
        <div class="row  no-print">
            <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="float: left;">Session Settings</h3>
                            <p>&emsp;&emsp;<b style="color: maroon;"><i class="fa fa-exclamation-triangle"></i> Proceed with caution.</b></p>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('timetable-settings-action')}}" method="post" class="form-horizontal">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label"><b style="color: red;">* </b> Working Days In A Week : </label>
                                        <div class="col-sm-9 {{ !empty($errors->first('no_of_days')) ? 'has-error' : '' }}">
                                            <select class="form-control select_2" name="no_of_days" id="no_of_days" tabindex="1" style="width: 100%">
                                                <option value="" {{ (empty(old('no_of_days')) || empty($noOfDays)) ? 'selected' : '' }}>Select working days in a week</option>
                                                <option value="5" {{ (old('no_of_days')==1 || $noOfDays == 5) ? 'selected' : '' }}>Monday to Friday - 5 Days</option>
                                                <option value="6" {{ (old('no_of_days')==2 || $noOfDays == 6) ? 'selected' : '' }}>Monday to Saturday - 6 days</option>
                                            </select>
                                            @if(!empty($errors->first('name')))
                                                <p style="color: red;" >{{$errors->first('name')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"><b style="color: red;">* </b>No Of Sessions In A Day : </label>
                                        <div class="col-sm-9 {{ !empty($errors->first('no_of_session')) ? 'has-error' : '' }}">
                                            <select class="form-control select_2" name="no_of_session" id="no_of_session" tabindex="2" style="width: 100%">
                                                <option value="" {{ (empty(old('no_of_session')) || empty($noOfSession)) ? 'selected' : '' }}>Select no of sessions in a day</option>
                                                <option value="5" {{ (old('no_of_session')==5 || $noOfSession == 5) ? 'selected' : '' }}>5 Sessions</option>
                                                <option value="6" {{ (old('no_of_session')==6 || $noOfSession == 6) ? 'selected' : '' }}>6 Sessions</option>
                                                <option value="7" {{ (old('no_of_session')==7 || $noOfSession == 7) ? 'selected' : '' }}>7 Sessions</option>
                                                <option value="8" {{ (old('no_of_session')==8 || $noOfSession == 8) ? 'selected' : '' }}>8 Sessions</option>
                                                <option value="9" {{ (old('no_of_session')==9 || $noOfSession == 9) ? 'selected' : '' }}>9 Sessions</option>
                                            </select>
                                            @if(!empty($errors->first('no_of_session')))
                                                <p style="color: red;" >{{$errors->first('no_of_session')}}</p>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-sm-3 control-label"><b style="color: red;">* </b>No Of Intervals In A Day : </label>
                                        <div class="col-sm-9 {{ !empty($errors->first('no_of_intervals_per_day')) ? 'has-error' : '' }}">
                                            <select class="form-control select_2" name="no_of_intervals_per_day" id="no_of_intervals_per_day" tabindex="2" style="width: 100%">
                                                <option value="" {{ (empty(old('no_of_intervals_per_day')) || empty($noOfInterval)) ? 'selected' : '' }}>Select no of sessions in a day</option>
                                                <option value="2" {{ (old('no_of_intervals_per_day')==2 || $noOfInterval == 2) ? 'selected' : '' }}>2 Intervals</option>
                                                <option value="3" {{ (old('no_of_intervals_per_day')==3 || $noOfInterval == 3) ? 'selected' : '' }}>3 Intervals</option>
                                                <option value="4" {{ (old('no_of_intervals_per_day')==4 || $noOfInterval == 4) ? 'selected' : '' }}>4 Intervals</option>
                                            </select>
                                            @if(!empty($errors->first('no_of_intervals_per_day')))
                                                <p style="color: red;" >{{$errors->first('no_of_intervals_per_day')}}</p>
                                            @endif
                                        </div>
                                    </div> --}}<br>
                                </div>
                            </div>
                            <div class="clearfix"> </div><br>
                            <div class="row">
                                <div class="col-xs-3"></div>
                                <div class="col-xs-3">
                                    <button type="reset" class="btn btn-default btn-block btn-flat" tabindex="6">Clear</button>
                                </div>
                                <div class="col-xs-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat" tabindex="5">Submit</button>
                                </div>
                                <!-- /.col -->
                            </div><br>
                        </div>
                    </form>
                </div>
                <!-- /.box primary -->
            </div>
            </div>
        </div>
        <!-- /.row (main row) -->
        <!-- Main row -->
        <div class="row  no-print">
            <div class="col-md-12">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- form start -->
                    <form action="{{route('timetable-time-settings-action')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title" style="float: left;">Session Time Settings</h3>
                                    <p>&emsp;<b style="color: blue;">(All fields are mandatory.)</b></p>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="clearfix"></div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;"><p class="text-center">Session Index</p></th>
                                                    <th style="width: 40%;"><p class="text-center">From</p></th>
                                                    <th style="width: 40%;"><p class="text-center">To</p></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($noOfSession))
                                                @for($i=1; $i <= $noOfSession; $i++)
                                                    <tr>
                                                        <td class="text-center">
                                                            <b>{{ $i }}</b>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-12 {{ !empty($errors->first('from_time')) ? 'has-error' : '' }}">
                                                                <div class="bootstrap-timepicker">
                                                                    <input type="text" class="form-control text-center timepicker" name="from_time[{{ $i }}]" id="from_time_{{ $i }}" placeholder="Time" value="{{ old('from_time') }}">
                                                                </div>
                                                                @if(!empty($errors->first('from_time')))
                                                                    <p style="color: red;" >{{$errors->first('from_time')}}</p>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-12 {{ !empty($errors->first('to_time')) ? 'has-error' : '' }}">
                                                                <div class="bootstrap-timepicker">
                                                                    <input type="text" class="form-control text-center timepicker" name="to_time[{{ $i }}]" id="to_time_{{ $i }}" placeholder="Time" value="{{ old('to_time') }}">
                                                                </div>
                                                                @if(!empty($errors->first('to_time')))
                                                                    <p style="color: red;" >{{$errors->first('to_time')}}</p>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="clearfix"> </div><br>
                                <div class="row">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-3">
                                        <button type="reset" class="btn btn-default btn-block btn-flat" tabindex="6">Clear</button>
                                    </div>
                                    <div class="col-xs-3">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat" tabindex="5">Submit</button>
                                    </div>
                                    <!-- /.col -->
                                </div><br>
                            </div>
                            {{-- <div class="box-header with-border">
                                <h3 class="box-title" style="float: left;">Interval Time Settings</h3>
                                    <p>&emsp;<b style="color: blue;">(All fields are mandatory.)</b></p>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="clearfix"></div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;"><p class="text-center">Previous Session Index</p></th>
                                                    <th style="width: 40%;"><p class="text-center">Break From</p></th>
                                                    <th style="width: 40%;"><p class="text-center">Break To</p></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($noOfInterval) && !empty($noOfSession))
                                                @for($i=1; $i <= $noOfInterval; $i++)
                                                    <tr>
                                                        <td class="text-center">
                                                            <select class="form-control select_2" name="prev_session_index[{{ $i }}]" id="prev_session_index_{{ $i }}" tabindex="2" style="width: 100%">
                                                                <option value="" {{ empty($prevSessionIndex[$i]) ? 'selected' : '' }}>Select previous session index to the interval</option>
                                                                @for($j=1; $j < $noOfSession; $j++)
                                                                    <option value="{{ $j }}" {{ !empty($prevSessionIndex) && $prevSessionIndex == $j ? 'selected' : '' }}>Interval after session : {{ $j }}</option>
                                                                @endfor
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-12 {{ !empty($errors->first('interval_from_time')) ? 'has-error' : '' }}">
                                                                <div class="bootstrap-timepicker">
                                                                    <input type="text" class="form-control text-center timepicker" name="interval_from_time[{{ $i }}]" id="interval_from_time_{{ $i }}" placeholder="Time" value="{{ !empty($intervalFromTime) ? $intervalFromTime : "" }}">
                                                                </div>
                                                                @if(!empty($errors->first('from_time')))
                                                                    <p style="color: red;" >{{$errors->first('from_time')}}</p>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-sm-12 {{ !empty($errors->first('interval_to_time')) ? 'has-error' : '' }}">
                                                                <div class="bootstrap-timepicker">
                                                                    <input type="text" class="form-control text-center timepicker" name="interval_to_time[{{ $i }}]" id="interval_to_time_{{ $i }}" placeholder="Time" value="{{ !empty($intervalToTime) ? $intervalToTime : "" }}">
                                                                </div>
                                                                @if(!empty($errors->first('interval_to_time')))
                                                                    <p style="color: red;" >{{$errors->first('interval_to_time')}}</p>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endfor
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="clearfix"> </div><br>
                                <div class="row">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-3">
                                        <button type="reset" class="btn btn-default btn-block btn-flat" tabindex="6">Clear</button>
                                    </div>
                                    <div class="col-xs-3">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat" tabindex="5">Submit</button>
                                    </div>
                                    <!-- /.col -->
                                </div><br>
                            </div> --}}
                        </div>
                        <!-- /.box primary -->
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row (main row) -->
        <!-- Main row -->
        <div class="row  no-print">
            <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="float: left;">Timetable Generation</h3>
                            <p>&emsp;&emsp;<b style="color: maroon;"><i class="fa fa-exclamation-triangle"></i> Proceed with caution.</b></p>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('timetable-generation-action')}}" method="post" class="form-horizontal" id="timetable_generate_form">
                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="row">
                                <div class="clearfix"> </div>
                                <div class="row">
                                <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <p style="color: blue;">&emsp;&emsp;<b>To generete the new timetable a confirmation dialoge would ask you for the captcha, fill them and click generate timetable button.</b></p>
                                    </div>
                                    <br><br>
                                    <div class="col-xs-4"></div>
                                    <div class="col-xs-4">
                                        <button type="button" class="btn btn-primary btn-block btn-flat" id="timetable_generate_btn" tabindex="5" {{ empty($noOfSession) || empty($noOfDays) ? "disabled" : "" }}>Generate Timetable</button>
                                    </div>
                                    <!-- /.col -->
                                </div><br>
                        </div>
                    </form>
                </div>
                <!-- /.box primary -->
            </div>
            </div>
        </div>
        <!-- /.row (main row) -->
        <div class="modal modal-warning" id="confirm_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" style="color: red;">Confirm Settings</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Captcha Message : <p class="pull-right">:</p></label>
                            <div class="col-sm-7">
                                <input type="text" id="captcha_message" name="captcha_message" class="form-control" style="width: 100%; color: red; font-size:25px;" readonly>
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Enter The Message <i style="color: maroon;">(Case sensitive)</i><p class="pull-right">:</p></label>
                            <div class="col-sm-7">
                                <input type="text" id="user_captcha" name="user_captcha" class="form-control" style="width: 100%;">
                            </div>
                        </div><br><br>
                        <div id="modal_warning">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <p style="color: blue;">
                                        <b><i>Please enter the character string as it is shown in the box above.</i></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                        <button type="button" id="btn_modal_submit" class="btn btn-outline">Confirm</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('scripts')
    <script src="/js/results/timetable.js?rndstr={{ rand(1000,9999) }}"></script>
@endsection