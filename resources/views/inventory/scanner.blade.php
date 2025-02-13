@extends('layouts.app')

@section('title', 'Scanner Inventory')

@section('content')
<div class="container mt-2">
    <h2 class="text-center mb-4 fw-bold md-0">QR Code Scanner</h2>
    <div class="scanner-container text-center">
            <p class="text-muted">Silahkan Scan Barcode di bawah ini </p>

            <!-- SCANNER -->
            <div id="qr-reader" class="border rounded p-2 center" style="width: 100%;"></div>

            <!-- OUTPUT -->
            <div class="mt-3">
                <p id="scan-output" class="text-success">No result yet.</p>
            </div>

            <div class="mt-4">
                <button class="btn btn-secondary me-2" onclick="resetScanner()">Reset Scanner</button>
                <button class="btn btn-primary" onclick="goBack()">Go Back</button>
            </div>
        </div>
    </div>

    <script>
        // Function QR Code
        function onScanSuccess(decodedText, decodedResult) {
            console.log(`Code scanned = ${decodedText}`, decodedResult);
            const outputElement = document.getElementById("scan-output");
            outputElement.textContent = decodedText;
            window.location.href = `/inventories/${decodedText}`;
        }

        // Inisiasi QR Code
        const html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);

        // Reset scanner
        function resetScanner() {
            html5QrcodeScanner.clear();
            html5QrcodeScanner.render(onScanSuccess);
            document.getElementById("scan-output").textContent = "No result yet.";
        }

        function goBack() {
            window.history.back();
        }
    </script>
@endsection
</body>
</html>
