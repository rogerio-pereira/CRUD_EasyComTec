<?php

use App\Models\BankInformation;
use App\Models\Candidate;
use App\Models\CandidateSkills;
use App\Models\Interview;
use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Candidate::class, 5)->create()->each(function ($candidate) {
            $candidate->bankInformation()->save(factory(BankInformation::class)->make(['owner' => $candidate->name]));
            $candidate->interview()->save(factory(Interview::class)->make());

            for($i=1; $i<=28; $i++)
                $candidate->skills()->save(factory(CandidateSkills::class)->make(['skill_id' => $i]));
        });
    }
}
