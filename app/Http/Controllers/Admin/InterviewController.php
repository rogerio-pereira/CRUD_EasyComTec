<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InterviewRequest;
use App\Models\Interview;
use App\Services\InterviewService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InterviewController extends Controller
{
    private $model;
    private $service;

    public function __construct(Interview $model)
    {
        $this->model = $model;
        $this->service = new InterviewService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviews = $this->model
                            ->where('where', '>=', now())
                            ->orderBy('appointment')
                            ->paginate();

        return view('admin.interviews.index', compact('interviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterviewRequest $request)
    {
        $data = $request->all();
        $data['appointment'] = Carbon::parse($data['appointment']);

        $this->service->store($data);

        Session::flash('message', ['Interview saved successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.interviews.index');
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
        $interview = $this->model->find($id);

        return view('admin.interviews.edit', compact('interview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InterviewRequest $request, $id)
    {
        $data = $request->all();
        $data['appointment'] = Carbon::parse($data['appointment']);
        
        $interview = $this->model->find($id);

        $this->service->update($data, $id);

        Session::flash('message', ['Interview updated successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.interviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->service->destroy($id);

        Session::flash('message', ['Interview deleted successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.interviews.index');
    }
}
