# Accelerate Lab — Agent Guidelines & Engineering Standards

## 1. Project Overview
Accelerate Lab is a high-performance modern tech agency built as a clean, monolithic Laravel 12 application with Tailwind CSS v4, Blade components, Alpine.js, and Filament v3.

## 2. Mandatory Strict TDD Rule
This repository operates under **Strict Test-Driven Development (TDD)**:
- **Red $\rightarrow$ Green $\rightarrow$ Refactor** is strictly enforced for every task.
- Before adding or modifying backend logic, models, controllers, API routes, or Blade UI/UX components, write the failing test first.
- See detailed workspace rule at [`.agents/rules/strict-tdd.md`](file:///d:/Nova/Personal/Projects/accelerate-lab/.agents/rules/strict-tdd.md).

## 3. Technology Stack & Hard Constraints
- **Framework:** Laravel 12.x (PHP 8.2+, optimized for 8.3)
- **Styling:** Tailwind CSS v4 with `@tailwindcss/vite`
- **CMS / Admin:** Filament v3
- **Icons:** 100% inline SVG via `<x-app-icon>` (no external font stylesheets or raw icon font spans)
- **Database:** MySQL in production, SQLite in-memory for automated tests
- **Testing:** PHPUnit 11 / Laravel Test Runner (`php artisan test`)

## 4. Quality & Testing Commands
- Run complete test suite:
  ```bash
  php artisan test
  ```
- Run filtered test:
  ```bash
  php artisan test --filter=TestClassName
  ```
- Run asset build:
  ```bash
  npm run build
  ```
