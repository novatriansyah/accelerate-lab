# PROJECT STRUCTURE MAP

## KEY DIRECTORIES
* `resources/views/components/` -> Reusable UI (Buttons, Cards, Navbars).
* `resources/views/pages/` -> Full page layouts.
* `resources/views/layouts/` -> Base HTML wrappers (AppLayout, GuestLayout).
* `app/View/Components/` -> Class-based components (only if logic is heavy).

## CURRENT PAGE LIST (MONOLITH)
1.  **Home (Hero)**: `resources/views/pages/home.blade.php` (or `welcome.blade.php`).
2.  **Legal**: `resources/views/pages/privacy-policy.blade.php` (Required for PT).
3.  **Services**: Currently part of Home.

## TAILWIND CONFIG
Refer to `tailwind.config.js` for the "Lab" color palette.
Usage in Blade:
* `bg-lab-bg` (Main Background: Slate-950)
* `text-lab-neon` (Primary Accent: Cyan-500)
* `text-lab-accent` (Secondary: Blue-600)
