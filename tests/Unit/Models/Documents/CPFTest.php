<?php

namespace Tests\Unit\Models\Documents;

use App\Models\Documents\CPF;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CPFTest extends TestCase
{
    public function testCorrectCPF()
    {
        $cpf = '454.254.587-38';
        $this->assertFalse(CPF::validate(null, $cpf, null));
    }

    public function testWrongCPFLenght()
    {
        $cpf = '1';
        $this->assertFalse(CPF::validate(null, $cpf, null));

        $cpf = '111111111111';
        $this->assertFalse(CPF::validate(null, $cpf, null));
    }

    public function testSequence()
    {
        $cpf = '11111111111';
        $this->assertFalse(CPF::validate(null, $cpf, null));
    }

    public function testWrongFirstDigit()
    {
        $cpf = '454.254.587-28';
        $this->assertFalse(CPF::validate(null, $cpf, null));
    }

    public function testWrongSecondDigit()
    {
        $cpf = '454.254.587-39';
        $this->assertFalse(CPF::validate(null, $cpf, null));
    }
}
