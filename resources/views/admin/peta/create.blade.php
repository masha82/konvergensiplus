@extends('layouts.admin')
@section('header')
    <h4 class="m-0">Buat Peta atau Capaian</h4>
@endsection
@section('content')
    <div class="container clearfix">
        <div class="form-widget">
            <div class="form-result"></div>
            <div class="row">
                <div class="col-lg-10">
                    <form class="row" action="{{route('peta.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_periode" id="id_periode" value="{{$periode->id_periode}}"
                               class="form-control">
                        <div class="form-process">
                            <div class="css3-spinner">
                                <div class="css3-spinner-scaler"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Periode:</label>
                                <input type="text" name="month"
                                       value="{{\Carbon\Carbon::create()->month($periode->bulan)->translatedFormat('F')}}"
                                       class="form-control" readonly disabled>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Tahun:</label>
                                <input type="text" name="year"
                                       value="{{$periode->tahun}}"
                                       class="form-control" readonly disabled>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label>Pilih Kecamatan:</label>
                            <select name="id_kec" id="id_kec" class="form-control">
                                <option value="">-- pilih kecamatan --</option>
                                @foreach($wilayah as $kecamatan)
                                    <option value="{{$kecamatan->ID_KEC}}">{{$kecamatan->NAMA_KEC}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 form-group">
                            <label>Nilai:</label>
                            <input type="number" name="nilai" id="freelance-quote-name" step="any"
                                   class="form-control" required>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-secondary">Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
@push('js')
    <script>
        jQuery(document).ready(function () {
            tinymce.init({
                selector: '#content-editor',
                menubar: false,
                setup: function (editor) {
                    editor.on('change', function (e) {
                        editor.save();
                    });
                }
            });

            $("#image").fileinput({
                browseClass: "btn btn-secondary",
                browseIcon: "",
                removeClass: "btn btn-danger removefile",
                removeLabel: "",
                removeIcon: "<i class='icon-trash-alt1'></i>",
                showUpload: false
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

        })
    </script>
@endpush
