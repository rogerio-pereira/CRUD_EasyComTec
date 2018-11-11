<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillRequest;
use App\Models\CandidateSkills;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SkillController extends Controller
{
    private $model;

    public function __construct(Skill $model)
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
        $skills = $this->model->paginate();

        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkillRequest $request)
    {
        $data = $request->all();

        $this->model->create($data);

        Session::flash('message', ['Skill saved successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.skills.index');
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
        $skill = $this->model->find($id);

        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SkillRequest $request, $id)
    {
        $data = $request->all();
        $skill = $this->model->find($id);

        $skill->fill($data)->save();

        Session::flash('message', ['Skill updated successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
            CandidateSkills::where('skill_id', $id)->delete();
            $this->model->destroy($id);
        DB::commit();

        Session::flash('message', ['Skill deleted successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.skills.index');
    }
}
