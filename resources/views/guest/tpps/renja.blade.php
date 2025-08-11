@extends('layouts.master')
@section('content')
    <div class="section topmargin-lg footer-stick">
        <div class="container center clearfix">
            <div class="heading-block bottommargin-sm border-bottom-0">
                <span class="before-heading color">Tabel Rencana Kerja</span>
                <h2>Data Rencana Kerja</h2>
                @if(Request::has('id'))
                    @if(Request::get('id') == 2 )
                        <div class="mb-2 mt-0">
                            <p>Unduh format Rencana Kerja Kecamatan: <a
                                    href="{{asset('template/draf_renja_tpps_kecamatan.docx')}}"><i>Klik
                                    disini</i></a>
                            </p>
                        </div>
                    @elseif(Request::get('id') == 3 )
                        <div class="mb-2 mt-0">
                            <p>Unduh format Rencana Kerja Desa/Kelurahan: <a
                                    href="{{asset('template/draf_renja_tpps_desakel.docx')}}"><i>Klik
                                    disini</i></a>
                            </p>
                        </div>
                    @endif
                @endif
            </div>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="posts" style="text-align: left">
                        <thead>
                        <tr>
                            <th>Instansi</th>
                            <th>Rencana Kerja</th>
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
                ajax: '{{route('renja.tpps', ['id' => Request::get('id')])}}',
                columns: [
                    {data: 'kecamatan', name: 'kecamatan'},
                    {data: 'renja', name: 'renja'},
                    {data: 'tahun', name: 'tahun'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, align: 'center'},
                ],
            });
        });

    </script>
@endpush
