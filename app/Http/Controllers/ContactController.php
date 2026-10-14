<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(): View
    {
        return view('portfolio.contact');
    }

    public function store(StoreContactMessageRequest $request): RedirectResponse
    {
        ContactMessage::create($request->validated());
        return redirect()->back()->with('success', 'Pesan terkirim! Terima kasih telah menghubungi saya.');
    }
}
