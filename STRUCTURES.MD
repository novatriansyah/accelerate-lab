# PROJECT STRUCTURE MAP

## KEY DIRECTORIES
* `resources/views/frontend/components/` -> Reusable UI (Layout, Header, Footer, Empty State).
* `resources/views/frontend/pages/` -> Full page Blade templates.
* `resources/views/frontend/emails/` -> Email notification templates.
* `app/Http/Controllers/Frontend/` -> Frontend controllers (PageController, ContactController, etc.).
* `app/Filament/Resources/` -> Filament admin panel resources (CMS).
* `app/Models/` -> Eloquent models.

## CURRENT PAGE LIST (MONOLITH)
1. **Home**: `resources/views/frontend/pages/home.blade.php`
2. **About**: `resources/views/frontend/pages/about.blade.php`
3. **Services**: `resources/views/frontend/pages/services.blade.php`
4. **Service Detail**: `resources/views/frontend/pages/service.blade.php` (generic) + custom pages per slug.
5. **Case Studies**: `resources/views/frontend/pages/case-studies.blade.php`
6. **Project Detail**: `resources/views/frontend/pages/project.blade.php`
7. **Blog**: `resources/views/frontend/pages/blog.blade.php`
8. **Article Detail**: `resources/views/frontend/pages/article.blade.php`
9. **Careers**: `resources/views/frontend/pages/careers.blade.php`
10. **Contact**: `resources/views/frontend/pages/contact.blade.php`
11. **Privacy Policy**: `resources/views/frontend/pages/privacy-policy.blade.php`
12. **Terms of Service**: `resources/views/frontend/pages/terms-of-service.blade.php`

## GLOBAL DATA (via AppServiceProvider)
* `$settings` -> Site settings from `site_settings` table (logo, legal name, contact info, etc.).
* `$globalServices` -> All services for footer navigation.

## TAILWIND CONFIG
Refer to `tailwind.config.js` for the color palette.
Key tokens:
* `bg-primary` / `text-primary` (Teal: #00BFA5)
* `bg-background-light` / `dark:bg-background-dark`
* `bg-surface-light` / `dark:bg-surface-dark`
* `text-text-main` / `text-text-secondary` / `text-text-muted`
