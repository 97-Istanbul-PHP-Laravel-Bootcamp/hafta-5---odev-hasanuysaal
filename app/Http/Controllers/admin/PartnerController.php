<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public $page_title = "Partnerler";

    // Partner listesi
    public function index()
    {
        $partnerCursor = Partner::paginate(10);

        $data_ = [
            'title' => $this->page_title,
            'partnerCursor' => $partnerCursor
        ];

        return view('admin.partner.index' , $data_);
    }

    // Ekleme veya Düzenleme Sayfası
    public function edit(Request $request)
    {
    }

    // Kaydetme Action
    public function save(Request $request)
    {
    }

    // Silme sayfası
    public function delete(Request $request)
    {
    }
}
