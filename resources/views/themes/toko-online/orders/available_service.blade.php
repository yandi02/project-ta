<li class="list-group-item py-3 border-top fw-bold text-center">
    <div class="row align-items-center">
        <div class="col-2 col-md-2 col-lg-1">Pilih</div>
        <div class="col-4 col-md-4 col-lg-5">
            Layanan
        </div>
        <div class="col-3 col-md-2 col-lg-3">
            Estimasi(hari)
        </div>
        <div class="col-3 text-lg-end text-start text-md-end col-md-3">
            Biaya
        </div>
    </div>
</li>
@forelse ($services as $service)
    <li class="list-group-item py-3 text-center mb-3">
        <div class="row align-items-center">
            <div class="col-2 col-md-2 col-lg-1">
                @php
                    $serviceName = $service['service'];
                    $courier = $service['courier'];
                    $addressID = $service['address_id'];

                @endphp
                <input class="form-check-input delivery-package" type="radio" name="delivery_package" id="inlineRadio2" value="{{ $service['service'] }}" onclick="setShippingFee('{{ $serviceName }}', '{{ $courier }}', '{{ $addressID }}')">
            </div>
            <div class="col-4 col-md-4 col-lg-5">
                {{$service['service']}} ({{$service['description']}})
            </div>
            <div class="col-3 col-md-2 col-lg-3">
                {{$service['etd']}}
            </div>
            <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                <span class="fw-bold">Rp. {{$service['cost']}},00</span>
            </div>
        </div>
    </li>
@empty
    <li class="list-group-item py-3 text-center">
        <span class="text-danger">
            Tidak ada layanan.
        </span>
    </li>
@endforelse

<script type="text/javascript">
    function setShippingFee(deliveryPackage, courier, addressID) {
        $.ajax({
            url: "/orders/choose-package",
            method: "POST",
            data: {
                delivery_package: deliveryPackage,
                courier: courier,
                address_id: addressID,
                _token: $('meta[name="csrf-token"]').attr('content'),
            },
            success: function (result) {
                $('#shipping-fee').html("Rp. " + result.shipping_fee);
                $('#grand-total').html("Rp. " + result.grand_total);
                // console.log(result);
                
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
</script>