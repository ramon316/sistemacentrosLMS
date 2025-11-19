<div class="p-4">
    {{-- Sección 1: Métricas Globales del Sistema --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-chart-pie mr-2 text-indigo-600"></i>
            Panel de Administración
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Card 1: Total de Usuarios --}}
            <x-wire-card class="bg-gradient-to-br from-indigo-500 to-indigo-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $totalUsers }}</h3>
                    <p class="text-indigo-100 text-sm font-medium">
                        Total de Usuarios
                    </p>
                    <p class="text-indigo-200 text-xs mt-1">
                        Registrados en el sistema
                    </p>
                </div>
            </x-wire-card>

            {{-- Card 2: Administradores --}}
            <x-wire-card class="bg-gradient-to-br from-blue-500 to-blue-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-user-shield text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $totalAdmins }}</h3>
                    <p class="text-blue-100 text-sm font-medium">
                        Administradores
                    </p>
                    <p class="text-blue-200 text-xs mt-1">
                        Con permisos de gestión
                    </p>
                </div>
            </x-wire-card>

            {{-- Card 3: Usuarios Regulares --}}
            <x-wire-card class="bg-gradient-to-br from-green-500 to-green-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-user text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $totalRegularUsers }}</h3>
                    <p class="text-green-100 text-sm font-medium">
                        Usuarios Regulares
                    </p>
                    <p class="text-green-200 text-xs mt-1">
                        +{{ $newUsersThisWeek }} esta semana
                    </p>
                </div>
            </x-wire-card>

            {{-- Card 4: Nuevos este Mes --}}
            <x-wire-card class="bg-gradient-to-br from-purple-500 to-purple-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-user-plus text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $newUsersThisMonth }}</h3>
                    <p class="text-purple-100 text-sm font-medium">
                        Nuevos este Mes
                    </p>
                    <p class="text-purple-200 text-xs mt-1">
                        {{ now()->format('F Y') }}
                    </p>
                </div>
            </x-wire-card>
        </div>
    </div>

    {{-- Sección 2: Acciones Rápidas --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-bolt mr-2 text-yellow-600"></i>
            Acciones Rápidas
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Acción 1: Gestionar Usuarios --}}
            <x-wire-card class="hover:shadow-xl transition-all duration-300 border-l-4 border-indigo-500 cursor-pointer group">
                <a href="#" class="block">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-users-cog text-2xl text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Gestionar Usuarios
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Ver y editar usuarios
                            </p>
                        </div>
                    </div>
                </a>
            </x-wire-card>

            {{-- Acción 2: Configuración --}}
            <x-wire-card class="hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500 cursor-pointer group">
                <a href="#" class="block">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-cog text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Configuración
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Ajustes del sistema
                            </p>
                        </div>
                    </div>
                </a>
            </x-wire-card>

            {{-- Acción 3: Ver Reportes --}}
            <x-wire-card class="hover:shadow-xl transition-all duration-300 border-l-4 border-green-500 cursor-pointer group">
                <a href="#" class="block">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-chart-bar text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Ver Reportes
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Estadísticas del sistema
                            </p>
                        </div>
                    </div>
                </a>
            </x-wire-card>
        </div>
    </div>

    {{-- Sección 3: Usuarios Recientes --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-history mr-2 text-gray-600"></i>
            Usuarios Recientes
        </h2>

        <x-wire-card>
            @if($recentUsers->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="border-b border-gray-200 dark:border-gray-700">
                            <tr class="text-left text-sm text-gray-600 dark:text-gray-400">
                                <th class="pb-3 font-semibold">Usuario</th>
                                <th class="pb-3 font-semibold">Email</th>
                                <th class="pb-3 font-semibold">Rol</th>
                                <th class="pb-3 font-semibold">Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($recentUsers as $user)
                                <tr class="text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    <td class="py-3">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-3 overflow-hidden">
                                                @if($user->profile_photo_path)
                                                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                                @else
                                                    <i class="fas fa-user text-indigo-600 dark:text-indigo-400"></i>
                                                @endif
                                            </div>
                                            <span class="font-medium">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <span class="text-gray-600 dark:text-gray-400">{{ $user->email }}</span>
                                    </td>
                                    <td class="py-3">
                                        @if($user->role === 'admin' || $user->role === 'superadmin')
                                            <x-wire-badge flat positive label="{{ ucfirst($user->role) }}" />
                                        @else
                                            <x-wire-badge flat info label="Usuario" />
                                        @endif
                                    </td>
                                    <td class="py-3">
                                        <div>
                                            <div class="font-medium">{{ $user->created_at->format('d/m/Y') }}</div>
                                            <div class="text-xs text-gray-500">{{ $user->created_at->format('H:i') }}</div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                    <i class="fas fa-inbox text-4xl mb-3"></i>
                    <p>No hay usuarios registrados</p>
                </div>
            @endif
        </x-wire-card>
    </div>
</div>
