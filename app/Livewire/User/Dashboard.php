<?php

namespace App\Livewire\User;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $user = auth()->user();

        // LMS Statistics - to be implemented
        $totalCourses = 0; // Total enrolled courses
        $completedCourses = 0; // Completed courses
        $inProgressCourses = 0; // In progress courses
        $certificates = 0; // Earned certificates

        return view('livewire.user.dashboard', [
            'user' => $user,
            'totalCourses' => $totalCourses,
            'completedCourses' => $completedCourses,
            'inProgressCourses' => $inProgressCourses,
            'certificates' => $certificates,
        ]);
    }
}
