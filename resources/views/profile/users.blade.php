@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span>Users</span> 
                    <a href="/register" class="pull-right">tambah data +</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Asal Kampus/Sekolah</th>
                                    <th>Divisi</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->asal_kampus}}</td>
                                        <td>{{$user->divisi}}</td>
                                        <td>{{$user->level}}</td>
                                        <td>
                                            <form action="/users/{{$user->id}}" method="post">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <button onclick="return confirm('Apakah anda ingin menghapus data {{$user->name}}?')" type="submit" class="btn btn-danger btn-sm btn-block" name="delete">Delete</button>
                                            </form>
                                            <a class="btn btn-warning btn-sm btn-block" href="/users/{{$user->id}}">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    {{-- <td>Data tidak ditemukan</td> --}}
                                    {{Auth::logout()}}
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endpush