<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Department;

class GuestLayout extends Component
{
    public $departments;

    public function __construct()
    {
        $this->departments = Department::all();
    }

    public function render(): View
    {
        return view('layouts.guest');
    }
}
