<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DataTables;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.clients");
    }

    public function getClients(Request $request) {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('role_id', function($role){
                    return ($role->id == 1)
                        ? "Vendor"
                        : "Seller";
                })
                ->addColumn('action', function($row){
                    return '<a href="javascript:void(0)" id='.$row->id.' class="edit btn btn-success btn-sm"><i class=" fa fa-edit"></i>Edit</a>
                            <a href="javascript:void(0)" id='.$row->id.' class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function addClient()
    {
        return view('pages.add-client');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(AddClientRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
