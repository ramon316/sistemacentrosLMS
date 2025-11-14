<div class="p-4">
    {{-- Bienvenida --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2">
            ¡Bienvenido, {{ $user->name }}!
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Sistema de Gestión de Aprendizaje - Centros de Capacitación
        </p>
    </div>

    {{-- Sección 1: Estadísticas Rápidas --}}
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">
            <i class="fas fa-chart-line mr-2 text-blue-600"></i>
            Mi Progreso de Aprendizaje
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Card 1: Total Cursos --}}
            <x-wire-card class="bg-gradient-to-br from-blue-500 to-blue-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-1">Cursos Inscritos</p>
                        <h3 class="text-4xl font-bold">{{ $totalCourses }}</h3>
                        <p class="text-blue-100 text-xs mt-2">
                            <i class="fas fa-book mr-1"></i>
                            Total
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-graduation-cap text-3xl"></i>
                    </div>
                </div>
            </x-wire-card>

            {{-- Card 2: Cursos en Progreso --}}
            <x-wire-card class="bg-gradient-to-br from-green-500 to-green-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium mb-1">En Progreso</p>
                        <h3 class="text-4xl font-bold">{{ $inProgressCourses }}</h3>
                        <p class="text-green-100 text-xs mt-2">
                            <i class="fas fa-spinner mr-1"></i>
                            Activos
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-tasks text-3xl"></i>
                    </div>
                </div>
            </x-wire-card>

            {{-- Card 3: Cursos Completados --}}
            <x-wire-card class="bg-gradient-to-br from-purple-500 to-purple-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium mb-1">Completados</p>
                        <h3 class="text-4xl font-bold">{{ $completedCourses }}</h3>
                        <p class="text-purple-100 text-xs mt-2">
                            <i class="fas fa-check-circle mr-1"></i>
                            Finalizados
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-check-double text-3xl"></i>
                    </div>
                </div>
            </x-wire-card>

            {{-- Card 4: Certificados --}}
            <x-wire-card class="bg-gradient-to-br from-orange-500 to-orange-600 text-white hover:shadow-xl transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-orange-100 text-sm font-medium mb-1">Certificados</p>
                        <h3 class="text-4xl font-bold">{{ $certificates }}</h3>
                        <p class="text-orange-100 text-xs mt-2">
                            <i class="fas fa-award mr-1"></i>
                            Obtenidos
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-certificate text-3xl"></i>
                    </div>
                </div>
            </x-wire-card>
        </div>
    </div>

    {{-- Sección 2: Cursos Disponibles --}}
    <div>
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                <i class="fas fa-book-open mr-2 text-purple-600"></i>
                Próximamente: Cursos Disponibles
            </h2>
        </div>

        {{-- Estado vacío --}}
        <x-wire-card>
            <div class="flex flex-col items-center justify-center py-12">
                <div class="w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-graduation-cap text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Sistema LMS en Construcción
                </h3>
                <p class="text-gray-500 dark:text-gray-400 text-center max-w-md">
                    Estamos preparando una amplia variedad de cursos para tu desarrollo profesional.<br>
                    Pronto podrás acceder a contenido especializado de capacitación.
                </p>
            </div>
        </x-wire-card>
    </div>
</div>
