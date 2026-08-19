@extends('frontend.components.layout')

@section('content')
    <main class="flex-1 flex flex-col items-center w-full">
        <section class="w-full max-w-4xl px-4 sm:px-6 lg:px-8 pt-32 pb-20">
            <h1 class="text-4xl font-black leading-tight tracking-[-0.033em] text-slate-900 dark:text-white mb-8">
                Terms of Service
            </h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-12">Last updated: May 26, 2026</p>

            <div class="prose prose-slate dark:prose-invert max-w-none space-y-8">
                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">1. Agreement to Terms</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        By accessing or using the website and services of PT Akselerasi Digital Mandiri ("Accelerate Lab",
                        "we", "us", or "our"), you agree to be bound by these Terms of Service. If you do not agree to
                        these terms, please do not use our services.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">2. Services</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        Accelerate Lab provides digital product development services including but not limited to web
                        application development, mobile application development, UI/UX design, and cloud architecture
                        consulting. Specific deliverables, timelines, and terms for each engagement will be defined in a
                        separate project agreement or statement of work (SOW).
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">3. Intellectual Property</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-4">
                        Unless otherwise specified in a project agreement:
                    </p>
                    <ul class="list-disc pl-6 text-slate-600 dark:text-slate-300 space-y-2">
                        <li>All content on this website, including text, graphics, logos, and code, is the property of
                            PT Akselerasi Digital Mandiri and is protected by applicable intellectual property laws.</li>
                        <li>Upon full payment, clients receive ownership of custom-developed deliverables as specified
                            in their project agreement.</li>
                        <li>We retain the right to use general knowledge, techniques, and reusable components developed
                            during engagements.</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">4. Payment Terms</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        Payment terms, schedules, and methods will be specified in individual project agreements.
                        Unless otherwise agreed, invoices are due within 14 days of issuance. Late payments may be
                        subject to service suspension and additional charges as outlined in the project agreement.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">5. Client Responsibilities</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-4">Clients agree to:</p>
                    <ul class="list-disc pl-6 text-slate-600 dark:text-slate-300 space-y-2">
                        <li>Provide accurate and complete project requirements</li>
                        <li>Provide timely feedback and approvals during the development process</li>
                        <li>Ensure that all content and materials provided to us do not infringe on third-party rights</li>
                        <li>Maintain the security of any access credentials provided for project purposes</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">6. Limitation of Liability</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        To the maximum extent permitted by applicable law, Accelerate Lab shall not be liable for any
                        indirect, incidental, special, consequential, or punitive damages, including but not limited to
                        loss of profits, data, or business opportunities, arising from or related to the use of our
                        services. Our total liability shall not exceed the amount paid by the client for the specific
                        service giving rise to the claim.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">7. Warranties</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        We warrant that our services will be performed in a professional and workmanlike manner consistent
                        with industry standards. We provide a 30-day warranty period after delivery for bug fixes related
                        to the agreed-upon specifications. This warranty does not cover issues arising from client
                        modifications, third-party integrations not managed by us, or changes to external dependencies.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">8. Confidentiality</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        Both parties agree to maintain the confidentiality of any proprietary or sensitive information
                        shared during the course of an engagement. This obligation survives the termination of any
                        project agreement.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">9. Governing Law</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        These Terms of Service are governed by and construed in accordance with the laws of the
                        Republic of Indonesia. Any disputes arising under these terms shall be resolved through
                        negotiation in good faith, and if unresolved, through the competent courts in Indonesia.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">10. Changes to Terms</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        We reserve the right to modify these Terms of Service at any time. Changes will be effective
                        immediately upon posting. Your continued use of our services after any changes constitutes
                        acceptance of the updated terms.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">11. Contact</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        For questions about these Terms of Service, please contact us:
                    </p>
                    <div class="mt-4 p-6 bg-slate-50 dark:bg-slate-800/50 rounded-xl border border-slate-200 dark:border-slate-700">
                        <p class="text-slate-700 dark:text-slate-300 font-semibold">PT Akselerasi Digital Mandiri</p>
                        <p class="text-slate-600 dark:text-slate-400">Email: {{ $settings['contact_email'] ?? 'hello@acceleratelab.io' }}</p>
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection
