<?php

namespace App\Services;

use App\Mail\Interview\CancelInterview;
use App\Mail\Interview\ChangeInterview;
use App\Mail\Interview\NewInterview;
use App\Models\Interview;
use Illuminate\Support\Facades\Mail;

class InterviewService
{
    private $model;

    public function __construct()
    {
        $this->model = new Interview();
    }

    public function store(array $data)
    {
        $interview = $this->model->create($data);

        $this->sendMail($interview->candidate->email, new NewInterview($interview));
    }

    public function update(array $data, $id)
    {
        $interview = $this->model->find($id);
        $interview->fill($data)->save();

        $this->sendMail($interview->candidate->email, new ChangeInterview($interview));
    }

    public function destroy($id)
    {
        $interview = $this->model->find($id);
        $this->model->destroy($id);

        $this->sendMail($interview->candidate->email, new CancelInterview($interview));
    }

    private function sendMail($email, $mail)
    {
        Mail::to($email)->send($mail);
    }
}