@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="{{ $info['status'] ? $info['alert'] : "" }}">
                        {{ $info['status']}}
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-responsive">
                        <form action="/absen" method="post" class="form-inline">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="keterangan..." name="note">
                                <small>keterangan di isi jika ada kendala kehadiran / pulang</small>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-flat btn-primary" name="btnIn" {{$info['btnIn']}}>ABSEN MASUK</button>
                                <button type="submit" class="btn btn-flat btn-primary" name="btnOut" {{$info['btnOut']}}>ABSEN PULANG</button>
                            </div>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Riwayat Absensi</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_absen as $absen)
                                    <tr>
                                        <td>{{$absen->date}}</td>
                                        <td>{{$absen->time_in}}</td>
                                        <td>{{$absen->time_out}}</td>
                                        <td>{{$absen->note}}</td>
                                        <td>{{$absen->status}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4"><b><i>TIDAK ADA DATA UNTUK DITAMPILKAN</i></b></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    {{-- {!! $data_absen->links() !!} --}}
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
