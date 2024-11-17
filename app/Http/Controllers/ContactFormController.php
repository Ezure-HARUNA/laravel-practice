<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Services\CheckFormService;
use App\Http\Requests\StoreContactRequest;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = ContactForm::search($search);
        // $contacts = ContactForm::select('id', 'name', 'title', 'created_at')
        //     ->get();
        //MEMO: ページネーション
        $contacts = $query->select('id', 'name', 'title', 'created_at')
            ->paginate(20);
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
    public function store(StoreContactRequest $request)
    {
        $request->merge(['is_edit' => false]); // フラグを追加
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
        $gender = CheckFormService::checkGender($contact);
        $age = CheckFormService::checkAge($contact);
        return view('contacts.show', compact('contact', 'gender', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //! edit: 更新画面の情報を取得するメソッド
    public function edit($id)
    {
        $contact = ContactForm::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //! update:更新処理を行うメソッド
    public function update(StoreContactRequest $request, $id)
    {
        $request->merge(['is_edit' => true]); // フラグを追加
        $contact = ContactForm::find($id);
        $contact->update([
            'name' => $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'url' => $request->url,
            'gender' => $request->gender,
            'age' => $request->age,
            'contact' => $request->contact,
        ]);
        //リダイレクト
        return to_route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactForm::find($id);
        $contact->delete();
        //リダイレクト
        return to_route('contacts.index');
    }
}
