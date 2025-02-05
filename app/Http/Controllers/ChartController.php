<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Ambil jumlah Tenant Name
        $tenantCounts = Inventory::selectRaw('tenant_name, COUNT(*) as count')
                                ->groupBy('tenant_name')
                                ->get();
        // $totalTenant = $tenantCounts->sum('count');
        $totalTenant = Inventory::distinct('tenant_name')->count('tenant_name');

        // Ambil jumlah Customer Name
        $customerCounts = Inventory::selectRaw('customer_name, COUNT(*) as count')
                                ->groupBy('customer_name')
                                ->get();

        // Ambil jumlah Hostname Edge
        $hostnameCounts = Inventory::selectRaw('hostname_edge, COUNT(*) as count')
                                ->groupBy('hostname_edge')
                                ->get();
        // $totalHostname = $hostnameCounts->sum('count');
        $totalHostname = Inventory::distinct('hostname_edge')->count('hostname_edge');


        // Ambil jumlah Edge Type
        $edgeTypeCounts = Inventory::selectRaw('edge_type, COUNT(*) as count')
                                ->groupBy('edge_type')
                                ->get();
        // $totalEdgeType = $edgeTypeCounts->sum('count');
        $totalEdgeType = Inventory::distinct('edge_type')->count('edge_type');

        // Hitung total barang dalam gudang
        $totalItems = Inventory::count();

        return view('inventory.chart', compact(
            'tenantCounts', 'customerCounts', 'hostnameCounts', 'edgeTypeCounts', 'totalItems', 'totalTenant', 'totalHostname', 'totalEdgeType'
        ));
    }
}

