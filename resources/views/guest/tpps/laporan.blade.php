@extends('layouts.master')
@section('content')
    <div class="section topmargin-lg footer-stick">
        <div class="container center clearfix">
            <div class="heading-block bottommargin-sm border-bottom-0">
                <span class="before-heading color">Tabel Laporan TPPS</span>
                <h2>Data Laporan TPPS</h2>
                @if(Request::has('id'))
                    @if(Request::get('id') == 2 )
                        <p style="margin-bottom: 0!important;">Unduh format Laporan Kecamatan: <a
                                href="{{asset('template/draf_laporan_tpps_kecamatan.docx')}}"><i>Klik
                                    disini</i></a></p>
                    @elseif(Request::get('id') == 3 )
                        <p style="margin-bottom: 0!important;">Unduh format Laporan Desa/Kelurahan: <a
                                href="{{asset('template/draf_laporan_tpps_desakel.docx')}}"><i>Klik
                                    disini</i></a></p>

                    @endif
                @endif
                <p>Unduh format Berita Acara Rembuk Stunting: <a
                        href="{{asset('template/ba_rembuk_stunting.pdf')}}" target="_blank"><i>Klik
                            disini</i></a>
                </p>
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="posts" style="text-align: left">
                        <thead>
                        <tr>
                            <th>Instansi</th>
                            <th>Nama Laporan</th>
                            <th>Tahun</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            var dt = $('#posts').DataTable({
                processing: true,
                serverSide: true,
                order: [[2, 'desc']],
                ajax: '{{route('laporan.tpps', ['id' => Request::get('id')])}}',
                columns: [
                    {data: 'kecamatan', name: 'kecamatan'},
                    {data: 'nama_laporan', name: 'nama_laporan'},
                    {data: 'tahun', name: 'tahun'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, align: 'center'},
                ],
            });
        });

    </script>
@endpush
