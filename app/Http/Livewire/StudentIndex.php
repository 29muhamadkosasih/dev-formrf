<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class StudentIndex extends Component
{
    public function render()
    {
        return view('livewire.student-index',  [
            'students' => User::latest()->get(),
        ]);
    }
}
