@extends('layouts.app')

@section('title', 'Tambah Data Inventory')

@section('content')
<h2 class="text-center mb-4 fw-bold">Form Tambah Data Inventory</h2>
<div class="container w-50">
    <form method="POST" action="{{ route('inventory.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tenant Name</label>
            <input type="text" name="tenant_name" class="form-control @error('tenant_name') is-invalid @enderror" value="{{ old('tenant_name') }}" placeholder="Masukkan Tenant Name">
            @error('tenant_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Serial Number</label>
            <input type="text" name="serial_number" class="form-control @error('serial_number') is-invalid @enderror" value="{{ old('serial_number') }}" placeholder="Masukkan Serial Number" required>
            @error('serial_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">SID SIDWAN</label>
            <input type="text" name="sid_sidwan" class="form-control @error('sid_sidwan') is-invalid @enderror"  value="{{ old('sid_sidwan') }}"placeholder="Masukkan SID SIDWAN">
            @error('sid_sidwan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">SID CONNECTIVITY</label>
            <input type="text" name="sid_connectivity" class="form-control @error('sid_connectivity') is-invalid @enderror" value="{{ old('sid_connectivity') }}" placeholder="Masukkan SID CONNECTIVITY">
            @error('sid_connectivity')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Customer Name</label>
            <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="Masukkan Customer Name">
            @error('customer_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Hostname Edge</label>
            <input type="text" name="hostname_edge" class="form-control @error('hostname_edge') is-invalid @enderror" value="{{ old('hostname_edge') }}" placeholder="Masukkan Hostname Edge">
            @error('hostname_edge')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Edge Type</label>
            <input type="text" name="edge_type" class="form-control @error('edge_type') is-invalid @enderror" value="{{ old('edge_type') }}" placeholder="Masukkan Edge Type">
            @error('edge_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
@endsection
