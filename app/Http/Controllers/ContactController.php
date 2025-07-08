<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'layanan' => 'required|in:Foto keluarga,Foto wisuda,Pas foto,Foto pernikahan,Foto anak,Foto personal',
            'pesan' => 'required'
        ]);

        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function send(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'layanan' => 'required|in:Foto keluarga,Foto wisuda,Pas foto,Foto pernikahan,Foto anak,Foto personal',
            'catatan' => 'required'
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Pesan kamu udah terkirim!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Kontak berhasil dihapus.');
    }
}
