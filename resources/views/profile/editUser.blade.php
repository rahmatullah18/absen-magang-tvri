@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update User
                </div>

                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/users/{{$user->id}}">
                        {{-- @method('patch') --}}
                        {{ method_field('PUT') }}
                        {{-- {{method('patch')}} --}}
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email">

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asal_kampus" class="col-md-4 col-form-label text-md-right">Asal Kampus/Sekolah</label>

                            <div class="col-md-6">
                                <input id="asal_kampus" type="text" class="form-control @error('asal_kampus') is-invalid @enderror" name="asal_kampus" value="{{ old('asal_kampus', $user->asal_kampus) }}" autocomplete="asal_kampus">

                                {{-- @error('asal_kampus')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asal_kampus" class="col-md-4 col-form-label text-md-right">Divisi</label>
                            <div class="col-md-6">
                                <select class="form-control" name="divisi" id="divisi">
                                    <option value="Program" @if(old('divisi', $user->divisi) === "Program") selected @endif>Program</option>
                                    <option value="Teknik" @if(old('divisi', $user->divisi) === "Teknik") selected @endif>Teknik</option>
                                    <option value="Berita" @if(old('divisi', $user->divisi) === "Berita") selected @endif>Berita</option>
                                </select>
 
                                 {{-- @error('asal_kampus')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror --}}
                             </div>
                        </div>
                        @if (Auth::user()->level === "pembimbing")
                            <div class="form-group row {{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 col-form-label text-md-right">Level</label>
                                <div class="col-md-6">
                                    <select name="level" id="level" class="form-control">
                                        <option value="Pelajar"  @if(old('level', $user->level) === "pelajar") selected @endif>Pelajar</option>
                                        <option value="Pembimbing"  @if(old('level', $user->level) === "pembimbing") selected @endif>Pembimbing</option>
                                    </select>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="level" value="pelajar">
                        @endif
                        

                        <div class="mb-0 form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
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