<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\HeroSlideContent;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $departments = Department::all();
        $slideContents = HeroSlideContent::all();
        return view('welcome', compact('departments', 'slideContents'));
    }
}
