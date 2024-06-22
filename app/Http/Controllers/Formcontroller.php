<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index()
    {
        return Inertia::render('Forms/Index', [
            'formpost' => route('form.post'),
            'name' => session('name'),
            'email' => session('email'),
            'success' => session('success'),
            'image' => session('image'),
        ]);
    }

    public function show(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');

        if ($request->hasFile('profileimage')) {
            $image = $request->file('profileimage');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('uploads', $imageName, 'public');
            $path = Storage::url('uploads/' . $imageName);
        } else {
            $path = null;
        }

        return redirect()->route('form.get')->with([
            'success' => 'Form submitted successfully',
            'name' => $name,
            'email' => $email,
            'image' => $path,
        ]);
    }
}
