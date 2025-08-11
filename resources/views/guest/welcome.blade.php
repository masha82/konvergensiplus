@extends('layouts.master')
@push('css')
    <style>
        .img-fit {
            display: block;
            max-width: 400px;
            max-height: 200px;
            width: auto;
            height: auto;
            object-fit: cover !important;
        }

        .gm-ui-hover-effect {
            display: none !important;
        }
.modal-header .close {
  display:none;
}
    </style>
@endpush
@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row clearfix">

                    <!-- Posts Area
                    ============================================= -->
                    <div class="col-lg-8">

                        <!-- Tab Menu
                        ============================================= -->
                        <nav class="navbar navbar-expand-lg navbar-light p-0" style="background: #ECA6A6">
                            <h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">Pengertian Stunting</h4>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarToggler1" aria-controls="navbarToggler1"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <i class="icon-line-menu"></i>
                            </button>
                        </nav>

                        <div class="line line-xs line-dark"></div>
                        <div class="col-lg-12 py-12">
                            <div class="heading-block border-bottom-0 bottommargin-sm">
                                <h3 class="fw-bold nott" style="font-size: 42px; letter-spacing: -1px;">Apa itu <span>Stunting</span>
                                    ?</h3>
                            </div>
                            <p class="mb-2">Kondisi dimana seseorang kekurangan gizi kronis (dalam jangka waktu yang
                                lama) Terutama pada Seribu Hari Pertama Kehidupan (1000 HPK) ibu hamil (270 hari) sampai
                                anak usia 2 tahun (730 hari) Sehingga tinggi badannya dibanding usia nya terlihat LEBIH
                                PENDEK dari SEBAYA nya.</p>
                        </div>
                        <!-- Articles
                        ============================================= -->
                        <div class="row align-items-center mt-5">
                            <div class="col-md-12">
                                <div class="heading-block border-bottom-0 bottommargin-sm">
                                    <div class="fancy-title title-border mb-3"><h5
                                            class="fw-normal color font-body text-uppercase ls1">8 Aksi Konvergensi</h5>
                                    </div>
                                    <h2 class="fw-bold nott" style="font-size: 42px; letter-spacing: -1px;">8 Aksi
                                        Konvergensi</h2>
                                </div>
                                <p class="mb-5 lead mb-0" style="line-height: 1.7;">Instrument dalam bentuk kegiatan
                                    Pemerintah Kabupaten/Kota untuk memperbaiki manajemen penyelenggaraan pelayanan
                                    dasar
                                    agar lebih terpadu dan tepat sasaran.</p>
                            </div>
                            <div class="col-md-12 mb-12 mb-md-0">
                                <div class="yoga-video position-relative">
                                    <img src="{{asset('8aksi.png')}}" alt="Yoga Image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top Sidebar Area
                    ============================================= -->
                    <div class="col-lg-4 sticky-sidebar-wrap mt-5 mt-lg-0">
                        <div class="sticky-sidebar">
                            <!-- Sidebar Widget 1
                            ============================================= -->
                            <div class="widget clearfix">
                                <div class="row center clearfix">
                                    <img src="{{asset('mas_rio.png')}}" data-index="0" alt="Alt 1">
                                </div>
                                <h4 class="mt-4 mb-2 ls1 text-uppercase fw-bold" style="background: #C4DFAA">Informasi
                                    Stunting</h4>
                                <div class="line line-xs line-market"></div>

                                <div class="owl-carousel">
                                    @php
                                        $alt = 1;
                                    @endphp
                                    @foreach($sidebar as $bar)
                                        <div class="row center mt-4 clearfix item">
                                            <img src="{{route('sidebar.file',$bar->id)}}" data-index="{{$alt-1}}"
                                                 alt="Alt {{$alt}}">
                                        </div>
                                        @php
                                            $alt++
                                        @endphp
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> <!-- Sidebar End -->
                </div>
            </div> <!-- Container End -->

            <!-- Fullwidth Carousel
            ============================================= -->
            <div class="section bg-transparent m-0">
                <div class="container clearfix">
                    <div class="fancy-title title-border mb-3">
                        <h2 class="fw-bold mb-2 nott" style="font-size: 30px; letter-spacing: -1px">
                            <span>Sebaran</span> dan
                            <span> Capaian</span></h2>
                    </div>

                    <!-- Owl Carousel
                    ============================================= -->
                    <div class="col-lg-12 col-md-12 d-md-block px-0">
                        <div class="col-3 form-group" style="float: right">
                            <label>Lihat sebaran berdasarkan tahun</label>
                            <select class="form-select required valid" name="event-registration-interests" id="maplist">
                                <option value="99">Kondisi terkini</option>
                                @php($periode = '')
                                @foreach($peta as $sebaran)
                                    <option value="{{$sebaran->id}}">{{$sebaran->tahun}}
                                        @if($sebaran->periode == 1)
                                            @php($periode = ' - Periode Pertama')
                                        @elseif($sebaran->periode == 2)
                                            @php($periode = ' - Periode Kedua')
                                        @else
                                            @php($periode = '')
                                        @endif
                                        {{$periode}}</option>
                                @endforeach
                            </select>
                        </div>
                        <img id="map" src="{{route('map.file',$map->id)}}" alt="" style="display: none">
                        <section id="peta-sebaran">
                        <div class="card-body" id="googleMap" style="width:100%;height:600px;"></div>
                        </section>
                    </div>
                </div>
            </div> <!-- Container End -->

            <div class="container clearfix">

                <div class="row clearfix">
                    <!-- Second Posts Area
                    ============================================= -->
                    <div class="col-lg-8">
                        <!-- Gallery Slider
                        ============================================= -->
                        <div class="clearfix">
                            <h4 style="background: #9ADCFF" class="mb-2 ls1 text-uppercase fw-bold">
                                BERITA/INFORMASI</h4>
                            <div class="line line-xs line-market"></div>
                            <!-- Flex Thumbs Slider
                            ============================================= -->
                             <form action="{{route('cari.data')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="cari" class="form-control"
                                                   placeholder="Cari seputar SIBESTI disini...">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <button type="submit" class="button button-rounded button-small m-0">Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row col-mb-50 mb-0">
                                @foreach($posts as $post)
                                    <div class="col-md-6 mt-0">
                                        <!-- Post Article -->
                                        <div class="posts-md">
                                            <div class="entry">
                                                <div class="entry-image">
                                                    <a href="#"><img class="img-fit"
                                                                     src="{{route('posts.file', $post->id)}}"
                                                                     alt="Image 3"></a>
                                                    <div class="entry-categories"><a href="#" class="bg-lifestyle">berita
                                                            - {{$post->opds->singkatan}}</a>
                                                    </div>
                                                </div>
                                                <div class="entry-title title-sm nott">
                                                    <h3 class="mb-0"><a
                                                            href="{{route('berita.show', $post->id)}}">{{$post->title}}</a>
                                                    </h3>
                                                </div>
                                                <div class="entry-meta">
                                                    <ul>
                                                        <li><span>penyunting: </span> <a href="#">{{$post->editor}}</a>
                                                        </li>
                                                        <li><i class="icon-time"></i><a
                                                                href="#">{{$post->created_at}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $posts->links('guest.paginate') }}
                            </div>
                        </div>
                    </div>

                    <!-- Second Sidebar
                    ============================================= -->
                    <div class="col-lg-4 sticky-sidebar-wrap mt-5 mt-lg-0">
                        <div class="sticky-sidebar">

                            <!-- Sidebar Widget 3
                            ============================================= -->
                            <div class="widget clearfix">
                                <h4 style="background: #FFB2A6" class="mb-2 ls1 text-uppercase fw-bold">Video</h4>
                                <div class="line line-xs line-travel"></div>

                                <div class="owl-carousel fixed-nav carousel-widget posts-md" data-margin="0"
                                     data-nav="true" data-pagi="false" data-items="1">
                                    @foreach($videos as $video)
                                        <div class="oc-item">
                                            <div class="portfolio-item">
                                                <div class="portfolio-image">
                                                    <a href="portfolio-single-video.html">
                                                        <img
                                                            src="http://img.youtube.com/vi/{{$video->thumbnail}}/maxresdefault.jpg"
                                                            alt="Backpack Contents">
                                                    </a>
                                                    <div class="bg-overlay">
                                                        <div class="bg-overlay-content dark"
                                                             data-hover-animate="fadeIn">
                                                            <a href="{{$video->url}}"
                                                               class="overlay-trigger-icon bg-light text-dark"
                                                               data-hover-animate="fadeInDownSmall"
                                                               data-hover-animate-out="fadeOutUpSmall"
                                                               data-hover-speed="350" data-lightbox="iframe"><i
                                                                    class="icon-line-play"></i></a>
                                                        </div>
                                                        <div class="bg-overlay-bg dark"
                                                             data-hover-animate="fadeIn"></div>
                                                    </div>
                                                </div>
                                                <div class="portfolio-desc">
                                                    <h3>{{$video->judul}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section><!-- #content end -->
    <!-- Modal -->
    <div class="modal fade" id="rincian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="isirincian"></div>
        </div>
    </div>
@endsection
@push('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyz35pK5Ccrp8a58PJSEO9vhLC6WU3FvU&region=ID&language=id&libraries=drawing,geometry"></script>
    <script src="{{asset('geoxml3.js')}}"></script>
    <script>
        $(document).ready(function () {
            function initialize() {
                geocoder = new google.maps.Geocoder();
                var mapOptions = {
                    scrollwheel: true,
                    // disable the default User Interface
                    disableDefaultUI: true,
                    zoomControl: true,
                    streetViewControl: false,
                    fullscreenControl: true,
                    center: {lat: -7.2050532, lng: 112.9952789},
                    minZoom: 11, // Zoom minimal
                    maxZoom: 12  // Zoom maksimal
                };


                var map = new google.maps.Map(document.getElementById('googleMap'),
                    mapOptions);

                //even listner ketika peta diklik
                // google.maps.event.addListener(map, 'click', function (event) {
                //     taruhMarker(this, event.latLng);
                //     geocoder.geocode({
                //         'latLng': event.latLng
                //     }, function (results, status) {
                //         alert('Geocoder failed due to: ' + status);
                //     });
                // });

                //Parse FILE KML dengan menggunakan geoxml3.js
                var geoXml = new geoXML3.parser({
                    suppressInfoWindows: true,
                    preserveViewport: false,
                    map: map,
                    afterParse: myfunction
                });
                /** letak file kml */
                geoXml.parse("{{asset('situbondokab.kml')}}");

                function myfunction(doc) {
                    // doc coming in is an array of objects from GeoXML3, one per KML.  Since there's only 1,
                    // we'll assumpe 0 is our target and we wnant gpolygons, an array of Google Maps Polygon instances
                    var polygons = doc[0].gpolygons;
                    var kec = [
                        '351216',
                        '351215',
                        '351203',
                        '351207',
                        '351208',
                        '351206',
                        '351204',
                        '351209',
                        '351205',
                        '351210',
                        '351201',
                        '351212',
                        '351217',
                        '351202',
                        '351214',
                        '351213',
                        '351211',
                    ];
                    var grading = [
                        '#990000',
                        '#9F0F0F',
                        '#A51E1E',
                        '#AB2D2D',
                        '#B13C3C',
                        '#B74B4B',
                        '#BD5A5A',
                        '#C36969',
                        '#C97878',
                        '#CF8787',
                        '#D59696',
                        '#DBA5A5',
                        '#E1B4B4',
                        '#E7C3C3',
                        '#EDD2D2',
                        '#F3E1E1',
                        '#F9F0F0',

                    ];
                    @php($order = 1)
                    @foreach($data->sebaran as $camat)
                    warna(kec.findIndex(kd => kd == '{{$camat->id_kec}}'), code('{{$order - 1}}'))
                    @php($order++)
                    @endforeach

                    function code(hex) {
                        return grading[hex];
                    };

                    function warna(index, color) {
                        polygons[index].setOptions({
                            fillColor: color,
                            strokeColor: '#000',
                            strokeOpacity: 1,
                            strokeWeight: 1
                        });
                    }
                }

                @foreach($data->sebaran as $values)
                    x{{$values->id_kec}} = "{{$values->latitude}}";
                y{{$values->id_kec}} = "{{$values->longitude}}";
                var nama{{$values->id_kec}} = "{{$values->nama_kecamatan}}";
                var nilai{{$values->id_kec}} = "{{$values->nilai}}";
                var keterangan = '<a href="#peta-sebaran" data-id="' + {{$values->id_kec}} + '" class="detail" style="font-weight: bold;color:black;font-size:10">'
                    + nama{{$values->id_kec}} + '</a><br><span style="text-align: center;color:black;font-size:14;">'
                    + nilai{{$values->id_kec}} + '%</span>';

                infowindow = new google.maps.InfoWindow({
                    position: new google.maps.LatLng(x{{$values->id_kec}}, y{{$values->id_kec}}),
                    content: keterangan
                });
                infowindow.open(map);

                @endforeach
                var styles = [
                    {
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [
                            {
                                "color": "#8d8d8d"
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#f5f5f5"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [
                            {
                                "saturation": -100
                            },
                            {
                                "lightness": 10
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [
                            {
                                "visibility": "off"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [
                            {
                                "color": "#dbdbdb"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    }
                ]
                map.setOptions({styles: styles});

            }

            google.maps.event.addDomListener(window, 'load', initialize());
            $('#maplist').change(function () {
                var id = $(this).val();
                if (id != 99) {
                    document.getElementById("map").src = "{{url('peta/sebaran')}}/" + id;
                    $('#map').show();
                    $('#googleMap').hide();
                } else if (id == 99) {
                    $('#map').hide();
                    $('#googleMap').show();
                }
            });

            //detail

            $('body').on('click', '.detail', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    type: 'GET',
                    url: "{{url('/sebaran/rincian')}}/" + id,
                    success: function (data) {
                        // console.log(data)
                        $("#isirincian").html(data);
                    }
                });
                $('#rincian').modal('show');
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            //show all title in one place..
            $(".item").each(function (i) {
                //you can manipulate..this html generated according to your need...
                //add `<a>` if needed
                $(".titles ul").append(`<li data-index="${i}">${$(this).find("img").attr("title")}</li>`)
            })
            $(".titles ul li:first").addClass("active");
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                autoplay: true,
                items: 1,
            });

            owl.on('translated.owl.carousel', function (event) {
                //get data-index..
                var index_ = $(this).find('.active').find("img").data("index")
                $(".titles li").removeClass("active")
                //for making active
                $("li[data-index=" + index_ + "]").addClass("active");

            });
        })
    </script>
@endpush
