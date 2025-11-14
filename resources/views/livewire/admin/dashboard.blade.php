<div class="p-4">
    {{-- Sección 1: Métricas Globales del Sistema LMS --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-chart-pie mr-2 text-indigo-600"></i>
            Métricas Globales del Sistema LMS
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            {{-- Card 1: Total de Cursos --}}
            <x-wire-card class="bg-gradient-to-br from-indigo-500 to-indigo-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-book text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $totalCourses }}</h3>
                    <p class="text-indigo-100 text-sm font-medium">
                        Total de Cursos
                    </p>
                    <p class="text-indigo-200 text-xs mt-1">
                        {{ $publishedCourses }} publicados
                    </p>
                </div>
            </x-wire-card>

            {{-- Card 2: Total de Estudiantes --}}
            <x-wire-card class="bg-gradient-to-br from-blue-500 to-blue-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-user-graduate text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $totalStudents }}</h3>
                    <p class="text-blue-100 text-sm font-medium">
                        Estudiantes Registrados
                    </p>
                    <p class="text-blue-200 text-xs mt-1">
                        +{{ $newStudentsThisWeek }} esta semana
                    </p>
                </div>
            </x-wire-card>

            {{-- Card 3: Total de Inscripciones --}}
            <x-wire-card class="bg-gradient-to-br from-green-500 to-green-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-clipboard-list text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $totalEnrollments }}</h3>
                    <p class="text-green-100 text-sm font-medium">
                        Inscripciones Totales
                    </p>
                    <p class="text-green-200 text-xs mt-1">
                        {{ $activeStudents }} activos
                    </p>
                </div>
            </x-wire-card>

            {{-- Card 4: Certificados Emitidos --}}
            <x-wire-card class="bg-gradient-to-br from-orange-500 to-orange-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-certificate text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $totalCertificates }}</h3>
                    <p class="text-orange-100 text-sm font-medium">
                        Certificados Emitidos
                    </p>
                    <p class="text-orange-200 text-xs mt-1">
                        {{ $recentCertificates }} últimos 7 días
                    </p>
                </div>
            </x-wire-card>

            {{-- Card 5: Tasa de Finalización --}}
            <x-wire-card class="bg-gradient-to-br from-purple-500 to-purple-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm mb-3">
                        <i class="fas fa-percentage text-3xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold mb-1">{{ $completionRate }}%</h3>
                    <p class="text-purple-100 text-sm font-medium">
                        Tasa de Finalización
                    </p>
                    <p class="text-purple-200 text-xs mt-1">
                        {{ $completedThisMonth }} este mes
                    </p>
                </div>
            </x-wire-card>
        </div>
    </div>

    {{-- Sección 2: Cursos Más Populares --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-fire mr-2 text-red-600"></i>
            Cursos Más Populares
        </h2>

        <x-wire-card>
            @if($popularCourses->count() > 0)
                <div class="space-y-4">
                    @foreach($popularCourses as $course)
                        <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg hover:shadow-md transition-all duration-300">
                            <div class="flex-shrink-0 w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-book text-indigo-600 dark:text-indigo-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $course->title }}
                                </h3>
                                <div class="flex items-center mt-1 space-x-4 text-sm text-gray-600 dark:text-gray-400">
                                    <span>
                                        <i class="fas fa-signal mr-1"></i>
                                        {{ ucfirst($course->level) }}
                                    </span>
                                    @if($course->category)
                                        <span>
                                            <i class="fas fa-folder mr-1"></i>
                                            {{ $course->category->name }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                                    {{ $course->enrollments_count }}
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    Inscripciones
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                    <i class="fas fa-inbox text-4xl mb-3"></i>
                    <p>No hay cursos publicados aún</p>
                </div>
            @endif
        </x-wire-card>
    </div>

    {{-- Sección 3: Acciones Rápidas --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-bolt mr-2 text-yellow-600"></i>
            Acciones Rápidas
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Acción 1: Gestionar Cursos --}}
            <x-wire-card class="hover:shadow-xl transition-all duration-300 border-l-4 border-indigo-500 cursor-pointer group">
                <a href="#" class="block">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-book text-2xl text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Gestionar Cursos
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Ver y editar cursos
                            </p>
                        </div>
                    </div>
                </a>
            </x-wire-card>

            {{-- Acción 2: Ver Estudiantes --}}
            <x-wire-card class="hover:shadow-xl transition-all duration-300 border-l-4 border-blue-500 cursor-pointer group">
                <a href="#" class="block">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-users text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Ver Estudiantes
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Gestionar estudiantes
                            </p>
                        </div>
                    </div>
                </a>
            </x-wire-card>

            {{-- Acción 3: Ver Inscripciones --}}
            <x-wire-card class="hover:shadow-xl transition-all duration-300 border-l-4 border-green-500 cursor-pointer group">
                <a href="#" class="block">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-green-100 dark:bg-green-900 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-clipboard-list text-2xl text-green-600 dark:text-green-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Ver Inscripciones
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Gestionar inscripciones
                            </p>
                        </div>
                    </div>
                </a>
            </x-wire-card>

            {{-- Acción 4: Ver Reportes --}}
            <x-wire-card class="hover:shadow-xl transition-all duration-300 border-l-4 border-orange-500 cursor-pointer group">
                <a href="#" class="block">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-orange-100 dark:bg-orange-900 rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                            <i class="fas fa-chart-bar text-2xl text-orange-600 dark:text-orange-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1">
                                Ver Reportes
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Análisis y estadísticas
                            </p>
                        </div>
                    </div>
                </a>
            </x-wire-card>
        </div>
    </div>

    {{-- Sección 4: Inscripciones Recientes --}}
    <div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-history mr-2 text-gray-600"></i>
            Inscripciones Recientes
        </h2>

        <x-wire-card>
            @if($recentEnrollments->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="border-b border-gray-200 dark:border-gray-700">
                            <tr class="text-left text-sm text-gray-600 dark:text-gray-400">
                                <th class="pb-3 font-semibold">Estudiante</th>
                                <th class="pb-3 font-semibold">Curso</th>
                                <th class="pb-3 font-semibold">Fecha Inscripción</th>
                                <th class="pb-3 font-semibold">Progreso</th>
                                <th class="pb-3 font-semibold">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($recentEnrollments as $enrollment)
                                <tr class="text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    <td class="py-3">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-user text-indigo-600 dark:text-indigo-400 text-xs"></i>
                                            </div>
                                            <span class="font-medium">{{ $enrollment->user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <span class="font-medium">{{ $enrollment->course->title }}</span>
                                    </td>
                                    <td class="py-3">
                                        <div>
                                            <div class="font-medium">{{ $enrollment->enrolled_at->format('d/m/Y') }}</div>
                                            <div class="text-xs text-gray-500">{{ $enrollment->enrolled_at->format('H:i') }}</div>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        <div class="flex items-center">
                                            <div class="w-24 bg-gray-200 dark:bg-gray-700 rounded-full h-2 mr-2">
                                                <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $enrollment->progress }}%"></div>
                                            </div>
                                            <span class="text-xs font-medium">{{ number_format($enrollment->progress, 0) }}%</span>
                                        </div>
                                    </td>
                                    <td class="py-3">
                                        @if($enrollment->status === 'completed')
                                            <x-wire-badge flat positive label="Completado" />
                                        @elseif($enrollment->status === 'in_progress')
                                            <x-wire-badge flat info label="En Progreso" />
                                        @else
                                            <x-wire-badge flat warning label="Abandonado" />
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                    <i class="fas fa-inbox text-4xl mb-3"></i>
                    <p>No hay inscripciones recientes</p>
                </div>
            @endif
        </x-wire-card>
    </div>
</div>
