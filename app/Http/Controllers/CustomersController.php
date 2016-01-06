<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Customers;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class CustomersController extends Controller
{

    public function __construct() {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customer = Customer::find($id);

        $titles = Title::where('customer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $allUsers = $this->getAllUsers($customer);

        return view("titles.index", compact('titles', 'allUsers', 'customer'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $customer = Customer::findOrFail($id);


        if ($customer->id != Auth::user()->id)
        {

            return redirect()->route("admin", Auth::user()->id);
        }

        return view('admin.create', compact('customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, $id)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user->name = $request->first_name . ' ' . $request->last_name;
//        $user->email= $request->email;
        $user->customer_id = $id;
//        $user->password = $request->password;
        $user->save();

        return redirect()->route('{id}.titles.index', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "vraća kontroller show";
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

    /**
     * @param $customer
     * @return array
     */
    private function getAllUsers($customer)
    {
        $users = User::where('customer_id', $customer->id)->get();

        $allUsers = ["Select"];
        $i = 0;
        for ($i; $i < count($users); $i++) {
            $allUsers[] = $users[$i]->name;
        }

        return $allUsers;
    }


}
