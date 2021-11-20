@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Konfirmasi Absensi</div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Pulang</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Asal Kampus/Sekolah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_absen as $absen)
                                    <tr>
                                        <td>{{$absen->date}}</td>
                                        <td>
                                            <form action="/konfirmasi" method="post">
                                                {{csrf_field()}}
                                                <select name="status" class="form-control" id="">
                                                    <option value="" 
                                                    @if($absen->status == "Belum Dikonfirmasi")
                                                    selected="selected"
                                                    @endif
                                                    >Belum Dikonfirmasi</option>
                                                    <option value="Hadir"
                                                    @if($absen->status == "Hadir")
                                                    selected="selected"
                                                    @endif
                                                    >Hadir</option>
                                                    <option value="Izin"
                                                    @if($absen->status == "Izin")
                                                    selected="selected"
                                                    @endif
                                                    >Izin</option>
                                                    <option value="Sakit"
                                                    @if($absen->status == "Sakit")
                                                    selected="selected"
                                                    @endif>Sakit</option>
                                                    <option value="Terlambat"
                                                    @if($absen->status == "Terlambat")
                                                    selected="selected"
                                                    @endif>Terlambat</option>
                                                </select>
                                                <input type="hidden" name="user_id" value={{$absen->user_id}}>
                                                <button type="submit" name="edit" class="btn btn-sm btn-block btn-primary">Edit</button>
                                            </form>
                                        </td>
                                        <td>{{$absen->time_in}}</td>
                                        <td>{{$absen->time_out}}</td>
                                        <td>{{$absen->user->name}}</td>
                                        <td>{{$absen->note}}</td>
                                        <td>{{$absen->user->asal_kampus}}</td>
                                        
                                        
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