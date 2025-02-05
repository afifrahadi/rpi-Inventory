@extends('layouts.app')

@section('title', 'Data Inventory')

@section('content')
    <h2 class="text-center mb-4 fw-bold">Data Inventory</h2>

    <div class="card shadow-lg p-3">
        <!-- Search Bar -->
        <div class="d-flex justify-content-end mb-3">
            <form action="{{ route('inventory.index') }}" method="GET" class="d-flex align-items-center">
                <input type="text" name="search" class="form-control form-control-md me-2"
                    placeholder="Cari Serial Number..." value="{{ request('search') }}" style="max-width: 200px;">
                <button type="submit" class="btn btn-sm btn-primary me-2">
                    <i class="bi bi-search"></i> Cari
                </button>
                @if(request('search'))
                    <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-danger">
                        <i class="bi bi-x-circle"></i> Reset
                    </a>
                @endif
            </form>
        </div>


        <!-- Tabel data -->
        <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
            <table class="table table-striped table-hover table-bordered">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>No</th>
                        <th>Tenant Name</th>
                        <th>Serial Number</th>
                        <th>SID SIDWAN</th>
                        <th>SID CONNECTIVITY</th>
                        <th>Customer Name</th>
                        <th>Hostname Edge</th>
                        <th>Edge Type</th>
                        <th>QR Code</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inventories as $index => $inventory)
                    <tr class="text-center">
                        <td>{{ ($inventories->currentPage() - 1) * $inventories->perPage() + $loop->iteration }}</td>
                        <td>{{ $inventory->tenant_name }}</td>
                        <td><span class="badge bg-success">{{ $inventory->serial_number }}</span></td>
                        <td>{{ $inventory->sid_sidwan }}</td>
                        <td>{{ $inventory->sid_connectivity }}</td>
                        <td>{{ $inventory->customer_name }}</td>
                        <td>{{ $inventory->hostname_edge }}</td>
                        <td>{{ $inventory->edge_type }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $inventory->qr_code) }}" alt="QR Code" width="60" class="rounded shadow-sm" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#qrModal{{ $index }}">

                            <!-- Modal untuk QR Code -->
                            <div class="modal fade" id="qrModal{{ $index }}" tabindex="-1" aria-labelledby="qrModalLabel{{ $index }}">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="qrModalLabel{{ $index }}">QR Code</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('storage/' . $inventory->qr_code) }}" alt="QR Code" class="img-fluid">
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('inventory.qr-pdf', $inventory->id) }}" target="_blank" class="btn btn-danger">
                                                Print to PDF
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="inventories/{{$inventory->id}}/edit" class="btn btn-sm btn-primary shadow-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('inventory.destroy', ['inventory' => $inventory]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Yakin ingin menghapus data dengan SN {{ $inventory->serial_number }}?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- pagination --}}
        <div class="d-flex justify-content-end mt-3">
            <nav>
                <ul class="pagination">
                    <!-- Tombol Previous -->
                    <li class="page-item {{ $inventories->currentPage() == 1 ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $inventories->previousPageUrl() }}">Previous</a>
                    </li>

                    <!-- Halaman Pertama -->
                    @if ($inventories->currentPage() > 3)
                        <li class="page-item">
                            <a class="page-link" href="{{ $inventories->url(1) }}">1</a>
                        </li>
                        @if ($inventories->currentPage() > 4)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                    @endif

                    @for ($i = max(1, $inventories->currentPage() - 2); $i <= min($inventories->lastPage(), $inventories->currentPage() + 2); $i++)
                        <li class="page-item {{ $inventories->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $inventories->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <!-- Halaman Terakhir -->
                    @if ($inventories->currentPage() < $inventories->lastPage() - 2)
                        @if ($inventories->currentPage() < $inventories->lastPage() - 3)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $inventories->url($inventories->lastPage()) }}">{{ $inventories->lastPage() }}</a>
                        </li>
                    @endif

                    <!-- Tombol Next -->
                    <li class="page-item {{ $inventories->currentPage() == $inventories->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $inventories->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection
