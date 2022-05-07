<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use DataTables;
use Illuminate\Support\Str;

class ClientsController extends Controller
{
    protected $client = null;
    function __construct(Client $client) {
        $this->client = $client;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.clients");
    }

    public function getClients(Request $request) {
        if ($request->ajax()) {
            $data = Client::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('role_id', function($role){
                    return ($role->id == 1)
                        ? "Vendor"
                        : "Seller";
                })
                ->addColumn('action', function($data){
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditLocationData" data-id="'.$data->id.'"><i class=" fa fa-edit"></i>Edit</button>
                            <button type="button" data-id="'.$data->id.'" data-toggle="modal" data-target="#DeleteAlert" class="btn btn-danger btn-sm" id="getDeleteId"><i class="fa fa-trash"></i>Delete</button>';
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
        $request->request->remove('_token');
        $uuid = Str::uuid()->toString();
        $this->client->storeData(array_merge($request->all(),['uuid'=>$uuid]));
        return response()->json(['success'=>'Client added successfully']);
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
     * @param int $id
     * @return Response
     */
    public function edit(int $id): JsonResponse
    {
        $data = $this->client->findData($id);
        $html = '<div class="form-group">
                    <input type="text" class="form-control" name="first_name" placeholder="Enter firstname" autocomplete="off" maxlength="30">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Enter lastname" autocomplete="off" maxlength="30">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone_number" placeholder="Enter cell number" autocomplete="off">
                </div>
                <div class="form-group">
                    <select class="form-control" name="role_id">
                        <option value="">Select Role</option>
                        @foreach( [1=>"vendor","seller"] as $key => $client )
                            <option value="{{$key}}">{{$client}}</option>
                        @endforeach
                    </select>
                </div>';
                return response()->json(["html"=>$html]);
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
    public function destroy($id): JsonResponse
    {
        $deleted=$this->client->deleteData($id);
        if($deleted) {
            return response()->json([
                "code"=>1,
                "status"=>"Success",
                "message"=>"Record Deleted Successfully"
            ]);
        }
        return response()->json([
            "code"=>0,
            "status"=>"Error",
            "message"=>"Record Deleted Successfully"
        ]);
    }
}
