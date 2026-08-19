# Accelerate Lab — Lead Generation & Conversion Engine Design Specification

## 1. Executive Summary & Objective
Transform Accelerate Lab's public web presence from a technical portfolio into an active **Inbound Lead Generation Engine**. The design removes visitor friction, eliminates alienating technical jargon, offers an interactive multi-step project scoping wizard, provides instant WhatsApp/calendar connection points, and establishes unambiguous trust guarantees for both non-technical business founders and technical leaders.

---

## 2. Core Architecture & Feature Specification

### 2.1 Interactive Project Scoping Wizard Component (`<x-project-estimator>`)
A standalone, accessible, lightweight Blade + Alpine.js interactive component rendered on `/contact` and embedded within key conversion landing sections.

#### Step 1: Project Objective (Plain Business Language)
- Option A: `[ 💡 Launch a New App Idea (MVP) ]` — Build and launch in 4–8 weeks to test the market.
- Option B: `[ 🏢 Web Platform or Customer Portal ]` — Custom dashboard, internal tool, booking system, or SaaS.
- Option C: `[ 📱 Mobile App (iOS & Android) ]` — Native or cross-platform smartphone application.
- Option D: `[ 🔧 Upgrade or Fix an Existing System ]` — Speed optimization, UI redesign, or feature expansion.
- Option E: `[ 💬 Free Consultation / Not Sure Yet ]` — Talk through options and recommendations.

#### Step 2: Current Project Stage
- `[ 📝 Concept / Notes only ]`
- `[ 🎨 Figma / Design mockups ready ]`
- `[ 💻 Existing codebase that needs work ]`
- `[ 🚀 Ready to build immediately ]`

#### Step 3: Estimated Timeline & Tech Preferences (Optional)
- **Timeline:** `[ ⚡ Within 1 Month ]` | `[ 🗓️ 2–3 Months ]` | `[ ☕ Flexible / Scoping ]`
- **Optional Tech Stack Preference (for CTOs/Technical Leads):** Dropdown/pills for `Laravel`, `React/Next.js`, `Vue`, `Node.js`, `Python`, `Flutter`, or `🎯 Recommend Best Stack for Me`.

#### Step 4: Frictionless Contact & Instant Channels
- Input fields: `Full Name` (required), `WhatsApp Number or Email` (required), `Company Name` (optional), `Notes / Brief Description` (optional).
- **Dual Conversion Actions:**
  1. **Primary Action (`💬 Send via WhatsApp`):** Automatically pre-populates a formatted message to Accelerate Lab's WhatsApp with full scoping details:
     > *"Hello Nova! I used the project estimator on your website. I want to build a [Mobile App] from [Figma designs] targeting a [2-3 month timeline]. Let's discuss scope and pricing."*
  2. **Secondary Action (`📧 Submit for Email Estimate`):** Submits to the backend (`/contact`), persists the lead with structured metadata in the database, and alerts the admin via email and WhatsApp webhook.

---

### 2.2 1-Click "Book a 15-Minute Project Friendly Consultation"
- Direct scheduler integration (modal and header/hero buttons):
  - No technical jargon, no sales pressure.
  - Links to direct Calendly or WhatsApp quick scheduling for high-intent visitors ready to talk immediately.

---

### 2.3 Technology-Agnostic Value Proposition & Trust Guarantees
- **Clear Business-Outcome Positioning:**
  - *"We design, engineer, and launch high-performance digital products on any modern technology stack—tailored to your budget and goals."*
- **Enterprise Guarantees Showcased:**
  - **100% Full IP Ownership:** All code, assets, and infrastructure belong to the client with zero lock-in.
  - **Direct Architect Oversight:** Every project overseen by the Principal Architect—no unsupervised junior delegation.
  - **Tested for High Reliability:** Every feature tested automatically before release so apps won't crash under real customer traffic.
  - **Transparent Fixed-Scope Sprints:** Clear milestone pricing without surprise hourly bills.

---

### 2.4 Contextual Lead CTAs Across Case Studies & Services
- Replace generic "Ready to accelerate?" banners with contextual prompts:
  - On Fintech / SaaS case studies: *"Planning a similar platform or custom portal? Let's discuss your timeline and budget."*
  - On Mobile case studies: *"Building a smartphone app for your business? Get an interactive estimate in 30 seconds."*

---

## 3. Data Flow & Security
- **Database Schema:** Existing `leads` table captures `name`, `email`, `phone`, `company`, `message`, `source`, and structured project scope payload.
- **Bot Protection:** Maintained silent honeypot field (`my_favorite_color`), Cloudflare Turnstile token validation, and rate limiting (`throttle:5,1`).
- **Notification Pipeline:** Instant notification dispatched to admin via `LeadNotification` (Email + WhatsApp webhook).

---

## 4. Verification & Testing Strategy (Strict TDD)
- **Feature Tests:**
  - `tests/Feature/ProjectEstimatorTest.php`: Tests all wizard step states, validation of contact inputs, and database mutation.
  - `tests/Feature/UiUxDesignSystemTest.php`: Tests semantic landmarks, accessibility labels, dark mode classes, and zero font RTT.
- **Unit Tests:**
  - `tests/Unit/LeadTest.php`: Tests scoping metadata parsing and accessors.
