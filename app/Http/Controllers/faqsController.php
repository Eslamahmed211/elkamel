<?php

namespace App\Http\Controllers;

use App\Models\faq;
use Illuminate\Http\Request;

class faqsController extends Controller
{
    function index()
    {
        $faqs = faq::get();
        return view("admin/faqs/index", compact("faqs"));
    }

    function create()
    {
        return view("admin/faqs/create");
    }

    function edit(faq $faq)
    {
        return view("admin/faqs/edit", compact("faq"));
    }

    function store(Request $request)
    {
        $data = $request->validate([
            "answer" => "required|string",
            "question" => "required|string",
        ]);

        faq::create($data);
        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    function update(faq $faq, Request $request)
    {
        $data = $request->validate([
            "answer" => "required|string",
            "question" => "required|string",
        ]);
        $faq->update($data);
        return redirect()->back()->with("success", "تم التعديل بنجاح");
    }

    public function destroy(Request $request)
    {
        $faq = faq::findOrFail($request->faq_id);
        $faq->delete();
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }
}
