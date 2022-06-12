<?php

namespace App\Controllers;

use App\Models\SuratDuaModel;
use App\Models\SuratModel;
use CodeIgniter\I18n\Time;
use TCPDF;

class Formulir extends BaseController
{
    public function __construct()
    {
        $this->suratModel = new SuratModel();
        $this->suratDuaModel = new SuratDuaModel();
    }
    public function index()
    {
        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir'
        ];

        return view('/admin/dataformulir/index', $data);
    }
    public function skck()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surat = $this->suratModel->cariSurat($keyword);
        } else {
            $surat = $this->suratModel->cariSurat();
        }

        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir',
            'key'       => $keyword,
            'surat'    => $surat
        ];

        return view('/admin/dataformulir/skck', $data);
    }
    public function suket()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surat = $this->suratModel->cariSuket($keyword);
        } else {
            $surat = $this->suratModel->cariSuket();
        }
        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir',
            'key'       => $keyword,
            'surat'    => $surat
        ];

        return view('/admin/dataformulir/suket', $data);
    }
    public function sukem()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surat = $this->suratDuaModel->cariSukem($keyword);
        } else {
            $surat = $this->suratDuaModel->cariSukem();
        }
        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir',
            'key'       => $keyword,
            'surat'    => $surat
        ];

        return view('/admin/dataformulir/sukem', $data);
    }
    public function sukel()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $surat = $this->suratDuaModel->cariSukel($keyword);
        } else {
            $surat = $this->suratDuaModel->cariSukel();
        }
        $data = [
            'navbar'    => 'formulir',
            'title'     => 'Data Formulir',
            'key'       => $keyword,
            'surat'    => $surat
        ];

        return view('/admin/dataformulir/sukel', $data);
    }

    public function viewsk($id)
    {
        $surat = $this->suratModel->viewSurat($id);

        $this->suratModel->where('id_surat', $id)->set(['status' => '0'])->update();

        $data = [
            'navbar'        => 'surat',
            'title'         => 'view',
            'keterangan'    => 'suket',
            'surat'         => $surat
        ];
        return view('/admin/dataformulir/view', $data);
    }

    public function viewskck($id)
    {
        $surat = $this->suratModel->viewSurat($id);
        $this->suratModel->where('id_surat', $id)->set(['status' => '0'])->update();
        $data = [
            'navbar'        => 'surat',
            'title'         => 'view',
            'keterangan'    => 'skck',
            'surat'         => $surat
        ];
        return view('/admin/dataformulir/view', $data);
    }
    public function viewsukem($id)
    {
        $surat = $this->suratDuaModel->viewSurat($id);
        $this->suratDuaModel->where('id_surat', $id)->set(['status' => '0'])->update();
        $data = [
            'navbar'        => 'surat',
            'title'         => 'view',
            'keterangan'    => 'skm',
            'surat'         => $surat
        ];
        return view('/admin/dataformulir/viewKedua', $data);
    }
    public function viewsukel($id)
    {
        $surat = $this->suratDuaModel->viewSurat($id);
        $this->suratDuaModel->where('id_surat', $id)->set(['status' => '0'])->update();
        $data = [
            'navbar'        => 'surat',
            'title'         => 'view',
            'keterangan'    => 'skl',
            'surat'         => $surat
        ];
        return view('/admin/dataformulir/viewKedua', $data);
    }

    public function delete($id)
    {
        $this->suratModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus');
        return redirect()->back();
    }
    public function deleteKedua($id)
    {
        $this->suratDuaModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil DiHapus');
        return redirect()->back();
    }

    public function downloadsuket()
    {
        $id = $this->request->getGet('id');
        $surat = $this->suratModel->viewSurat($id);
        $tanggal = Time::now();
        $tahun = $tanggal->toLocalizedString("yyyy");

        $tanggalLahir = Time::parse($surat['tanggal_lahir']);
        $lahir = $tanggalLahir->toLocalizedString('dd MMMM yyyy');

        $ttd = Time::parse($surat['created_at']);
        $tanggal_surat = $ttd->toLocalizedString('dd MMM yyyy');
        // dd($lahir);

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetAuthor('KesimanTengah');

        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(18, 12, 18);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------


        $pdf->AddPage('P', 'F4');
        // add a page
        $html = '
        <body style="font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif; font-size: 14px; padding: 0; margin: 0;">
        <!-- header -->
    
        <table class="header">
        <tr>
            <td class="logo">
                <img src="/img/logo_2.jpg" width="100" height="100">
            </td>
            <td class="warp" style="width: 500px;" colspan="3">
                <div class="title"
                    style="display: flex; justify-content: center; flex-direction: column; text-align: center">
                    <span style="font-weight: 900; font-size: 20px;">PEMERINTAH KABUPATEN MOJOKERTO</span><br>
                    <span style="font-weight: 900; font-size: 20px;">KECAMATAN PACET</span><br>
                    <span style="font-weight: bold; font-size: 22px;">DESA KESIMANTENGAH</span><br>
                    <span style="font-weight: 400; font-size: 14px;">Alamat: Jl. Candi. Nomor: 01. Kode Post:
                        61374</span>
                </div>
            </td>
            <td colspan="2"></td>
        </tr>
        </table>
        <br>
        <hr color="black">
        <div class="kepalasurat" style="height: 200px; width: 100%; text-align:center">
            <div class="warp">
                <span style="text-decoration: underline; font-weight: bold; font-size: 20px;">SURAT KETERANGAN</span><br>
                <table style="font-weight: bold; font-size: 16px;">
                <tr>
                    <td colspan="4"></td>
                    <td width="40px" colspan="8">NO. </td>
                    <td width="200px" coslpan="12">/ 169 / 416-303.3 / ' . $tahun . '</td>
                </tr>
                </table><br>
            </div>
        </div>
        <table class="kontent" style="font-size: 14px; font-weight: 400;">
            <tr>
                <td colspan="1"></td>
                <td colspan="14" height="25px"><span style="margin-left:50px;">Yang bertandatangan di bawah ini:</span></td>
            </tr>
        </table>
        <table class="kontent" style="font-size: 14px; font-weight: 400;" cellspacing="10">
            <tr class="warp">
                <td class="title" width="150px">
                    A. Nama
                </td>
                <td width="20px">
                    :
                </td>
                <td style="font-weight: bold;" width="450px">
                    BANGGA AL HAKIM
                </td>
                </tr>
                <tr class="warp">
                <td class="title">
                    B. Jabatan
                </td>
                <td>
                    :
                </td>
                <td>
                    Kepala Desa Kesimantengah
                </td>
            </tr>
        </table>
        <table class="kontent" style="font-size: 14px; font-weight: 400;">
            <tr>
                <td colspan="1"></td>
                <td colspan="14" height="25px">Dengan Ini menerangkan dengan sebenarnya bahwa:</td>
            </tr>
        </table>
        <table class="kontent" style="font-size: 14px; font-weight: 400;" cellspacing="10">
            <tr class="warp">
                <td class="title" width="150px">
                    A. Nama
                </td>
                <td width="20px">
                    :
                </td>
                <td style="font-weight: bold;" width="400px">
                    ' . $surat['nama_lengkap'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    B. Tempat/ Tgl.Lahir
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat["tempat"] . ', ' . $lahir . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    C. NIK
                </td>
                <td>
                    :
                </td>
                <td style="font-weight: bold;">
                    ' . $surat['nik'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    D. Jenis Kelamin
                </td>
                <td style="margin-left: 35px;">
                    :
                </td>
                <td>
                    ' . $surat['jenis_kelamin'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    E. Pekerjaan
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['pekerjaan'] . '.
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    F. Status
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['status_perkawinan'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    G. Agama
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['agama'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    H. Alamat
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['alamat'] . '.
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    Maksud
                </td>
                <td>
                    :
                </td>
                <td>
                    <span>' . $surat['maksud'] . '.</span>
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    Tujuan
                </td>
                <td>
                    :
                </td>
                <td style=" font-weight: bold;">
                    ' . $surat['tujuan'] . '.
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-indent: 45px; padding: 20px;">Demikian Surat Keterangan ini dibuat dengan sebenarnya agar dapat dipergunakan sebagaimana mestinya.</p>
                </td>
            </tr>
        </table>
        <br><br>
        <br><br>
        <table>
            <tr>
                <td colspan="1"></td>
                <td colspan="5"></td>
                <td colspan="3">Kesimantengah, ' . $tanggal_surat . '</td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="5">Yang bersangkutan</td>
                <td colspan="3">Kepala Desa Kesimantengah</td>
            </tr>
        </table>
        <br><br><br><br><br>
        <table>
            <tr>
                <td colspan="1"></td>
                <td colspan="5"><span style="text-decoration: underline; font-weight: bold;">' . $surat['nama_lengkap'] . '</span></td>
                <td colspan="3"><span style="text-decoration: underline; font-weight: bold;">BANGGA AL HAKIM</span></td>
            </tr>
        </table>
    </body>';

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');


        $this->response->setContentType('application/pdf');

        // ---------------------------------------------------------

        //Close and output PDF document
        $pdf->Output('Surat_Keterangan_No.' . $surat['id_surat'] . '.pdf', 'D');
    }
    public function downloadskck()
    {
        $id = $this->request->getGet('id');
        $surat = $this->suratModel->viewSurat($id);
        $tanggal = Time::now();
        $tahun = $tanggal->toLocalizedString("yyyy");

        $tanggalLahir = Time::parse($surat['tanggal_lahir']);
        $lahir = $tanggalLahir->toLocalizedString('dd MMMM yyyy');

        $ttd = Time::parse($surat['created_at']);
        $tanggal_surat = $ttd->toLocalizedString('dd MMM yyyy');
        // dd($lahir);

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetAuthor('KesimanTengah');

        // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(18, 12, 18);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // ---------------------------------------------------------


        $pdf->AddPage('P', 'F4');
        // add a page
        $html = '
        <body style="font-family: TimesNewRoman, "Times New Roman", Times, Baskerville, Georgia, serif; font-size: 14px; padding: 0; margin: 0;">
        <!-- header -->
    
        <table class="header">
        <tr>
            <td class="logo">
                <img src="/img/logo_2.jpg" width="100" height="100">
            </td>
            <td class="warp" style="width: 500px;" colspan="3">
                <div class="title"
                    style="display: flex; justify-content: center; flex-direction: column; text-align: center">
                    <span style="font-weight: 900; font-size: 20px;">PEMERINTAH KABUPATEN MOJOKERTO</span><br>
                    <span style="font-weight: 900; font-size: 20px;">KECAMATAN PACET</span><br>
                    <span style="font-weight: bold; font-size: 22px;">DESA KESIMANTENGAH</span><br>
                    <span style="font-weight: 400; font-size: 14px;">Alamat: Jl. Candi. Nomor: 01. Kode Post:
                        61374</span>
                </div>
            </td>
            <td colspan="2"></td>
        </tr>
        </table>
        <br>
        <hr color="black">
        <div class="kepalasurat" style="height: 200px; width: 100%; text-align:center">
            <div class="warp">
                <span style="text-decoration: underline; font-weight: bold; font-size: 20px;">SURAT KETERANGAN CATATAN KEPOLISIAN</span><br>
                <table style="font-weight: bold; font-size: 16px;">
                <tr>
                    <td colspan="4"></td>
                    <td width="40px" colspan="8">NO. </td>
                    <td width="200px" coslpan="12">/ 169 / 416-303.3 / ' . $tahun . '</td>
                </tr>
                </table><br>
            </div>
        </div>
        <table class="kontent" style="font-size: 14px; font-weight: 400;">
            <tr>
                <td colspan="1"></td>
                <td colspan="14" height="25px"><span style="margin-left:50px;">Yang bertandatangan di bawah ini:</span></td>
            </tr>
        </table>
        <table class="kontent" style="font-size: 14px; font-weight: 400;" cellspacing="10">
            <tr class="warp">
                <td class="title" width="150px">
                    A. Nama
                </td>
                <td width="20px">
                    :
                </td>
                <td style="font-weight: bold;" width="450px">
                    BANGGA AL HAKIM
                </td>
                </tr>
                <tr class="warp">
                <td class="title">
                    B. Jabatan
                </td>
                <td>
                    :
                </td>
                <td>
                    Kepala Desa Kesimantengah
                </td>
            </tr>
        </table>
        <table class="kontent" style="font-size: 14px; font-weight: 400;">
            <tr>
                <td colspan="1"></td>
                <td colspan="14" height="25px">Dengan Ini menerangkan dengan sebenarnya bahwa:</td>
            </tr>
        </table>
        <table class="kontent" style="font-size: 14px; font-weight: 400;" cellspacing="10">
            <tr class="warp">
                <td class="title" width="150px">
                    A. Nama
                </td>
                <td width="20px">
                    :
                </td>
                <td style="font-weight: bold;" width="400px">
                    ' . $surat['nama_lengkap'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    B. Tempat/ Tgl.Lahir
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat["tempat"] . ', ' . $lahir . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    C. NIK
                </td>
                <td>
                    :
                </td>
                <td style="font-weight: bold;">
                    ' . $surat['nik'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    D. Jenis Kelamin
                </td>
                <td style="margin-left: 35px;">
                    :
                </td>
                <td>
                    ' . $surat['jenis_kelamin'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    E. Pekerjaan
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['pekerjaan'] . '.
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    F. Status
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['status_perkawinan'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    G. Agama
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['agama'] . '
                </td>
            </tr>
            <tr class="warp">
                <td class="title">
                    H. Alamat
                </td>
                <td>
                    :
                </td>
                <td>
                    ' . $surat['alamat'] . '.
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-indent: 45px;">Sepanjang pengetahuan kami orang tersebut diatas sampai saat ini <strong>BERADAT ISTIADAT /BERKELAKUAN BAIK </strong> dan belum pernah tersangkut Urusan Kepolisian.</p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-indent: 45px;">Surat keterangan ini dipergunakan untuk :</p>
                    <p style="text-indent: 160px; "><strong>PERSYARATAN MELAMAR KERJA.</strong></p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="text-indent: 45px;">Demikian surat keterangan ini kami buat dengan sebenarnya dan dapat di pergunakan oleh yang bersangkutan sebagaimana mestinya.</p>
                </td>
            </tr>
        </table>
        <br><br>
        <table>
            <tr>
                <td colspan="1"></td>
                <td colspan="5"></td>
                <td colspan="3">Kesimantengah, ' . $tanggal_surat . '</td>
            </tr>
            <tr>
                <td colspan="1"></td>
                <td colspan="5">Yang bersangkutan</td>
                <td colspan="3">Kepala Desa Kesimantengah</td>
            </tr>
        </table>
        <br><br><br><br><br>
        <table>
            <tr>
                <td colspan="1"></td>
                <td colspan="5"><span style="text-decoration: underline; font-weight: bold;">' . $surat['nama_lengkap'] . '</span></td>
                <td colspan="3"><span style="text-decoration: underline; font-weight: bold;">BANGGA AL HAKIM</span></td>
            </tr>
        </table>
    </body>';

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');


        $this->response->setContentType('application/pdf');

        // ---------------------------------------------------------

        //Close and output PDF document
        $pdf->Output('SKCK_No.' . $surat['id_surat'] . '.pdf', 'D');
    }
}