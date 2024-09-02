<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Forms\CekMLBBForm;
use App\Http\Controllers\CodashopController;

class CekMLBB extends Component
{
    public $userId;
    public $zoneId;
    public $result = [];

    protected $rules = [
        'userId' => 'required|numeric|digits_between:6,10',
        'zoneId' => 'required|numeric|digits_between:4,5',
    ];

    public function store()
    {
        $this->validate();
        
        $codashop = new CodashopController();

        $this->result = $codashop->send($this->userId, $this->zoneId);
    }

    public function render()
    {
        return view('livewire.index');
    }
}
