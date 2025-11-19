# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

BeautyApp is a clean Laravel 12 application with authentication and user management. The platform provides a foundation with Laravel Jetstream authentication, administrative panels, and API authentication using Sanctum tokens. It features a triple interface system (Web, Admin, API) ready for building custom features.

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

1. **Web Interface** (`routes/web.php`): Jetstream-powered user dashboard with Livewire components
2. **Admin Interface** (`routes/admin.php`): Mounted at `/admin` prefix with `['web', 'auth']` middleware (configured in `bootstrap/app.php`), uses custom AdminLayout component
3. **API Interface** (`routes/api.php`): RESTful API with Sanctum authentication for mobile/external clients

### Key Models

**Core Models:**
- **User**: Authenticatable model with Sanctum tokens, supports roles (user, admin, superadmin)

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

## Key Routes

### Web Routes (`routes/web.php`)
- `GET /` - Welcome page (public)
- `GET /privacy` - Privacy policy page (public)
- `GET /dashboard` - User dashboard (auth required)

### API Routes (`routes/api.php`)
**Public Routes:**
- `POST /api/register` - User registration (name, email, password)
- `POST /api/login` - Authentication (returns 2hr token)
- `GET /api/test` - API health check

**Protected Routes (Sanctum):**
- `POST /api/logout` - Invalidate current token
- `GET /api/profile` - Get authenticated user
- `GET /api/check-status` - Rotate token

### Admin Routes (`routes/admin.php`)
- `GET /admin` - Admin dashboard (auth required, auto-protected by middleware)

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
2. Create Livewire component in `app/Livewire/Admin/`
3. Create view in `resources/views/livewire/admin/`
4. Use AdminLayout component for consistent admin UI
5. Routes are automatically protected by `['web', 'auth']` middleware
6. Check user permissions with `$user->role` if needed (user, admin, superadmin)

### Creating Livewire Components
1. Generate component: `php artisan make:livewire Admin/ComponentName`
2. Component class goes to `app/Livewire/Admin/ComponentName.php`
3. View goes to `resources/views/livewire/admin/component-name.blade.php`
4. Use WireUI components for consistent UI (x-wire-card, x-wire-button, x-wire-badge, etc.)

## Testing Notes

- Test configuration in `phpunit.xml` uses SQLite in-memory database
- Jetstream includes feature tests for auth flows (registration, login, password reset, 2FA, profile management)
- When writing new tests, use existing Jetstream tests as patterns
- API tests should test both authenticated and unauthenticated scenarios

## Additional Notes

### Queue Configuration
- Queue driver: `database` (production)
- Queue jobs stored in database table
- Run queue worker with `php artisan queue:listen --tries=1` or use `composer dev`

### Application Configuration
- App name: "BeautyApp" (configurable in `.env` as `APP_NAME`)
- Default locale: Spanish (`es`)
- Session driver: `database` (2 hours lifetime)
- Cache driver: `database`
- Primary logo: `public/images/LOGO_SCCYC.png`

### User Roles
- **user**: Regular users with access to user dashboard
- **admin**: Administrators with access to admin panel
- **superadmin**: Super administrators with full system access

### Middleware
- `redirect.if.admin`: Redirects admins from user routes to admin panel (configured in `app/Http/Middleware/RedirectIfAdmin.php`)
- All admin routes are automatically protected by `['web', 'auth']` middleware via `bootstrap/app.php` configuration
