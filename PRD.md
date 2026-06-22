# Product Requirements Document (PRD)
## Accelerate Lab — "Engineering Velocity"

---

## 1. Document Control
* **Author:** Nova Triansyah Azis (Founder / Architect)
* **Company:** PT Akselerasi Digital Mandiri
* **Brand Name:** Accelerate Lab
* **Legal Status:** PT Perorangan (Indonesian Individual Limited Liability Company)
* **Version:** 1.0.0
* **Status:** Approved

---

## 2. Product Overview

### 2.1 Mission & Vision
Accelerate Lab is a modern tech agency delivering high-performance, enterprise-grade digital products at startup speed. Operating under the tagline **"Engineering Velocity,"** the company focuses on flat, efficient monolith architectures over complex microservices.

### 2.2 Core Vibe & Aesthetic
* **Theme:** Professional, futuristic, minimalist.
* **UI/UX Strategy:** Light-mode-first with high-quality dark mode support.
* **Visual Elements:** Soft gradients, glassmorphism card interfaces, clear code-decorative styling, and Google Material Symbols (Outlined/Round).

---

## 3. Technology Stack (Strict Standard)

The agency website and CMS are built entirely as a single-monolith system:
* **Backend Framework:** Laravel 12
* **Frontend Rendering:** Blade templates, Alpine.js (CDN)
* **Styling Engine:** Tailwind CSS v4 (utility-first)
* **Asset Bundler:** Vite 7 with `@tailwindcss/vite` integration
* **Admin Interface / CMS:** Filament v3
* **Database:** MySQL
* **PHP Requirements:** 8.2+ (production optimized for PHP 8.3)
* **Iconography:** Google Material Symbols Outlined + Material Icons Round

---

## 4. Key Functional Features

### 4.1 Frontend Pages & User Flows
The public application consists of a responsive multi-page architecture:
1. **Home:** High-impact hero section presenting core offerings, founder expertise, real metrics, and recent work.
2. **About:** Narrative focused on the single-founder architecture model and high-efficiency methodology.
3. **Services:** Complete overview of agency services.
4. **Service Detail:** Dynamically loaded details based on service category.
5. **Case Studies (Projects):** Grid list of completed work filterable by industry, highlighting featured case studies.
6. **Project Detail:** Detailed case study pages featuring challenge, solution, stats, and testimonials.
7. **Blog:** Grid listing of articles with search, tags, and category filtering.
8. **Article Detail:** Rich text article display with read times, metadata, and related posts.
9. **Careers:** Open job listings with descriptions and applications.
10. **Contact:** Dynamic lead generation form with DB capturing and direct redirection to WhatsApp or email.
11. **Legal Policies:** Standard Privacy Policy and Terms of Service.

### 4.2 Admin Panel (Filament CMS)
All site content is CMS-driven. The Filament admin dashboard manages the following entities:
* **Projects (Case Studies):** Fields for Title, Slug, Client, Industry, Featured Toggle, Accent Color, Material Icon, Description, Challenges/Solutions (RichText), and associated Technologies. Includes visuals (Featured image & gallery) and quantitative proof (Stats & Testimonials repeaters).
* **Technologies:** Catalog of tags/technologies filterable by category (Backend, Frontend, DevOps, Tools, Design) with icons.
* **Services:** Core offerings with custom details and sort orders.
* **Blog Articles & Categories:** Categorized publishing workflow with drafts, featured posts, and author assignments.
* **Job Postings:** Careers CMS featuring active/inactive statuses, descriptions, and department grouping.
* **Site Settings:** Global configuration variables (e.g., logo, contact details, social links, registered NIB/legal name).

### 4.3 Lead Spam Protection (Contact Form Security)
To protect the contact form from spam and automated submissions:
* **Honeypot Protection:** An invisible form field `my_favorite_color` designed to trap automated bots. Submissions with this field populated are silently ignored.
* **Frictionless CAPTCHA:** Integration of Cloudflare Turnstile to verify incoming requests. The validation fails if Turnstile detection determines bot activity.
* **Fallback Mode:** If Cloudflare Turnstile credentials are not configured in the environment (`.env`), the system gracefully falls back to Honeypot-only protection without breaking local environments.

---

## 5. Non-Functional & Structural Requirements

### 5.1 Content Authenticity
* **No Artificial Metrics:** All stats, numbers, and client lists must reflect real system data or CMS configurations.
* **Single Founder Focus:** Explicitly represent a single-founder/architect model without listing placeholder teams.

### 5.2 SEO & Technical Optimizations
* **Semantic HTML:** HTML5 tags (`<main>`, `<header>`, `<footer>`, `<section>`) must be strictly applied.
* **SEO Metadata:** Automated title generation, unique meta descriptions, sitemap compilation, and canonical URLs.
* **Routing Cleanliness:** Clean controller-based routes (no logic in `routes/web.php` closures).

### 5.3 Technical Constraints
* **No Unapproved Frameworks:** Use of Bootstrap, custom CSS files, React/Vue for frontend, or the Aramaho framework is strictly prohibited.
* **Task Management:** Linear is used exclusively for project management tracking.
