<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Centros de Capacitación - Plataforma LMS</title>
    <meta name="description" content="Plataforma de gestión de aprendizaje para centros de capacitación. Accede a cursos, certifica tus conocimientos y desarrolla tus habilidades profesionales.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Animaciones */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        /* Gradient background */
        .gradient-bg {
            background: linear-gradient(135deg, #800016 0%, #5603AD 50%, #8367C7 100%);
        }

        /* Glass effect */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">

    <!-- Navigation -->
    <nav class="absolute top-0 left-0 right-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/LOGO_SCCYC.png') }}" alt="Sistema Centros de Capacitación" class="h-12 w-auto">
                <span class="text-white font-bold text-xl hidden sm:inline">Sistema Centros de Capacitación</span>
            </div>
            @if (Route::has('login'))
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white hover:text-gray-200 transition px-4 py-2 rounded-lg border border-white/30 hover:bg-white/10">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-200 transition px-4 py-2 rounded-lg border border-white/30 hover:bg-white/10">
                            Iniciar Sesión
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white hover:text-gray-200 transition px-4 py-2 rounded-lg bg-white/20 hover:bg-white/30">
                                Registrarse
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="gradient-bg min-h-screen flex items-center justify-center px-6 py-20 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s;"></div>

        <div class="max-w-6xl mx-auto text-center relative z-10">
            <!-- Logo Principal -->
            <div class="mb-8 animate-fadeInUp flex justify-center">
                <img src="{{ asset('images/LOGO_SCCYC.png') }}" alt="Sistema Centros de Capacitación" class="h-40 w-auto drop-shadow-2xl">
            </div>

            <!-- Main Content -->
            <div class="text-white space-y-6 animate-fadeInUp" style="animation-delay: 0.2s;">
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                    Sistema Centros de <span class="text-[#CFCFCF]">Capacitación</span>
                </h1>
                <p class="text-xl sm:text-2xl text-gray-200 leading-relaxed max-w-4xl mx-auto">
                    Plataforma de gestión de aprendizaje diseñada para potenciar el desarrollo profesional y la capacitación continua de colaboradores.
                </p>

                <!-- Features Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-12 max-w-5xl mx-auto">
                    <div class="glass-effect rounded-xl p-6 text-center hover:bg-white/20 transition-all">
                        <div class="bg-white/20 backdrop-blur-lg w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Cursos Diversos</h3>
                        <p class="text-sm text-gray-300">Accede a contenido educativo especializado</p>
                    </div>

                    <div class="glass-effect rounded-xl p-6 text-center hover:bg-white/20 transition-all">
                        <div class="bg-white/20 backdrop-blur-lg w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Certificaciones</h3>
                        <p class="text-sm text-gray-300">Obtén certificados al completar tus cursos</p>
                    </div>

                    <div class="glass-effect rounded-xl p-6 text-center hover:bg-white/20 transition-all">
                        <div class="bg-white/20 backdrop-blur-lg w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Seguimiento</h3>
                        <p class="text-sm text-gray-300">Monitorea tu progreso de aprendizaje</p>
                    </div>

                    <div class="glass-effect rounded-xl p-6 text-center hover:bg-white/20 transition-all">
                        <div class="bg-white/20 backdrop-blur-lg w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Flexible</h3>
                        <p class="text-sm text-gray-300">Aprende a tu propio ritmo</p>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="pt-12 flex flex-col sm:flex-row gap-4 justify-center items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center space-x-2 bg-white text-[#800016] px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                                <span>Ir al Dashboard</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center space-x-2 bg-white text-[#800016] px-8 py-4 rounded-xl font-semibold text-lg hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                                <span>Iniciar Sesión</span>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-flex items-center space-x-2 glass-effect text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white/20 transition-all transform hover:scale-105 shadow-2xl">
                                    <span>Registrarse</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                    </svg>
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">¿Por qué elegir nuestro LMS?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Una plataforma completa para el desarrollo de competencias profesionales</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gradient-to-br from-[#800016] to-[#5603AD] rounded-2xl p-8 text-white transform hover:scale-105 transition-all shadow-xl">
                    <div class="bg-white/20 backdrop-blur-lg w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Contenido Especializado</h3>
                    <p class="text-white/90">Accede a cursos diseñados por expertos en diversas áreas de conocimiento profesional.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-gradient-to-br from-[#5603AD] to-[#8367C7] rounded-2xl p-8 text-white transform hover:scale-105 transition-all shadow-xl">
                    <div class="bg-white/20 backdrop-blur-lg w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Certificación Oficial</h3>
                    <p class="text-white/90">Obtén certificados válidos que avalan tus conocimientos y competencias adquiridas.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-gradient-to-br from-[#8367C7] to-[#545643] rounded-2xl p-8 text-white transform hover:scale-105 transition-all shadow-xl">
                    <div class="bg-white/20 backdrop-blur-lg w-16 h-16 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Aprendizaje Flexible</h3>
                    <p class="text-white/90">Estudia a tu ritmo, desde cualquier lugar y en cualquier momento que te convenga.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6 bg-gradient-to-r from-[#800016] via-[#5603AD] to-[#8367C7]">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6">Comienza tu Camino de Aprendizaje</h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Regístrate hoy y accede a una amplia variedad de cursos diseñados para impulsar tu desarrollo profesional.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                @if (Route::has('login'))
                    @guest
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center space-x-2 bg-white text-[#800016] px-10 py-5 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            <span>Crear Cuenta</span>
                        </a>
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center space-x-2 glass-effect text-white px-10 py-5 rounded-xl font-bold text-xl hover:bg-white/20 transition-all transform hover:scale-105 shadow-2xl border-2 border-white/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Iniciar Sesión</span>
                        </a>
                    @else
                        <a href="{{ url('/dashboard') }}"
                           class="inline-flex items-center space-x-2 bg-white text-[#800016] px-10 py-5 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all transform hover:scale-105 shadow-2xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                            <span>Ir a mis Cursos</span>
                        </a>
                    @endguest
                @endif
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <div class="flex items-center justify-center space-x-3 mb-4">
                <img src="{{ asset('images/LOGO_SCCYC.png') }}" alt="Sistema Centros de Capacitación" class="h-12 w-auto">
            </div>
            <h3 class="font-bold text-xl mb-2">Sistema Centros de Capacitación</h3>
            <p class="text-gray-400 mb-4">Plataforma de gestión de aprendizaje para el desarrollo profesional</p>
            <div class="text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} Sistema Centros de Capacitación. Todos los derechos reservados.</p>
                <p class="mt-2">Created by Nexusolutions MG</p>
            </div>
        </div>
    </footer>

</body>
</html>
