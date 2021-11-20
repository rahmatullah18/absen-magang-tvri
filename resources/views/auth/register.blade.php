@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" >

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('asal_kampus') ? ' has-error' : '' }}">
                            <label for="asal_kampus" class="col-md-4 control-label">Asal Kampus</label>
                            <div class="col-md-6">
                                <input id="asal_kampus" type="text" class="form-control" name="asal_kampus" >
                                @if ($errors->has('asal_kampus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asal_kampus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('divisi') ? ' has-error' : '' }}">
                            <label for="divisi" class="col-md-4 control-label">Divisi</label>

                            <div class="col-md-6">
                                <select name="divisi" id="divisi" class="form-control">
                                    <option value="Program">Program</option>
                                    <option value="Teknik">Teknik</option>
                                    <option value="Berita">Berita</option>
                                </select>
                                @if ($errors->has('divisi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('divisi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if (isset(Auth::user()->id))
                            <div class="form-group {{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Level</label>
                                <div class="col-md-6">
                                    <select name="level" id="level" class="form-control">
                                        <option value="Pelajar">Pelajar</option>
                                        <option value="Pembimbing">Pembimbing</option>
                                    </select>
                                </div>
                                @if ($errors->has('level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        @else
                        <input type="hidden" name="level" value="Pelajar">
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
