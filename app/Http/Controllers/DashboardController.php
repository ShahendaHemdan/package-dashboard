<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MockExam;
use App\Models\Scenario;
use App\Models\Subscription;
use App\Models\Topic;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // Fetch statistics for courses
        $totalCourses = Course::count();
        $newCoursesThisMonth = Course::whereMonth('created_at', now()->month)->count();

        // Fetch statistics for users
        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)->count();
                        
        return view('index', compact(
            'totalCourses',
            'newCoursesThisMonth',
            'totalUsers',
            'newUsersThisMonth',
        ));
    }
}
