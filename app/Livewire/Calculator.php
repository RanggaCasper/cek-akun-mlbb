<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title("Calculator Win Rate Mobile Legends")]

class Calculator extends Component
{
    public $totalMatches;
    public $currentWinRate;
    public $requiredWinRate;
    public $result;
    public $errorMessage;

    protected $rules = [
        'totalMatches' => 'required|numeric|min:0',
        'currentWinRate' => 'required|numeric|between:0,100',
        'requiredWinRate' => 'required|numeric|between:0,100',
    ];

    public function store()
    {        
        $this->validate();

        $currentWins = $this->totalMatches * ($this->currentWinRate / 100);
        $currentLosses = $this->totalMatches - $currentWins;

        $remainingRate = 100 - $this->requiredWinRate;

        if ($remainingRate == 0) {
            $this->errorMessage = "Persentase win rate yang diperlukan tidak bisa 100%.";
            $this->result = null;
            return;
        }

        $multiplier = 100 / $remainingRate;
        $requiredLosses = $currentLosses * $multiplier;

        $this->result = round($requiredLosses - $this->totalMatches);
        $this->errorMessage = null;
    }

    public function render()
    {
        return view('livewire.calculator');
    }
}
