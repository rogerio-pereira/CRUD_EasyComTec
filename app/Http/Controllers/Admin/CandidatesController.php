<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankInformation;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CandidatesController extends Controller
{
    private $model;

    public function __construct(Candidate $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $bankInformation = $data['bank'];
        $knowledge = $data['knowledge'];

        unset($data['bank']);
        unset($data['knowledge']);

        $data['availability'] = implode('; ', $data['availability']);
        $data['best_time'] = implode('; ', $data['best_time']);

        $candidate = $this->model->create($data);
        $candidate->bankInformation()->save(new BankInformation($bankInformation));

        Session::flash('message', ['Application saved successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
