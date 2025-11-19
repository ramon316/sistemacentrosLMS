<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // Métricas básicas del sistema
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalRegularUsers = User::where('role', 'user')->count();

        // Nuevos usuarios esta semana
        $newUsersThisWeek = User::where('created_at', '>=', now()->startOfWeek())->count();

        // Nuevos usuarios este mes
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Usuarios recientes (últimos 10)
        $recentUsers = User::latest('created_at')
            ->limit(10)
            ->get();

        return view('livewire.admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalRegularUsers' => $totalRegularUsers,
            'newUsersThisWeek' => $newUsersThisWeek,
            'newUsersThisMonth' => $newUsersThisMonth,
            'recentUsers' => $recentUsers,
        ]);
    }
}
