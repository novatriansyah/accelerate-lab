# Client Demo Feature — DM&P Advocates Prototype

**Date:** 2026-08-20  
**Status:** Approved  
**Author:** Accelerate Lab Team  

---

## 1. Overview & Objectives

Accelerate Lab requires a dedicated, isolated demo mechanism within the monolithic Laravel 12 application to showcase client prototypes and bespoke interactive web designs. This feature introduces the first client prototype: **DM&P Advocates (Dhoni Martien & Partners)** corporate law firm website.

### Key Objectives:
- Provide an accessible demo URL (`/demos/dmp-advocates`) for high-stakes client presentation.
- Guarantee 100% CSS and JS style isolation so the client's bespoke styling, typography (Google Fonts Montserrat & Playfair Display), and scripts are not modified or overridden by Accelerate Lab's global Tailwind CSS and Alpine.js configurations.
- Maintain adherence to Strict Test-Driven Development (TDD) and clean controller-based routing.

---

## 2. Architecture & Components

### 2.1 Routing & Controller
- **Route:** `GET /demos/dmp-advocates` defined in `routes/web.php`
- **Route Name:** `demos.dmp-advocates`
- **Controller:** `App\Http\Controllers\Frontend\DemoController`
- **Action:** `dmpAdvocates()`
- **Response:** Renders `demos.dmp-advocates` Blade template without middleware restrictions.

### 2.2 View & Asset Architecture
- **View Location:** `resources/views/demos/dmp-advocates.blade.php`
- **Isolation Constraints:**
  - Standalone HTML document structure (`<!DOCTYPE html>`, `<html>`, `<head>`, `<body>`).
  - No inheritance of `@extends('layouts.app')` or master layouts.
  - No inclusion of `@vite(...)` application bundles to prevent style bleed.
  - Self-contained `<style>` block preserving original CSS custom properties, responsive breakpoints, animations, and micro-interactions.
  - Preserved vanilla JavaScript for tab navigation (`switchTab`), practice area filtering, lawyer directory rank filter (`filterLawyers`), language toggling, and consultation form intake simulation.
- **Visual Assets:**
  - Embedded SVG / fallback graphic for `DM&P Advocates` seal and logo to prevent broken image references during client demos.

---

## 3. Strict TDD & Verification Plan

In alignment with workspace standards:
- **Test File:** `tests/Feature/Frontend/DemoControllerTest.php`
- **Test Scenarios:**
  1. `test_dmp_advocates_demo_page_loads_successfully()`: Asserts `GET /demos/dmp-advocates` returns HTTP status 200.
  2. `test_dmp_advocates_demo_page_contains_expected_client_branding()`: Asserts presence of key texts such as `"DM&P Advocates"`, `"Dhoni Martien"`, `"Pacific Century Place"`, and practice area labels.
  3. `test_dmp_advocates_demo_page_is_isolated_from_main_agency_layout()`: Asserts that main agency layout markers (such as Accelerate Lab's navigation header or agency slogan) are NOT rendered on this demo page.

---

## 4. Scope & Non-Goals

- **In Scope:** Standalone view rendering, route definition, clean controller implementation, and full test suite coverage.
- **Out of Scope (Non-Goals):** Database persistence for the mock consultation form (handled via client-side interactive alert for prototype demo purposes) and admin CMS management of static client prototypes.
