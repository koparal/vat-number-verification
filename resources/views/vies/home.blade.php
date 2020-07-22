<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Check VAT numbers</title>
    <link href="{!! asset("css/bootstrap.css") !!}" rel="stylesheet">
    <link href="{!! asset("css/custom.css") !!}" rel="stylesheet">
</head>

<body class="text-center">

    <form class="form-vat"  method="POST" action="{!! route("vies.validator") !!}">
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Check VAT Number</h1>
        @include("errors.errors")
        @include("errors.validator")

        <div class="row">
            <div class="col-md-3">
                <label for="">Country</label>
                <select name="country_code" class="form-control" id="country_code" autofocus>
                    <option value="">Select</option>
                    @foreach($country_codes as $code)
                        <option {!! old("country_code") == $code ? "selected" : '' !!} value="{!! $code !!}">{!! $code !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-9">
                <label for="" class="text-left">VAT Number</label>
                <input type="text" class="form-control" name="vat_number" id="vat_number" value="{!! old("vat_number") !!}" placeholder="Please write VAT Number"
                       autofocus><br/>
            </div>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" id="checkit">Check</button>

        <p class="mt-5 mb-3 text-muted">
            &copy; 2020 VAT Validator
        </p>
    </form>

</body>

<script src="{!! asset("js/jquery.min.js") !!}"></script>
<script src="{!! asset("js/jquery.validate.min.js") !!}"></script>
<script src="{!! asset("js/custom.js") !!}"></script>
</html>
