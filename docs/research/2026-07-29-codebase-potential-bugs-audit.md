# Codebase Potential Bugs & Security Audit Report

> **Audited Repository:** Accelerate Lab (Laravel 11)
> **Audit Date:** July 29, 2026
> **Scope:** Full-stack audit covering Controllers, Routing, Security, Views, OpenGraph, Filament Admin, and Form Requests.

---

## Executive Summary

A comprehensive code audit was conducted across primary source files. While the core application structure and test coverage are strong, **5 potential bugs / edge-case vulnerabilities** were identified in the business logic, OpenGraph rendering, admin notifications, and input routing.

---

## Detailed Audit Findings

### 1. OpenGraph Images Use Relative URLs Instead of Absolute URLs

- **Severity:** Medium (SEO & Social Sharing Bug)
- **Primary Source:**
  - [BlogController.php:51](file:///d:/Nova/Personal/Projects/accelerate-lab/app/Http/Controllers/Frontend/BlogController.php#L51)
  - [ProjectController.php:46](file:///d:/Nova/Personal/Projects/accelerate-lab/app/Http/Controllers/Frontend/ProjectController.php#L46)
- **Code:**
  ```php
  'ogImage' => $article->image_path ? \Illuminate\Support\Facades\Storage::url($article->image_path) : null,
  ```
- **Root Cause & Impact:**
  `Storage::url($path)` returns a relative path like `/storage/articles/image.png`. Social media crawlers (Facebook OpenGraph parser, Twitter Cards, LinkedIn) require absolute URLs including protocol and domain (e.g., `https://acceleratelab.id/storage/articles/image.png`). Relative URLs cause image preview failures when sharing blog posts or case studies on social platforms.
- **Remediation:**
  Wrap `Storage::url(...)` with `url(...)` or `asset(...)`:
  ```php
  'ogImage' => $article->image_path ? url(\Illuminate\Support\Facades\Storage::url($article->image_path)) : null,
  ```

---

### 2. Hardcoded Admin Email in Contact Lead Notifications

- **Severity:** Medium (Functional / Notification Bug)
- **Primary Source:** [ContactController.php:32](file:///d:/Nova/Personal/Projects/accelerate-lab/app/Http/Controllers/Frontend/ContactController.php#L32)
- **Code:**
  ```php
  $admin = User::where('email', 'admin@accelerate.lab')->first();
  ```
- **Root Cause & Impact:**
  The contact form notification relies on a hardcoded email string (`admin@accelerate.lab`). If an administrator changes their email address or logs in with a custom domain email (e.g., `nova@accelerate.lab`), `$admin` resolves to `null` and lead email notifications silently fail.
- **Remediation:**
  Fallback to `User::first()` if the specific email isn't found:
  ```php
  $admin = User::where('email', 'admin@accelerate.lab')->first() ?? User::first();
  ```

---

### 3. Potential View Traversal in Custom Service Page Routing

- **Severity:** Low-Medium (Security & Defensive Design)
- **Primary Source:** [PageController.php:63-67](file:///d:/Nova/Personal/Projects/accelerate-lab/app/Http/Controllers/Frontend/PageController.php#L63-L67)
- **Code:**
  ```php
  if ($service->has_custom_page) {
      $view = "frontend.pages.{$service->slug}";
      if (! view()->exists($view)) {
          abort(404);
      }
      return view($view, [...]);
  }
  ```
- **Root Cause & Impact:**
  If an admin user or imported payload contains a slug with directory traversal sequences or non-standard characters, `$service->slug` is directly concatenated into view resolution.
- **Remediation:**
  Sanitize the slug string to allow only alphanumeric characters and hyphens:
  ```php
  $cleanSlug = preg_replace('/[^a-z0-9\-]/', '', strtolower($service->slug));
  $view = "frontend.pages.{$cleanSlug}";
  ```

---

### 4. Cloudflare Turnstile Network Timeout Exception Handling

- **Severity:** Low (Resilience & Edge-Case Protection)
- **Primary Source:** [StoreContactRequest.php:37-45](file:///d:/Nova/Personal/Projects/accelerate-lab/app/Http/Requests/StoreContactRequest.php#L37-L45)
- **Code:**
  ```php
  $response = \Illuminate\Support\Facades\Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [...]);
  if (!$response->successful() || !$response->json('success')) {
      $fail('The CAPTCHA verification failed. Please try again.');
  }
  ```
- **Root Cause & Impact:**
  If Cloudflare Turnstile service is unreachable or encounters a DNS/network timeout, `Http::post` throws a `ConnectionException`, triggering an unhandled 500 server error instead of gracefully reporting a validation failure.
- **Remediation:**
  Wrap HTTP verification in a `try-catch (\Throwable $e)` block to catch network exceptions gracefully.

---

### 5. Storage Fallback Route Security Guard

- **Status:** **Resolved** (Fixed during initial production hardening).
- **Primary Source:** [routes/web.php:30-45](file:///d:/Nova/Personal/Projects/accelerate-lab/routes/web.php#L30-L45)
- **Note:** Previously, `realpath(storage_path('app/public'))` could return `false` on uninitialized storage directories, throwing a PHP 8 `TypeError` in `str_starts_with`. This was resolved with strict `false` checks.

---

## Recommended Next Steps

1. Apply OpenGraph URL wrapping (`url(Storage::url(...))`) in `BlogController.php` and `ProjectController.php`.
2. Apply fallback admin lookup in `ContactController.php`.
3. Add try-catch resilience around Turnstile HTTP calls in `StoreContactRequest.php`.
