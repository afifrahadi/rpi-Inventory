@extends('layouts.app')

@section('title', 'Edit Data Inventory')

@section('content')
<h2 class="text-center mb-4 fw-bold">Edit Data Inventory</h2>
<div class="container w-50">
    <form method="POST" action="{{ route('inventory.update', $inventory->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tenant Name</label>
            <input type="text" name="tenant_name" class="form-control" value="{{ $inventory->tenant_name }}" required>
        </div>

        {{-- <div class="mb-3">
            <label class="form-label">Serial Number</label>
            <input type="text" name="serial_number" class="form-control" value="{{ $inventory->serial_number }}" required>
        </div> --}}

        <div class="mb-3">
            <label class="form-label">Serial Number</label>
            <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value="{{ $inventory->serial_number }}" placeholder="Masukkan Serial Number" required>
            @error('serial_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">SID SIDWAN</label>
            <input type="text" name="sid_sidwan" class="form-control" value="{{ $inventory->sid_sidwan }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">SID CONNECTIVITY</label>
            <input type="text" name="sid_connectivity" class="form-control" value="{{ $inventory->sid_connectivity }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Customer Name</label>
            <input type="text" name="customer_name" class="form-control" value="{{ $inventory->customer_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hostname Edge</label>
            <input type="text" name="hostname_edge" class="form-control" value="{{ $inventory->hostname_edge }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Edge Type</label>
            <input type="text" name="edge_type" class="form-control" value="{{ $inventory->edge_type }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>
</div>
@endsection
