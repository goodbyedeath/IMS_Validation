<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\client_database;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class AdminCom_tablesController extends Controller
{
    // List records with pagination and search functionality
    public function index(Request $request) {
        // Get the search input from the request
        $search = $request->input('search');

        // If there is a search term, filter the records by 'no_sertifikat' or 'entitas_usaha', with pagination
        $client_databases = client_database::when($search, function ($query, $search) {
            return $query->where('no_sertifikat', 'like', "%{$search}%")
                         ->orWhere('entitas_usaha', 'like', "%{$search}%");
        })->paginate(10);  // Display 10 records per page

        // Return the view with the filtered records and the search query (to keep it in the search box)
        return view('admin.table.index', compact('client_databases', 'search'));
    }

    // Show form to create a new record
    public function create() {
        return view('admin.table.create');
    }

    // Handle form submission for creating new record
    public function create_submit(Request $request) {
        $validatedData = $request->validate([
            'entitas_usaha' => 'required|string',
            'no_sertifikat' => 'required|string',
            'ruang_lingkup' => 'required|string',
            'alamat' => 'required|string',
            'standar' => 'required|string',
            'status_organisasi' => 'required|string',
            'masa_berlaku' => 'required|date',
            'audit_awal' => 'required|date',
            'pengawasan_audit_1' => 'required|date',
            'pengawasan_audit_2' => 'required|date',
            'status_pengawasan_1' => 'required|string',
            'status_pengawasan_2' => 'required|string',
            'perpanjangan' => 'required|date',
            'qr_code' => 'required|image|mimes:jpeg,jpg,gif,png,svg|max:2048',
        ]);

        // Handle QR code file upload
        $final_name = 'client_database_' . time() . '.' . $request->qr_code->extension();
        $request->qr_code->storeAs('public/qr', $final_name);

        // Create new record
        $client_database = new client_database();
        $client_database->fill($validatedData);
        $client_database->qr_code = $final_name;
        $client_database->save();

        return redirect()->route('admin_table_index')->with('success', 'Data Added Successfully');
    }

    // Show form for editing an existing record
    public function edit($id) {
        $client_database = client_database::findOrFail($id);
        return view('admin.table.edit', compact('client_database'));
    }

    // Handle form submission for updating a record
    public function edit_submit(Request $request, $id) {
        $client_database = client_database::findOrFail($id);

        $validatedData = $request->validate([
            'entitas_usaha' => 'required|string',
            'no_sertifikat' => 'required|string',
            'ruang_lingkup' => 'required|string',
            'alamat' => 'required|string',
            'standar' => 'required|string',
            'status_organisasi' => 'required|string',
            'masa_berlaku' => 'required|date',
            'audit_awal' => 'required|date',
            'pengawasan_audit_1' => 'required|date',
            'pengawasan_audit_2' => 'required|date',
            'status_pengawasan_1' => 'required|string',
            'status_pengawasan_2' => 'required|string',
            'perpanjangan' => 'required|date',
        ]);

        // Handle QR code file upload if new QR code is provided
        if ($request->hasFile('qr_code')) {
            $request->validate([
                'qr_code' => 'image|mimes:jpeg,jpg,gif,png,svg|max:2048',
            ]);

            // Safely remove the old QR code
            if ($client_database->qr_code && Storage::exists('public/qr/' . $client_database->qr_code)) {
                Storage::delete('public/qr/' . $client_database->qr_code);
            }

            // Save new QR code
            $final_name = 'client_database_' . time() . '.' . $request->qr_code->extension();
            $request->qr_code->storeAs('public/qr', $final_name);
            $client_database->qr_code = $final_name;
        }

        // Update other fields
        $client_database->fill($validatedData);
        $client_database->save();

        return redirect()->route('admin_table_index')->with('success', 'Data Updated Successfully');
    }

    // Delete a record
    public function delete($id) {
        $client_database = client_database::findOrFail($id);

        // Safely remove the QR code
        if ($client_database->qr_code && Storage::exists('public/qr/' . $client_database->qr_code)) {
            Storage::delete('public/qr/' . $client_database->qr_code);
        }

        $client_database->delete();
        return redirect()->route('admin_table_index')->with('success', 'Data Deleted Successfully');
    }

    // Show upload form for CSV
    public function showUploadForm() {
        return view('admin.table.csv');
    }

    // Handle CSV upload and update the database
    public function uploadCsv(Request $request) {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);
    
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path), array_fill(0, count(file($path)), ';'));
    
        if (count($data) > 0) {
            $header = $data[0];
            unset($data[0]);
    
            foreach ($data as $row) {
                if (count($header) != count($row)) {
                    \Log::warning('Row skipped due to mismatch', ['row' => $row]);
                    continue;
                }
    
                $rowData = array_combine($header, $row);
    
                // Validate the data
                $validator = Validator::make($rowData, [
                    'entitas_usaha' => 'required|string',
                    'no_sertifikat' => 'required|string',
                    'masa_berlaku' => 'nullable|date',
                    'audit_awal' => 'nullable|date',
                    'pengawasan_audit_1' => 'nullable|date',
                    'pengawasan_audit_2' => 'nullable|date',
                    'perpanjangan' => 'nullable|date',
                ]);
    
                if ($validator->fails()) {
                    \Log::warning('Row skipped due to validation errors', ['errors' => $validator->errors()]);
                    continue;
                }
    
                // Perform update or create operation
                if (isset($rowData['id'])) {
                    client_database::updateOrCreate(
                        ['id' => $rowData['id']],
                        $rowData
                    );
                } else {
                    \Log::warning('Row skipped due to missing ID', ['row' => $rowData]);
                }
            }
        }
    
        return redirect()->back()->with('success', 'CSV data uploaded and database updated successfully.');
    }        
    
}
