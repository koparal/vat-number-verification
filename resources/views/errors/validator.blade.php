@if (session('validator'))
    @php($vat = session('validator')->getCountryCode()." ".session('validator')->getVatNumber())
    @if(session('validator')->check())
        @php($validator = session('validator'))
        <div class="alert alert-success" role="alert">
            {!! "<b>".$vat."</b> is Valid VAT Number" !!}
            <hr/>
            Name : {!! $validator->getName() !!} <br/>
            Address : {!! $validator->getAddress() !!}
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            {!! "<b>".$vat."</b> is Invalid Vat Number" !!}
        </div>
    @endif
@endif
