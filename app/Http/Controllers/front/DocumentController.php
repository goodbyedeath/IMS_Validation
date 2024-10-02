<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\client_database;
use PhpOffice\PhpWord\TemplateProcessor;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class DocumentController extends Controller
{
    public function generateDocumentAsPDF($id)
    {
        // Fetch client data
        $client_databases = client_database::findOrFail($id);

        // Load the Word template
        $templateProcessor = new TemplateProcessor(storage_path('app/templates/Template_Clean.docx'));
        $templateProcessor->setValue('entitas_usaha', $client_databases->entitas_usaha);
        $templateProcessor->setValue('no_sertifikat', $client_databases->no_sertifikat);
        $templateProcessor->setValue('ruang_lingkup', $client_databases->ruang_lingkup);
        $templateProcessor->setValue('standar', $client_databases->standar);
        $templateProcessor->setValue('status_organisasi', $client_databases->status_organisasi);
        $templateProcessor->setValue('masa_berlaku', $client_databases->masa_berlaku);
        $templateProcessor->setValue('audit_awal', $client_databases->audit_awal);
        $templateProcessor->setValue('pengawasan_audit_1', $client_databases->pengawasan_audit_1);
        $templateProcessor->setValue('pengawasan_audit_2', $client_databases->pengawasan_audit_2);
        $templateProcessor->setValue('status_pengawasan_1', $client_databases->status_pengawasan_1);
        $templateProcessor->setValue('status_pengawasan_2', $client_databases->status_pengawasan_2);
        $templateProcessor->setValue('perpanjangan', $client_databases->perpanjangan);
        $templateProcessor->setValue('qr_code', $client_databases->qr_code);

        // Save the filled Word document as a temporary file
        $tempFilePath = storage_path('app/documents/temp_document.docx');
        $templateProcessor->saveAs($tempFilePath);

        // Instead of converting to HTML, create a Blade view for PDF
        $pdf = PDF::loadView('pdf', ['client' => $client_databases])
        ->setPaper('A4', 'portrait'); // Set A4 paper size and portrait orientation
        

        // Save the PDF file
        $outputPdfPath = storage_path('app/documents/' . $client_databases->entitas_usaha . '_IMS_certificate.pdf');
        $pdf->save($outputPdfPath);

         // Stream the PDF in the browser or download
         return $pdf->stream($client_databases->entitas_usaha . '_IMS_certificate.pdf');
    }
}
