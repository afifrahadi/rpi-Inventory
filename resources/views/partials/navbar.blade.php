<nav class="navbar navbar-expand-lg shadow-sm p-3">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand nav-link d-flex align-items-center ms-4 {{ Request::is('inventories') ? 'active-link' : '' }}" href="/inventories">
            <i class="bi bi-box2-heart me-2"></i> Inventory App
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-4">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center px-3 {{ Request::is('inventories/create') ? 'active-link' : '' }}" href="/inventories/create">
                        <i class="bi bi-plus-circle me-2"></i> Tambah Data
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center px-3 {{ Request::is('inventories/scanner') ? 'active-link' : '' }}" href="/inventories/scanner">
                        <i class="bi bi-qr-code-scan me-2"></i> Scan Barcode
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center px-3 {{ Request::is('inventories/chart') ? 'active-link' : '' }}" href="/inventories/chart">
                        <i class="bi bi-bar-chart me-1"></i> Data Chart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
