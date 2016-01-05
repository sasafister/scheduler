<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Title;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TitlesController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customer = Customer::where('id', $id )->firstOrFail();

        /* if customer is not authenticated */

        if ($customer->id != Auth::user()->id)
        {
            return redirect()->route("admin", Auth::user()->id);
        }

        $titles = Title::where('customer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $allUsers = $this->getAllUsers($customer);

        return view("titles.index", compact('titles', 'allUsers', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Title $title, $id, User $user)
    {

        $title->title = $request->title;
        $title->time = $request->time;

        $userId = $user->where('customer_id', Auth::user()->id)->get()[($request->author)-1]->id;

        $title->user_id = $userId;
        $title->customer_id = Auth::user()->id;

        $title->save();

        return redirect()->route("{id}.titles.index", $id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $titleId)
    {
        $title = Title::findOrFail($titleId);

        $user = $title->user;

//        dd(count($user));

        return view('titles.edit', compact('title', 'user', 'id'));
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
    public function update(Request $request, $customerId, $id)
    {
        $title = Title::findOrFail($id);
        $title->update($request->all());

        return redirect()->route("{id}.titles.index", $customerId);

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

//        dd($users = User::where('customer_id', $customer->id)->get());


        $users = User::where('customer_id', $customer->id)->get();
        $allUsers = ["Select"];
        $i = 0;
        for ($i; $i < count($users); $i++) {
            $allUsers[] = $users[$i]->name;
        }
        return $allUsers;
    }
}
