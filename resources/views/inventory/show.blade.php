@extends('layouts.app')

@section('title', 'Detail Data Inventory')
@section('content')
    <div class="container">
        <h2 class="my-4 text-center fw-bold">Detail Data Inventory</h2>
        <div class="card shadow-sm">
            {{-- <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Inventory</h5>
            </div> --}}
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th style="width: 20%;">Field</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-muted"><strong>Tenant Name</strong></td>
                            <td>{{ $inventory->tenant_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>Serial Number</strong></td>
                            <td>{{ $inventory->serial_number }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>SID SIDWAN</strong></td>
                            <td>{{ $inventory->sid_sidwan }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>SID CONNECTIVITY</strong></td>
                            <td>{{ $inventory->sid_connectivity }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>Customer Name</strong></td>
                            <td>{{ $inventory->customer_name }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>Hostname Edge</strong></td>
                            <td>{{ $inventory->hostname_edge }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>Edge Type</strong></td>
                            <td>{{ $inventory->edge_type }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted"><strong>QR Code</strong></td>
                            <td>
                                <button class="btn btn-link text-decoration-none" data-bs-toggle="collapse" data-bs-target="#qrCollapse" aria-expanded="false" aria-controls="qrCollapse">
                                    Tampilkan QR Code <i class="bi bi-chevron-down"></i>
                                </button>
                                <div class="collapse mt-2" id="qrCollapse">
                                    <img src="{{ asset('storage/' . $inventory->qr_code) }}" alt="QR Code" class="img-thumbnail" style="width: 100px; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#qrModal">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal QR Code -->
        <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="qrModalLabel">QR Code</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/' . $inventory->qr_code) }}" alt="QR Code" style="width: 100%; max-width: 500px;" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
