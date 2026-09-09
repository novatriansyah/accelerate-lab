# Global Kinetic Motion Engine Activation Plan

## 1. Executive Summary
Expand the GSAP kinetic motion engine (`.fade-anim` directional scroll reveals and `.t-counter` dynamic number tickers) across all remaining public pages of Accelerate Lab, creating an immersive, fluid, and cohesive brand experience throughout the entire site.

## 2. Target Routes & Pages
1. **Capabilities & Service Blueprints:**
   - `/services` (`resources/views/frontend/pages/services.blade.php`)
   - `/service/{slug}` generic (`resources/views/frontend/pages/service.blade.php`)
   - Dedicated Blueprint 1: `/services/web-application-development` (`resources/views/frontend/pages/web-application-development.blade.php`)
   - Dedicated Blueprint 2: `/services/cloud-architecture` (`resources/views/frontend/pages/cloud-architecture.blade.php`)
   - Dedicated Blueprint 3: `/services/mobile-app-development` (`resources/views/frontend/pages/mobile-app-development.blade.php`)
   - Dedicated Blueprint 4: `/services/ui-ux-design` (`resources/views/frontend/pages/ui-ux-design.blade.php`)
2. **Portfolio & Case Studies:**
   - `/case-studies` (`resources/views/frontend/pages/case-studies.blade.php`)
   - `/case-studies/{slug}` (`resources/views/frontend/pages/project.blade.php`)
3. **Company & Research Pages:**
   - `/about` (`resources/views/frontend/pages/about.blade.php`) -> includes `.t-counter` on dynamic metric stats grid
   - `/careers` (`resources/views/frontend/pages/careers.blade.php`)
   - `/the-lab` (`resources/views/frontend/pages/the-lab.blade.php`)
   - `/blog` (`resources/views/frontend/pages/blog.blade.php`)
   - `/blog/{slug}` (`resources/views/frontend/pages/article.blade.php`)
4. **Global Shell & Components:**
   - Global Footer CTA Banner (`resources/views/frontend/components/footer.blade.php`)

## 3. Strict TDD Engineering Workflow
- **Task 1: About Us, Careers & The Lab Kinetic Motion Activation**
  - Failing test first in `tests/Feature/GlobalMotionEngineAuditTest.php`.
  - Attach `.fade-anim` with `data-direction="bottom"` and `.t-counter` to stat cards in `about.blade.php`, `careers.blade.php`, and `the-lab.blade.php`.
  - Verify test passes, commit.
- **Task 2: Services Overview & 4 Blueprint Sub-Pages Kinetic Motion Activation**
  - Add test coverage for `/services` and blueprint routes.
  - Attach `.fade-anim` to `services.blade.php`, `service.blade.php`, and 4 dedicated blueprint views.
  - Verify test passes, commit.
- **Task 3: Case Studies, Project Detail, Blog & Global Footer Kinetic Motion Activation**
  - Add test coverage for `/case-studies`, `/case-studies/{slug}`, `/blog`, `/blog/{slug}`, and footer banner.
  - Attach `.fade-anim` and `.t-counter` to impact cards and project metrics.
  - Verify test passes, commit.
- **Task 4: Master Quality Gate, Production Build & Git Synchronization**
  - Run full test suite: `php artisan test` (100% pass, 0 regressions).
  - Run production asset compile: `npm run build`.
  - Fast-forward merge `development` into `master` and push to `origin`.

## 4. Hard Constraints
- Strict zero em-dashes (`—` or `–`) across all views, tests, and commit messages.
- 100% test pass rate maintained at all times.
