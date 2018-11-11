<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CandidateRequest;
use App\Models\BankInformation;
use App\Models\Candidate;
use App\Models\CandidateSkills;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $candidates = $this->model->paginate();

        return view('admin.candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::all();

        return view('index', compact('skills'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidateRequest $request)
    {
        $data = $request->all();
        $bankInformation = $data['bank'];
        $knowledges = $data['knowledge'];

        unset($data['bank']);
        unset($data['knowledge']);

        $data['availability'] = implode('; ', $data['availability']);
        $data['best_time'] = implode('; ', $data['best_time']);

        DB::beginTransaction();
            $candidate = $this->model->create($data);
            $candidate->bankInformation()->save(new BankInformation($bankInformation));

            foreach ($knowledges as $key => $knowledge) {
                if(is_numeric($key))
                    $candidate->skills()->save(new CandidateSkills(['skill_id' => $key,'rate' => $knowledge]));
                else
                    $candidate->skills()->save(new CandidateSkills(['other' => $knowledge]));
            }
        DB::commit();

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
        $candidate = $this->model->find($id);

        return view('admin.candidates.show', compact('candidate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = $this->model->find($id);
        $skills = Skill::all();

        return view('admin.candidates.edit', compact('candidate', 'skills'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CandidateRequest $request, $id)
    {
        $data = $request->all();
        $bankInformation = $data['bank'];
        $knowledges = $data['knowledge'];

        unset($data['bank']);
        unset($data['knowledge']);

        $data['availability'] = implode('; ', $data['availability']);
        $data['best_time'] = implode('; ', $data['best_time']);

        $candidate = $this->model->find($id);

        DB::beginTransaction();
            $candidate->fill($data)->save();

            $candidate->bankInformation()->delete();
            $candidate->bankInformation()->save(new BankInformation($bankInformation));
            
            $candidate->skills()->delete();
            foreach ($knowledges as $key => $knowledge) {
                if(is_numeric($key))
                    $candidate->skills()->save(new CandidateSkills(['skill_id' => $key,'rate' => $knowledge]));
                else
                    $candidate->skills()->save(new CandidateSkills(['other' => $knowledge]));
            }
        DB::commit();

        Session::flash('message', ['Candidate updated successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.candidates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->destroy($id);

        Session::flash('message', ['Candidate deleted successfully!']); 
        Session::flash('alert-type', 'alert-success'); 

        return redirect()->route('admin.candidates.index');
    }
}
