@extends('frontend.components.layout', [
    'title' => $title ?? 'Terms of Service - Accelerate Lab',
    'description' => $description ?? 'Read the terms of service for Accelerate Lab. Understand the conditions that apply when using our digital services and website.'
])

@section('content')
<main class="relative z-10 pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden">
    {{-- Ambient Light --}}
    <div class="pointer-events-none absolute -top-24 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-gradient-to-b from-[#00BFA5]/10 to-transparent blur-3xl -z-10"></div>

    <section class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Header --}}
        <div class="text-center mb-16">
            <span class="text-[#00BFA5] font-mono text-xs font-bold tracking-widest uppercase mb-3 block">Legal & Governance</span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white mb-4">
                Terms of Service
            </h1>
            <p class="text-sm font-mono text-slate-500 dark:text-slate-400">
                Effective Date: January 1, 2025 | Last Updated: March 2026
            </p>
        </div>

        {{-- Content Card --}}
        <div class="p-8 sm:p-12 rounded-3xl bg-white dark:bg-[#0E1526] border border-slate-200 dark:border-white/10 shadow-xl space-y-8 text-slate-600 dark:text-slate-300 leading-relaxed text-base">
            
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">1. Agreement to Terms</h2>
                <p>
                    These Terms of Service constitute a legally binding agreement made between you and <strong>PT Akselerasi Digital Mandiri</strong> ("Accelerate Lab", "we", "us", or "our"), concerning your access to and use of our website, applications, and digital engineering consulting services.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">2. Engineering & Development Services</h2>
                <p>
                    All commercial software engineering engagements, custom development sprints, and architecture audits provided by Accelerate Lab are governed by individual Master Services Agreements (MSAs) and Statements of Work (SOWs). In the event of any conflict between these Terms and an executed SOW, the terms of the executed SOW shall prevail.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">3. Intellectual Property Rights</h2>
                <p class="mb-3">
                    Unless otherwise agreed upon in an executed Statement of Work:
                </p>
                <ul class="list-disc list-inside space-y-2 text-sm pl-2">
                    <li><strong>Accelerate Lab IP:</strong> All proprietary design systems, reusable utility libraries, code boilerplates, and content on this site are the exclusive property of PT Akselerasi Digital Mandiri.</li>
                    <li><strong>Client Deliverables:</strong> Upon full financial settlement of agreed milestones, all bespoke software code, database schemas, and graphic assets developed specifically for the client transfer to the client as work-for-hire.</li>
                </ul>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">4. Disclaimer of Warranties</h2>
                <p>
                    Our website and informational resources are provided on an "AS-IS" and "AS-AVAILABLE" basis. While we maintain 99.9% uptime for our client infrastructure, Accelerate Lab makes no warranties that the general public website will be uninterrupted or error-free at all times.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">5. Limitation of Liability</h2>
                <p>
                    In no event will PT Akselerasi Digital Mandiri, its directors, employees, or agents be liable to you or any third party for any direct, indirect, consequential, exemplary, incidental, special, or punitive damages arising from your use of the website or digital consulting inquiries.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">6. Governing Law & Jurisdiction</h2>
                <p>
                    These Terms and any contractual disputes shall be governed by and defined following the laws of the <strong>Republic of Indonesia</strong>. Any dispute arising out of or related to these Terms shall be subject to the exclusive jurisdiction of the district courts located in Jakarta, Indonesia.
                </p>
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-3">7. Contact Information</h2>
                <p>
                    To resolve a dispute regarding these terms or request engineering credentials, contact us at:
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
