<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    function getfaqs()
    {
        $faqs = Faq::orderBy('created_at', 'DESC')->get();
        return view('Faqs.FaqsList', compact('faqs'));
    }

    function create()
    {
        return view('Faqs.FaqsCreateUpdate');
    }

    function add(Request $request)
    {

        $validateData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        Faq::create($validateData);
        return redirect(route('faqs.list'))->with('message', 'faqs created successfully');
    }

    function edit(Faq $faqs)
    {

        return view('Faqs.FaqsCreateUpdate', compact('faqs'));
    }
    function update(Request $request, Faq $faqs)
    {

        $validateData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faqs->update($validateData);
        return redirect(route('faqs.list'))->with('message', 'faqs updated successfully');
    }

    function delete(Faq $faqs)
    {
        $faqs->delete();
        return redirect(route('faqs.list'))->with('message', 'faqs deleted successfully');
    }
}
