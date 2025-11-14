# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Sistema Centros de Capacitación is a Laravel 12 Learning Management System (LMS) designed to manage professional training and development. The platform enables users to access courses, track learning progress, earn certifications, and manage their professional development journey. Built on a foundation adapted from an attendance tracking system, it maintains robust authentication and user management features.

## Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Livewire 3 + Tailwind CSS 3.4 + Flowbite
- **UI Components**: WireUI 2.4 + Rappasoft Livewire Tables 3.7
- **Authentication**: Laravel Jetstream 5.3 (Livewire stack) + Sanctum 4.0 (API tokens)
- **Database**: MySQL
- **Build Tool**: Vite 6
- **Testing**: PHPUnit 11

## Core Architecture

### Triple Interface System

The application has three distinct interfaces:

1. **Web Interface** (`routes/web.php`): Jetstream-powered dashboard with Livewire components
2. **Admin Interface** (`routes/admin.php`): Mounted at `/admin` prefix with `['web', 'auth']` middleware (configured in `bootstrap/app.php`), uses custom AdminLayout component
3. **API Interface** (`routes/api.php`): RESTful API with Sanctum authentication for mobile/external clients

### Key Models & Relationships

**Current Core Models:**
- **User**: Authenticatable with Sanctum tokens

**LMS Models (to be implemented):**
- **Course**: Training courses with content, duration, and requirements
- **Module**: Course content sections
- **Enrollment**: Student course registrations and progress tracking
- **Certificate**: Completion certificates for finished courses
- **Assessment**: Quizzes and evaluations
- **Progress**: Learning progress tracking

### API Authentication Flow

1. **Register/Login**: Returns Sanctum token with 2-hour expiry
2. **Token Usage**: Include as Bearer token in Authorization header
3. **Logout**: Deletes current access token
4. **Check Status**: Rotates token (deletes old, creates new with 2hr expiry)

## Development Commands

### Environment Setup
```bash
# Copy environment file (if not exists)
cp .env.example .env

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate

# Link storage
php artisan storage:link
```

### Development Server
```bash
# Start all services (server, queue, vite) concurrently
composer dev

# Or run individually:
php artisan serve          # Laravel dev server (port 8000)
php artisan queue:listen   # Queue worker
npm run dev                # Vite dev server
```

### Testing & Code Quality
```bash
# Run test suite (clears config first)
composer test

# Run Laravel Pint (code style fixer)
./vendor/bin/pint

# View real-time logs
php artisan pail
```

### Building for Production
```bash
# Build frontend assets
npm run build

# Optimize application
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Database Operations
```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Fresh migrations with seeding
php artisan migrate:fresh --seed

# Create new migration
php artisan make:migration create_table_name

# Create new seeder
php artisan make:seeder TableSeeder
```

### Code Generation
```bash
# Create controller (API)
php artisan make:controller api/ControllerName --api

# Create model with migration and factory
php artisan make:model ModelName -mf

# Create Livewire component
php artisan make:livewire ComponentName

# Create service class
php artisan make:class Services/ServiceName
```

## Important Configuration

### Localization
- Default locale: Spanish (`es`)
- Supported: Spanish, English
- Language files in `lang/es/` and `lang/en/`
- Use `laravel-lang/common` for standardized translations

### Jetstream Configuration
- Stack: Livewire (not Inertia)
- Features enabled: Profile photos, Account deletion
- Features disabled: API, Teams, Terms & Privacy Policy
- Auth guard: `sanctum`
- Profile photos stored on `public` disk

### API Token Expiry
Sanctum tokens expire after 2 hours. Frontend clients should:
1. Handle 401 responses
2. Use `/api/check-status` endpoint to rotate tokens
3. Store new token and retry failed request

## Key API Endpoints

### Public Routes (Authentication)
- `POST /api/register` - User registration (name, email, password)
- `POST /api/login` - Authentication (returns 2hr token)

### Protected Routes (Sanctum)
**User & Auth:**
- `POST /api/logout` - Invalidate current token
- `GET /api/profile` - Get authenticated user
- `GET /api/check-status` - Rotate token

**LMS Routes (to be implemented):**
- `GET /api/courses` - List available courses
- `GET /api/courses/{course}` - Get course details
- `POST /api/enrollments` - Enroll in a course
- `GET /api/my-courses` - User's enrolled courses
- `GET /api/courses/{course}/progress` - Course progress
- `POST /api/courses/{course}/complete` - Mark course as completed
- `GET /api/certificates` - User's certificates

## Common Development Patterns

### Creating a New API Endpoint
1. Add route in `routes/api.php` (public or in auth:sanctum group)
2. Create controller method in `app/Http/Controllers/api/`
3. Use `Validator::make()` for input validation
4. Return JSON with consistent structure:
   ```php
   return response()->json([
       'success' => true|false,
       'message' => 'Description',
       'data' => [...],
   ], HTTP_CODE);
   ```

### Adding Admin Features
1. Add route in `routes/admin.php`
2. Use AdminLayout component for views (`resources/views/components/admin-layout.blade.php`)
3. Routes are automatically protected by `['web', 'auth']` middleware (configured in `bootstrap/app.php`)
4. Check user permissions with `$user->isAdmin()` method if needed

### Working with LMS Features (to be implemented)
1. Course Management: Create models and migrations for courses, modules, and content
2. Enrollment System: Track user course registrations and progress
3. Assessment Engine: Build quiz/exam functionality with scoring
4. Certificate Generation: Create PDF certificates upon course completion
5. Progress Tracking: Monitor and report user learning progress

## Testing Notes

- Test configuration in `phpunit.xml` uses SQLite in-memory database
- Jetstream includes feature tests for auth flows (registration, login, password reset, 2FA, profile management)
- When writing new tests, use existing Jetstream tests as patterns
- API tests should test both authenticated and unauthenticated scenarios
- LMS feature tests should cover: course enrollment, progress tracking, certificate generation, assessments

## Additional Notes

### Queue Configuration
- Queue driver: `database` (production)
- Queue jobs stored in database table
- Run queue worker with `php artisan queue:listen --tries=1` or use `composer dev`

### Application Configuration
- App name: "Sistema Centros LMS" (configurable in `.env` as `APP_NAME`)
- Default locale: Spanish (`es`)
- Session driver: `database` (2 hours lifetime)
- Cache driver: `database`
- Primary logo: `public/images/LOGO_SCCYC.png`
