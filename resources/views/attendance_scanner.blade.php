@extends('layouts.app')

@section('content')
<div class="main p-2 d-flex justify-content-center" id="main">
    <div style="width: 90vw" id="reader"></div></div>
</div>
<script>
    var scanned = false;

    function onScanSuccess(decodedText, decodedResult) {
        // Handle on success condition with the decoded text or result.
        console.log(`Scan result: ${decodedText}`, decodedResult);
        if (!scanned)
            update(decodedText)
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 270
        });
    html5QrcodeScanner.render(onScanSuccess);

    function update(id) {
        $.ajax({
            url: "{{url('api/event/updatescan')}}",
            method: "POST",
            data: {
                "uuid": id
            },
            success: function() {

                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Data has been updated',
                    footer: 'if your data not changed, contact the administrator</a>'
                })
            },
            error: function() {

                Swal.fire({
                    icon: 'failed',
                    title: 'Filed!',
                    text: 'Data not found',
                    footer: 'if your data not changed, contact the administrator</a>'
                })
            }
        })
    }
</script>
@endsection