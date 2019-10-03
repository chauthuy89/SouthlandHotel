<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title as Title;

class ClientController extends Controller
{
    public function __construct(Title $title)
    {
        $this->titles = $title->all();
    }

    public function index()
    {
        $data = [];
        $obj = new \stdClass;
        $obj->id = 1;
        $obj->title = 'mr';
        $obj->name = 'john';
        $obj->last_name = 'doe';
        $obj->email = 'john@domain.com';
        $data['clients'][] = $obj;

        $obj = new \stdClass;
        $obj->id = 2;
        $obj->title = 'ms';
        $obj->name = 'jane';
        $obj->last_name = 'doe';
        $obj->email = 'jane@another-domain.com';
        $data['clients'][] = $obj;

        return view('client/index', $data);
    }

    public function newClient(Request $request)
    {
        $data = [];
        $data['title'] = $request->input('title');
        $data['name'] = $request->input('name');
        $data['lastname'] = $request->input('lastname');
        $data['address'] = $request->input('address');
        $data['zipcode'] = $request->input('zipcode');
        $data['city'] = $request->input('city');
        $data['state'] = $request->input('state');
        $data['email'] = $request->input('email');

        if ($request->isMethod('post')){

            $this->validate(
                $request,[
                    'name' =>'required|min:5',
                    'lastname' =>'required',
                    'address' =>'required',
                    'zipcode' =>'required',
                    'city' =>'required',
                    'state' =>'required',
                    'email' =>'required'
                ]
            );
            //dd($data);
            return redirect('clients');
        }

        $data['titles'] = $this->titles;
        $data['modify'] = 0;
        return view('client/form', $data);
    }

    public function create()
    {

        return view('client/create');
    }

    public function show($client_id)
    {
        $data = [];
        $data['titles'] = $this->titles;
        $data['modify'] = 1;
        return view('client/form', $data);
    }


    public function di()
    {
        dd($this->titles);
    }

}
