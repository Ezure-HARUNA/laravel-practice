<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contacts = ContactForm::select('id', 'name', 'title', 'created_at')
            ->get();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request, $request->name);
        ContactForm::create([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'name' => $request->name,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);
        //リダイレクト
        return to_route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = ContactForm::find($id);
        if ($contact->gender === 0) {
            $gender = '男性';
        } else {
            $gender = '女性';
        }
        if ($contact->age === 1) {
            $age = '～19歳';
        } else if ($contact->age === 2) {
            $age = '20～29歳';
        } else if ($contact->age === 3) {
            $age = '30～39歳';
        } else if ($contact->age === 4) {
            $age = '40～49歳';
        } else if ($contact->age === 5) {
            $age = '50～59歳';
        } else if ($contact->age === 6) {
            $age = '60歳以上';
        }
        return view('contacts.show', compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
