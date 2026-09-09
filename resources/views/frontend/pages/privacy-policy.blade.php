@extends('frontend.components.layout', [
    'title' => $title ?? 'Privacy Policy - Accelerate Lab',
    'description' => $description ?? 'Read Accelerate Lab\'s privacy policy. Learn how we collect, use, and protect your personal information.'
])

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Light --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/10 to-transparent blur-3xl -z-10"></div>

    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-16">
            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase mb-3 block">Legal & Compliance</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-4">
                Privacy Policy
            </h1>
            <p class="text-sm font-mono text-slate-500 dark:text-slate-400">
                Effective Date: January 1, 2025 | Last Updated: March 2026
            </p>
        </div>

        {{-- Content Card --}}
        <div class="p-8 sm:p-12 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-xl space-y-8 text-slate-600 dark:text-slate-300 leading-relaxed text-base">
            
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">1. Operating Entity & Scope</h2>
                <p>
                    This Privacy Policy applies to the digital platforms, software services, and websites operated by <strong>PT Akselerasi Digital Mandiri</strong> ("Accelerate Lab", "we", "us", or "our"). We are committed to safeguarding the privacy of visitors, clients, and partners who interact with our services.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">2. Data We Collect</h2>
                <p class="mb-3">
                    We collect only the minimum necessary information required to evaluate client inquiries, provide architectural consulting, and deliver software services:
                </p>
                <ul class="list-disc list-inside space-y-2 text-sm pl-2">
                    <li><strong>Contact Inquiries:</strong> Full name, professional work email, telephone/WhatsApp number, organization name, and project scope submitted via our contact forms.</li>
                    <li><strong>Technical Telemetry:</strong> Anonymized server logs including IP address, user agent, browser type, and operating system for DDoS prevention and performance monitoring.</li>
                    <li><strong>Cookies & Session State:</strong> Local storage and essential session tokens strictly utilized to store your interface theme preferences (dark/light) and locale selection.</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">3. Purpose of Data Processing</h2>
                <p class="mb-3">
                    Your information is strictly processed for the following purposes:
                </p>
                <ul class="list-disc list-inside space-y-2 text-sm pl-2">
                    <li>Reviewing and responding to project scoping and technical consultation requests.</li>
                    <li>Drafting non-disclosure agreements (NDAs) and engineering service contracts.</li>
                    <li>Ensuring cybersecurity, preventing automated spam submissions, and maintaining uptime SLA.</li>
                </ul>
                <p class="mt-3 font-semibold text-slate-900 dark:text-white">
                    We never sell, rent, or lease personal or client data to third-party advertisers or data brokers.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">4. Data Security & Storage</h2>
                <p>
                    All communication with our infrastructure is encrypted in transit using industry-standard TLS 1.3 cryptographic protocols. Stored data is kept on enterprise-grade cloud databases with strict role-based access control (RBAC), multi-factor authentication, and regular vulnerability audits.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">5. Data Subject Rights</h2>
                <p>
                    In accordance with applicable personal data protection regulations (including Indonesia's UU PDP), you have the right to request access to, correction of, or deletion of your personal data stored within our systems. To exercise these rights, please contact our data privacy officer at <a href="mailto:privacy@acceleratelab.id" class="text-[#00BFA5] underline font-mono">privacy@acceleratelab.id</a>.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">6. Legal Contact</h2>
                <p>
                    If you have questions regarding this Privacy Policy or our engineering security standards, contact us at:
                </p>
                <div class="mt-3 p-4 rounded-2xl bg-slate-50 dark:bg-white/5 font-mono text-xs text-slate-700 dark:text-slate-300 space-y-1">
                    <div><strong>PT Akselerasi Digital Mandiri</strong></div>
                    <div>Email: <a href="mailto:legal@acceleratelab.id" class="text-[#00BFA5]">legal@acceleratelab.id</a></div>
                    <div>WhatsApp: +62 821-2559-0020</div>
                    <div>Location: Jakarta & Bandung, Indonesia</div>
                </div>
            </div>

        </div>
    </section>
</main>
@endsection
