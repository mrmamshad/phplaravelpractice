<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index()
    {
        return Inertia::render('Forms/Index', [
            'formpost' => route('form.post')
        ]);
    }

    public function show(Request $request)
    {
        //  dd($request->all());

        $name = $request->input('name');
        $email = $request->input('email');
        // dd($name, $email);
        // Here you can handle the data, like saving it to the database

        // return redirect()->route('form.get')->with([
        //     'success', 'Form submitted successfully!',
        //     'name' => $name,
        //     'email' => $email
        // ]);
        return Inertia::render('Forms/Index', [
            'success'=> 'Form submitted successfully!',
            'name' => $name,
            'email' => $email
        ]);
    }
}
