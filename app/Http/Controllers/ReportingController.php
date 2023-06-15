<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\RoomReservation;
use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\Exception\Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportingController extends Controller
{

  public function createReportingPDF(Request $request)
  {
    $roomReservation = RoomReservation::where('id', $request->id)->first();
    if ($roomReservation->status != 'Approved') {
      toast()->error('Belum disetujui');
      return redirect()->back();
    }

    $template_path = storage_path('app/public/template/surat_peminjaman_ruangan.docx');
    $values = $this->getValuesForTemplate($roomReservation);
    $path = $this->generateDocumentFromTemplate($template_path, $values);

    toast()->success('Berhasil membuat surat peminjaman ruangan', 'Berhasil');
    return response()->download($path);
  }


  private function getValuesForTemplate(RoomReservation $roomReservation)
  {
    $organization = $roomReservation->user->organization->name;
    $values = [
      'nomor_surat' => mt_rand(100000, 999999),
      'tanggal_pembuatan_surat' => Carbon::parse($roomReservation->created_at)->format('d-M-Y'),
      'tanggal_peminjaman' => Carbon::parse($roomReservation->start_date)->format('d-M-Y'),
      'nama_ruangan' => $roomReservation->room->name,
      'nama_organisasi' => $organization,
      'nama_kegiatan' => $roomReservation->keterangan,
      'waktu_peminjaman' => Carbon::parse($roomReservation->start_time)->format('H:i') . ' - ' . Carbon::parse($roomReservation->end_time)->format('H:i'),
      'waktu' => Carbon::parse($roomReservation->start_time)->format('H:i'),
      'nama' => $roomReservation->user->name,
      'nim' => $roomReservation->user->nomor_indux,
      'nomor_telpon' => '081234567890',
      'nama_kajur' => 'Dr. Eng. Nur Yan, S.T., M.T.',
      'nip_kajur' => '196908011997021001',
      'nama_presbem' => 'Gabriel',
      'ketua_umum_hmti' => 'Samidun',
      'nim_ketua_umum' => '2141729999',
      'nim_presbem' => '2141729999',
    ];
    return $values;
  }

  private function generateDocumentFromTemplate($template_path, $values)
  {
    $phpWord = new \PhpOffice\PhpWord\TemplateProcessor($template_path);
    $phpWord->setValues($values);

    // Your code to generate the document here...
    $phpWord->setValues($values);
    $phpWord->setImageValue('img', [
      'path' => 'https://logodownload.org/wp-content/uploads/2017/10/Starbucks-logo.png',
      'width' => 100,
      'height' => 100,
      'ratio' => true,
      'align' => 'center'
    ]);
    $phpWord->setImageValue('ttd', [
      'path' => 'https://upload.wikimedia.org/wikipedia/commons/0/04/Tanda_tangan_bapak.png',
      'width' => 100,
      'height' => 100,
      'ratio' => true,
      'align' => 'center'
    ]);
    $path = storage_path('app/public/documents/' . $values['nomor_surat'] . '_');
    $filename = $values['nama_kegiatan'] . '.docx';
    $phpWord->saveAs($path . $filename);

    return $path . $filename;
  }
}
