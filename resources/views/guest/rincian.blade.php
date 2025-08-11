<div class="modal-content">
    <div class="modal-header justify-content-center">
        <h5 class="modal-title" id="exampleModalLabel">KECAMATAN {{$wilayah->NAMA_KEC}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th scope="col">Bulan</th>
                @for($year = 2024; $year<= date('Y');$year++)
                    <th scope="col">{{$year}}</th>
                @endfor
            </tr>
            </thead>
            <tbody>
            @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $key => $bulan)
                <tr>
                    <td scope="row">{{$bulan}}</td>
                    @for($tahun = 2024; $tahun<= date('Y');$tahun++)
                        @if($data->where('tahun', $tahun)->where('bulan', $key+1)->count() >=1)
                            <td>
                                @foreach($data->where('tahun', $tahun)->where('bulan', $key+1) as $value)
                                    {{$value->nilai}}%
                                @endforeach
                            </td>
                        @else
                            <td>-</td>
                        @endif

                    @endfor
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
