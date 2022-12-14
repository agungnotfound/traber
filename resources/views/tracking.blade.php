<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/app.css') }}" rel="stylesheet">
</head>

<style type="text/css">
    .progressbar li {
        list-style-type: none;
        float: left;
        width: 13%;
        position: relative;
        text-align: center;
    }

    .progressbar li:before {
        content: '';
        counter-increment: step;
        width: 10px;
        height: 10px;
        line-height: 50px;
        border: 13px solid #ddd;
        display: block;
        text-align: center;
        margin: 0 auto 0px auto;
        border-radius: 50%;
        background-color: white;
    }

    .progressbar li:after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background-color: #ddd;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressbar li:first-child:after {
        content: none;
    }

    .progressbar li.active {
        color: green;
    }

    .progressbar li.active:before {
        border-color: green;
    }

    .progressbar li.active + li:after {
        background-color: green;
    }

    .bg{
        backdrop-filter: blur(20px);
        background-image:url('{{asset('img/bg-track.jpeg')}}'); 
        background-repeat: no-repeat; 
        background-size: 100% 90%;
    }

</style>
<body class="bg">
    <div id="app" class="">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    <p class="lead" style="font-size:12px;">SISTEM TRACKING BERKAS</p>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <!-- <span class="navbar-toggler-icon"></span> -->
                </button>
            </div>
        </nav>
        <section class="content">
            <div class="container-fluid">
                <h4 class="text-center display-8">TRACKING BERKAS ONLINE</h4>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6 offset-md-2">
                        <form action="" id="form-search" method="post">
                            <div class="input-group">
                                <input type="search" id="nopel" class="form-control form-control-lg" placeholder="Masukan Nomor Pelayanan Anda">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6 offset-md-2">
                        <div id="response_error"></div>

                        <div class="form-group" id="detail-berkas" style="display:none;">
                            <div class="col-md-offset-1">
                                <div class="row">
                                    <div class="">
                                        <br>
                                        <p class="lead"><u>Detail Berkas</u></p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">No. Pelayanan:</th>
                                                    <td id="no_pelayanan"></td>
                                                </tr>
                                                <tr>
                                                    <th>Nama Wajib Pajak</th>
                                                    <td id="nama_wp"></td>
                                                </tr>
                                                <tr>
                                                    <th>No. Handphone:</th>
                                                    <td id="no_hp"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat Pemohon</th>
                                                    <td id="alamat_pemohon"></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat Objek Pajak</th>
                                                    <td id="alamat_objek_pajak"></td>
                                                </tr>
                                                <tr>
                                                    <th>Luas Tanah (M2)</th>
                                                    <td id="luas_tanah"></td>
                                                </tr>
                                                <tr>
                                                    <th>Luas Bangunan (M2)</th>
                                                    <td id="luas_bangunan"></td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Pelayanan</th>
                                                    <td id="nama_pelayanan"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-6 offset-md-2">
                        <div class="alert alert-danger" id="file" style="display:none;">Syarat tidak terpenuhi</div>
                    </div>
                </div>
                <div class="row" style="display:none;" id="flow-proses">
                    <div class=" offset-md-1">
                        <ul class="progressbar">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    
    $(document).ready(function(){
        $("#form-search").submit(function(e){
            e.preventDefault();
            var nopel = $("#nopel").val();
            var htmlError = "";
            var notes = "";

            $('ul li').removeClass("active");
            $('#no_pelayanan').text("");
            $('#nama_wp').text("");
            $('#no_hp').text("");
            $('#alamat_pemohon').text("");
            $('#alamat_objek_pajak').text("");
            $('#luas_tanah').text("");
            $('#luas_bangunan').text("");
            $('#nama_pelayanan').text("");
            $('#file').hide();
            $('#detail-berkas').hide();
            $('#flow-proses').hide();

            var status = ['Berkas diterima', 'Dibuatkan NoPel', 'Validasi Berkas oleh pendata', 'Telah disetujui oleh K.UPT','Proses oleh BAPENDA', 'SPPT sudah tercetak'];
            var progressStatus = $(".progressbar");
            $(".progressbar").empty();
            $.each(status, function(i){
                var newList = "<li>" + status[i]+ "</li>";
                $(progressStatus).append(newList);
            });

            $.ajax({
                type: "POST",
                url: "{{route('tracking.show')}}",
                data: {'no_pelayanan':nopel},
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                beforeSend: function(){
                    $("#response_error").html("");
                },
                success : function(data) {
                    response = data.response
                    if (response.status == true) {
                        htmlError += "<div class=\"col-md-12 alert alert-success text-center\">";
                        htmlError += "Berkas Ditemukan";
                        htmlError += "</div>"; 
                        $("#response_error").html(htmlError);

                        $('#detail-berkas').show();

                        var field = response.data
                        $('#no_pelayanan').text(field.no_pelayanan)
                        $('#nama_wp').text(field.nama_wp)
                        $('#no_hp').text(field.no_hp)
                        $('#alamat_pemohon').text(field.alamat_pemohon)
                        $('#alamat_objek_pajak').text(field.alamat_objek_pajak)
                        $('#luas_tanah').text(field.luas_tanah)
                        $('#luas_bangunan').text(field.luas_bangunan)
                        $('#nama_pelayanan').text(field.nama_pelayanan)

                        if (field.status == 'Syarat tidak terpenuhi') {
                            $('#file').show();
                        } else{
                            $('#flow-proses').show();
                            $('ul li').each(function (index, item) {
                                $(this).addClass("active");
                                if ($(this).text() == field.status) {
                                    notes = field.status + "<br>"+ "<p class='text-secondary'>"+field.notes+"</p>";
                                    $(this).html(notes);
                                    return false;
                                }
                            });
                        }
                        
                    } else {
                        htmlError += "<div class=\"col-md-12 alert alert-danger text-center\">";
                        htmlError += data.response;
                        htmlError += "</div>"; 
                        $("#response_error").html(htmlError);
                    } 
                }
                
            });
        });
    });
</script>
</body>
</html>