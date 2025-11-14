<?php

namespace App\Livewire\Admin;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // Métricas Globales del Sistema LMS
        $totalCourses = Course::count();
        $publishedCourses = Course::where('status', 'published')->count();
        $totalStudents = User::where('role', 'user')->count();
        $totalEnrollments = Enrollment::count();
        $totalCertificates = Certificate::count();

        // Cursos publicados recientemente (últimos 30 días)
        $recentlyPublishedCourses = Course::where('status', 'published')
            ->where('published_at', '>=', now()->subDays(30))
            ->count();

        // Estudiantes activos (con inscripciones en progreso)
        $activeStudents = Enrollment::where('status', 'in_progress')
            ->distinct('user_id')
            ->count('user_id');

        // Cursos completados este mes
        $completedThisMonth = Enrollment::where('status', 'completed')
            ->whereMonth('completed_at', now()->month)
            ->whereYear('completed_at', now()->year)
            ->count();

        // Nuevos estudiantes esta semana
        $newStudentsThisWeek = User::where('role', 'user')
            ->where('created_at', '>=', now()->startOfWeek())
            ->count();

        // Cursos más populares (top 5 por inscripciones)
        $popularCourses = Course::withCount('enrollments')
            ->where('status', 'published')
            ->orderBy('enrollments_count', 'desc')
            ->limit(5)
            ->get();

        // Inscripciones recientes (últimas 10)
        $recentEnrollments = Enrollment::with(['user', 'course'])
            ->latest('enrolled_at')
            ->limit(10)
            ->get();

        // Certificados emitidos recientemente (últimos 7 días)
        $recentCertificates = Certificate::where('issued_at', '>=', now()->subDays(7))
            ->count();

        // Tasa de finalización general
        $completedEnrollments = Enrollment::where('status', 'completed')->count();
        $completionRate = $totalEnrollments > 0
            ? round(($completedEnrollments / $totalEnrollments) * 100, 2)
            : 0;

        return view('livewire.admin.dashboard', [
            'totalCourses' => $totalCourses,
            'publishedCourses' => $publishedCourses,
            'totalStudents' => $totalStudents,
            'totalEnrollments' => $totalEnrollments,
            'totalCertificates' => $totalCertificates,
            'recentlyPublishedCourses' => $recentlyPublishedCourses,
            'activeStudents' => $activeStudents,
            'completedThisMonth' => $completedThisMonth,
            'newStudentsThisWeek' => $newStudentsThisWeek,
            'popularCourses' => $popularCourses,
            'recentEnrollments' => $recentEnrollments,
            'recentCertificates' => $recentCertificates,
            'completionRate' => $completionRate,
        ]);
    }
}
