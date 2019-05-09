<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{asset('assets/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/DataTables-1.10.18/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <style>
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

        .float{
            position:fixed;
            z-index:100;
            width:55px;
            height:55px;
            /* padding-bottom:30px; */
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
            margin-top:12px;
        }

        #adddata{
            bottom:40px;
            right:40px;
            /* background-color:red; */
        }

        #importcsv{
            bottom:110px;
            right:40px;
            /* background-color:green; */

        }
    </style>
</head>
<body>
    <!-- <div id="app"> -->
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color:#fff;border-bottom:0px">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                    @guest
                        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @else

                        @role('admin')
                        <li><a href="#" onclick="addForm()">Add Data</a></li>
                        <li><a href="#" onclick="importCsv()">Import CSV</a></li>
                        @endrole
                        <li><a href="{{url('exportpdf')}}" target="_blank">Export PDF</a></li>
                        <li><a href="{{url('exportcsv')}}" target="_blank">Export CSV</a></li>
                        <li><a href="{{url('exportexcel')}}" target="_blank">Export Excel</a></li>

                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                        </li>
                    
                    @endguest

                    </ul>
                </div>
                
            </div>
        </nav>
        <!-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    
                    <ul class="navbar-nav ml-auto">
                        
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->

        <!-- <main class="py-4"> -->
        @role('admin')
        <a href="#" onclick="addForm()" class="float btn btn-success" id="adddata">
            <i class="glyphicon glyphicon-plus my-float"></i>
        </a>
        <a href="#" onclick="importCsv()" class="float btn btn-warning" id="importcsv">
            <i class="glyphicon glyphicon-import my-float"></i>
        </a>
        @endrole
        <div class="container" style="margin-top:100px">
            <div class="row content">
                <div style="text-align:center;font-size:24px;margin-bottom:30px">
                    TABLE PENDUDUK
                </div>
                <div class="col-sm-12 table-responsive">
                    <table id="contact-table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td style="width:30px">No</td>
                                <td>NIK</td>
                                <td>Name</td>
                                <td>Brith Date</td>
                                <td>Age</td>
                                <td>Gender</td>
                                <td>Address</td>
                                <td>Photo</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    @include('form')
    @include('contacCard')
    @include('importcsv')

    <script src="{{asset('assets/jQuery-3.3.1/jQuery-3.3.1.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap-3.3.7-dist/bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/DataTables-1.10.18/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{asset('assets\bootstrap-validator-master\bootstrap-validator-master\js\validator.js')}}"></script>
        <script type="text/javascript">
            var table =  $("#contact-table").DataTable({
                            processing : true,
                            serverSide : true,
                            ajax : "{{ route('api.contact') }}",
                            columns : [
                                {data:'id',name:'id'},
                                {data:'nik',name:'nik'},
                                {data:'name',name:'name'},
                                {data:'birthdate',name:'birthdate'},
                                {data:'age',name:'age'},
                                {data:'gender',name:'gender'},
                                {data:'address',name:'address'},
                                {data:'show_photo',name:'show_photo',orderable:false,searchable:false},
                                {data:'action',name:'action',orderable:false,searchable:false}
                            ]
                        }) ;

            function addForm(){
                save_method = "add";
                $("input[name=_method]").val('POST');
                $("#modal-form").modal("show");
                $("#modal-form form")[0].reset();
                $(".modal-title").text("Add Data");
            }

            function importCsv(){
                save_method = "add";
                $("input[name=_method]").val('POST');
                $("#modal-import").modal("show");
                $("#modal-import form")[0].reset();
                $(".modal-title").text("Import Data");
            }

            function viewCard(id){
                save_method = "show";
                $("input[name=_method]").val("PATCH");
                $("#v_name").text('');
                $("#v_address").text('');
                $("#v_nik").text('');
                $("#v_gender").text('');
                $("#v_birthdate").text('');
                $("#v_photo").attr('src','');
                $.ajax({
                    url:"{{url('home').'/'}}"+ id +"/edit",
                    type:"GET",
                    dataType:"JSON",
                    success: function(data){
                        $("#modal-card").modal('show');
                        $(".modal-title").text("View Data");
                        
                        $("#v_name").text(data.name);
                        $("#v_address").text(data.address);
                        $("#v_age").text(data.age);
                        $("#v_gender").text(data.gender);
                        $("#v_birthdate").text(data.birthdate);
                        if(data.photo != null){
                            $("#v_photo").attr('src',data.photo);
                        }else{
                            $("#v_photo").attr('src',"{{url('img/no_img.jpg')}}");
                        }
                    },
                    error:  function(){
                        alert("Nothing Data");
                    }
                });
            }

            function editForm(id){
                save_method = "edit";
                $("input[name=_method]").val("PATCH");
                $("#modal-form form")[0].reset();
                $.ajax({
                    url:"{{url('home').'/'}}"+ id +"/edit",
                    type:"GET",
                    dataType:"JSON",
                    success: function(data){
                        $("#modal-form").modal('show');
                        $(".modal-title").text("Edit Data");
                        $("#id").val(data.id);
                        $("#name").val(data.name);
                        $("#address").val(data.address);
                        $("#nik").val(data.nik);
                        $("#gender").val(data.gender);
                        $("#birthdate").val(data.birthdate);
                    },
                    error:  function(){
                        alert("Nothing Data");
                    }
                });
            }

            function deleteData(id){

                var csrf_token = $("meta[name=csrf-token]").attr("content");
                swal({
                    title:"Are You Sure?",
                    text:"You won't be able to revert this!",
                    type:"warning",
                    showCancelButton:true,
                    confirmButtonColor:"#3085d6",
                    confirmButtonText:"Yes,Delete it!"
                }).then(function(){
                        $.ajax({
                            url:"{{ url('home') }}"+"/"+id,
                            type: "POST",
                            data: {"_method":"DELETE","_token":csrf_token},
                            success: function(data){
                                table.ajax.reload();
                                swal({
                                    title:"Success",
                                    text:"Data has been deleted",
                                    type:"success",
                                    timer:1500
                                })
                            },
                            error: function(){
                                swal({
                                    title:"Oops",
                                    text:"Something went wrong",
                                    type:"error",
                                    time:1500
                                })
                            }

                        });
                    
                });
                
            }

            $(function(){
                    $("#modal-form form").validator().on("submit",function(e){
                        if (!e.isDefaultPrevented()){
                            var id = $("#id").val();
                            if (save_method=="add"){ url = "{{url('home')}}";}
                            else {url= "{{ url('home').'/' }}"+id;}
                            $.ajax({
                                url : url,
                                type : "POST",
                                // data : $("#modal-form form").serialize(),
                                data : new FormData($("#modal-form form")[0]),
                                contentType : false,
                                processData : false,
                                success : function($data){
                                    $("#modal-form").modal("hide");
                                    table.ajax.reload();
                                    swal({
                                        title:"Success",
                                        text:"Data Has been created",
                                        Type:"success",
                                        timeout:1500
                                    });
                                },
                                error : function(){
                                    swal({
                                        title:"Oops",
                                        text:"Something went wrong",
                                        type:"error",
                                        timeout:1500
                                    });
                                   
                                }
                            });
                            return false;
                        }
                    });
            });

            $(function(){
                    $("#modal-import form").validator().on("submit",function(e){
                        if (!e.isDefaultPrevented()){
                            if (save_method=="add"){ url = "{{url('/importcsv')}}";}
                            $.ajax({
                                url : url,
                                type : "POST",
                                // data : $("#modal-form form").serialize(),
                                data : new FormData($("#modal-import form")[0]),
                                contentType : false,
                                processData : false,
                                success : function($data){
                                    $("#modal-import").modal("hide");
                                    table.ajax.reload();
                                    swal({
                                        title:"Success",
                                        text:"Data Has been created",
                                        Type:"success",
                                        timeout:1500
                                    });
                                },
                                error : function(){
                                    swal({
                                        title:"Oops",
                                        text:"Something went wrong",
                                        type:"error",
                                        timeout:1500
                                    });
                                   
                                }
                            });
                            return false;
                        }
                    });
            });
        </script>
</body>
</html>