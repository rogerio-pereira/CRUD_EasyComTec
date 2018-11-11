<?php

namespace Tests\Unit\Services;

use App\Mail\Interview\CancelInterview;
use App\Mail\Interview\ChangeInterview;
use App\Mail\Interview\NewInterview;
use App\Models\Candidate;
use App\Models\Interview;
use App\Services\InterviewService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class InterviewServiceTest extends TestCase
{
    private $service;
    private $candidate;
    private $data;

    public function setUp()
    {
        parent::setUp();

        $this->service = new InterviewService();

        $this->candidate = factory(Candidate::class)->create();
        $this->data = [
            'candidate_id' => $this->candidate->id, 
            'appointment' => Carbon::now()->addDays(1)
        ];
    }

    public function testStore()
    {
        Mail::fake();

        $this->service->store($this->data);

        $this->assertDatabaseHas('interviews', $this->data);

        Mail::assertSent(NewInterview::class);
    }

    public function testUpdate()
    {
        Mail::fake();

        $this->service->store($this->data);
        $this->assertDatabaseHas('interviews', $this->data);
        
        $this->data['appointment'] = Carbon::now()->addDays(2);
        $this->service->update($this->data, $this->candidate->interview->id);

        $this->assertDatabaseHas('interviews', $this->data);

        Mail::assertSent(ChangeInterview::class);
    }

    public function testDestroy()
    {
        Mail::fake();

        $interview = Interview::all()->first();
        
        $this->service->destroy($interview->id);

        Mail::assertSent(CancelInterview::class);
    }
}
