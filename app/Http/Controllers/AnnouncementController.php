<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AnnouncementController extends Controller
{
    // pokaż wszystkie ogłoszenia
    public function index() {
        return view('announcements.index', [
            'announcements' => Announcement::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    public function show(Announcement $Announcement) {
        return view('announcements.show', [
            'Announcement' => $Announcement
        ]);
    }

    // form tworzenia
    public function create() {
        return view('announcements.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('announcements', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $formFields['user_id'] = auth()->id();

        Announcement::create($formFields);

        return redirect('/')->with('message', 'Announcement created successfully!');
    }

    // form do edytcji
    public function edit(Announcement $Announcement) {
        return view('announcements.edit', ['Announcement' => $Announcement]);
    }

    // aktualizowanie ogłoszenia
    public function update(Request $request, Announcement $Announcement) {
        // Make sure logged in user is owner
        if($Announcement->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $Announcement->update($formFields);

        return back()->with('message', 'Ogłoszenie zaaktualizowane pomyślnie!');
    }

    // Usuń ogłoszenie
    public function destroy(Announcement $Announcement) {
        // potwierdzenie, że osoba usuwająca ogłoszenie jest jego autorem
        if($Announcement->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $Announcement->delete();
        return redirect('/')->with('message', 'Ogłoszenie usunięte pomyślnie!');
    }

    // Zarządzaj ogłoszeniami
    public function manage() {
        return view('announcements.manage', ['announcements' => auth()->user()->announcements()->get()]);
    }
}
