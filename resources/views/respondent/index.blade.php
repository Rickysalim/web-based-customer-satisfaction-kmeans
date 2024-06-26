<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ config(" app.name") }}">
    <meta name="author" content="">
    <title>{{ $title ? $title . ' | ' . config("app.name") : config("app.name")}}</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="justify-content-center m-3 p-3">
       <form method="POST" action="{{ route('save-respondent')}}">
        @csrf
        <div class="container text-start">
            <div class="row">
                <div class="input-group">
                    <span class="input-group-text">Username</span>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="input-group">
                    <span class="input-group-text">Age</span>
                    <input type="number"name="age" class="form-control">
                </div>
            </div>
            <div class="row">
                <select class="form-select" name="gender">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">perempuan</option>
                </select>
            </div>
            <div class="row">
                <div class="input-group">
                    <span class="input-group-text">Purchase Frequency</span>
                    <input type="number" class="form-control" name="purchase_frequency">
                </div>
            </div>
            <div class="row">
                @if (isset($listRespondent))
                    @foreach ($listRespondent as $item)
                    <div class="col-12 fw-bold">
                        {{ $item->question }}
                    </div>
                    <div class="col-12 fw-bold">
                        @php
                           $data = json_decode($item->answer->field);
                        @endphp
                        @if (isset($data))
                            @foreach ($data as $item2)
                              <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ $item->question }}" id="{{ $item->question }}" value="{{$item2->value}}">
                                    <label class="form-check-label" for="{{ $item->question }}">
                                    {{ $item2->label }}
                                    </label>
                              </div>
                            @endforeach
                        @endif
                    </div>
                    @endforeach
                @endif
            </div>
            <button type="submit">SUBMIT</button>
        </div>

       </form>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset(" vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset(" vendor/jquery-easing/jquery.easing.min.js") }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset(" js/sb-admin-2.min.js") }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset(" vendor/chart.js/Chart.min.js") }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset(" js/demo/chart-area-demo.js") }}"></script>
    <script src="{{ asset(" js/demo/chart-pie-demo.js") }}"></script>
</body>

</html>
