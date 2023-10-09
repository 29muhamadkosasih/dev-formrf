<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class StudentSingle extends Component
{
    public function render()
    {
        return view('livewire.student-index',  [
            'students' => User::latest()->get(),
        ]);
    }
}