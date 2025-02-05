<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // ambil input search
        $search = $request->input('search');

        // Query search bar
        $inventories = Inventory::when($search, function ($query, $search) {
            return $query->where('serial_number', 'LIKE', "%{$search}%");
                        // ->orWhere('tenant_name', 'LIKE', "%{$search}%")
                        // ->orWhere('customer_name', 'LIKE', "%{$search}%");
        })->paginate(10);

        return view('inventory.index', ['inventories' => $inventories]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tenant_name' => 'required',
            'serial_number' => 'required|unique:inventories,serial_number',
            'sid_sidwan' => 'required',
            'sid_connectivity' => 'required',
            'customer_name' => 'required',
            'hostname_edge' => 'required',
            'edge_type' => 'required',
        ],

        [
            'serial_number.required' => 'Serial Number wajib diisi.',
            'serial_number.unique' => 'Serial Number sudah digunakan, silakan gunakan yang lain.',
            'tenant_name.required' => 'Nama tenant harus diisi.',
            'sid_sidwan.required' => 'SID SIDWAN wajib diisi.',
            'sid_connectivity.required' => 'SID CONNECTIVITY wajib diisi.',
            'customer_name.required' => 'Customer name wajib diisi.',
            'hostname_edge.required' => 'Hostname Edge wajib diisi.',
            'edge_type.required' => 'Edge Type wajib diisi.',
        ]);

        // Buat Inventory awal tanpa QR Code
        $inventory = Inventory::create($data);

        // Generate QR Code berdasarkan ID Inventory
        $qrCodeData = $inventory->id;
        $qrImageName = $data['serial_number'] . '.png';
        $qr = QrCode::format('png')->size(300)->margin(3)->generate($qrCodeData);

        // Simpan QR Code ke storage
        $qrCodePath = 'qr/' . $qrImageName;
        Storage::disk('public')->put($qrCodePath, $qr);

        // Update kolom qr_code di DB
        $inventory->update(['qr_code' => $qrCodePath]);

        return redirect(route('inventory.index'))->with('success', 'Data Inventory berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari inventory berdasarkan ID
        $inventory = Inventory::findOrFail($id); // Mengambil satu model berdasarkan ID

        // Kirim data ke view
        return view('inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', ['inventory' => $inventory]);
        // dd($inventory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $data = $request->validate([
            'tenant_name' => 'required',
            'serial_number' => 'required|unique:inventories,serial_number,' . $inventory->id,
            'sid_sidwan' => 'required',
            'sid_connectivity' => 'required',
            'customer_name' => 'required',
            'hostname_edge' => 'required',
            'edge_type' => 'required',
        ],

        [
            'serial_number.required' => 'Serial Number wajib diisi.',
            'serial_number.unique' => 'Serial Number sudah digunakan, silakan gunakan yang lain.',
        ]);;

        // Hapus QR code lama jika ada
        if ($inventory->qr_code && Storage::disk('public')->exists($inventory->qr_code)) {
            Storage::disk('public')->delete($inventory->qr_code);
        }

        // Generate QR code baru
        $qrCodeData = $inventory->id;
        $qrImageName = $data['serial_number'] . '.png';
        $qrCodePath = 'qr/' . $qrImageName;

        $qr = QrCode::format('png')->size(300)->margin(3)->generate($qrCodeData);
        Storage::disk('public')->put($qrCodePath, $qr);

        // Tambahkan path QR code baru ke data yang akan diupdate
        $data['qr_code'] = $qrCodePath;

        // Update data inventory
        $inventory->update($data);

        // Redirect dengan pesan sukses
        return redirect(route('inventory.index'))->with('success', 'Data Inventory berhasil di-update');
    }



    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Inventory $inventory)
    {
        // Periksa apakah QR code ada di storage
        if ($inventory->qr_code && Storage::disk('public')->exists($inventory->qr_code)) {
            // Hapus file QR code dari storage
            Storage::disk('public')->delete($inventory->qr_code);
        }

        // Hapus data inventory dari database
        $inventory->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect(route('inventory.index'))->with('success', 'Data dan QR Code berhasil dihapus.');
    }

    public function viewQrPdf($id)
    {
        // Ambil data inventory berdasarkan ID
        $inventory = Inventory::findOrFail($id);

        // Ambil path QR code yang ada di storage
        $qrCodePath = storage_path('app/public/' . $inventory->qr_code);

        // Periksa apakah file QR Code ada
        if (!file_exists($qrCodePath)) {
            abort(404, 'QR Code tidak ditemukan.');
        }

        // Dapatkan ukuran gambar QR Code dalam pixel
        list($width, $height) = getimagesize($qrCodePath);

        // Konversi ukuran ke mm (1 pixel = 0.264583 mm)
        $widthMm = $width * 0.264583;
        $heightMm = $height * 0.264583;

        // Tentukan ukuran kertas A8 (52mm x 74mm)
        $paperWidth = 50;
        $paperHeight = 50;

        // Inisialisasi mPDF dengan ukuran A8
        $mpdf = new Mpdf([
            'mode'   => 'utf-8',
            'format' => [$paperWidth, $paperHeight], // Ukuran kertas A8
            'margin_left'   => 3,
            'margin_right'  => 3,
            'margin_top'    => 3,
            'margin_bottom' => 3,
        ]);

        // Menggunakan HTML + CSS agar tampilan lebih rapi
        $html = "
        <div style='text-align: center; font-family: Arial, sans-serif; font-size: 8pt;'>
            <p style='margin: 0; font-weight: bold;'>ID: {$inventory->id}</p>
            <img src='{$qrCodePath}' style='width: 90%; max-width: {$widthMm}mm; height: auto;' />
        </div>";

        // Tulis isi ke dalam PDF
        $mpdf->WriteHTML($html);

        // Tampilkan PDF di browser
        return $mpdf->Output("QRCode_ID_{$inventory->id}_SN_{$inventory->serial_number}.pdf", 'I');
    }
}
