@extends('frontend.components.layout')

@section('content')
    <main class="flex-1 flex flex-col items-center w-full">
        <section class="w-full max-w-4xl px-4 sm:px-6 lg:px-8 pt-32 pb-20">
            <h1 class="text-4xl font-black leading-tight tracking-[-0.033em] text-slate-900 dark:text-white mb-8">
                Privacy Policy
            </h1>
            <p class="text-sm text-slate-500 dark:text-slate-400 mb-12">Last updated: May 26, 2026</p>

            <div class="prose prose-slate dark:prose-invert max-w-none space-y-8">
                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">1. Introduction</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        PT Akselerasi Digital Mandiri ("Accelerate Lab", "we", "us", or "our") is committed to protecting your privacy.
                        This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our
                        website or engage our digital services.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">2. Information We Collect</h2>
                    <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-200 mb-2">Personal Information</h3>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-4">
                        When you submit our contact form or engage our services, we may collect:
                    </p>
                    <ul class="list-disc pl-6 text-slate-600 dark:text-slate-300 space-y-2">
                        <li>Full name</li>
                        <li>Email address</li>
                        <li>Phone number</li>
                        <li>Company name</li>
                        <li>Project details and messages you provide</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-slate-800 dark:text-slate-200 mb-2 mt-6">Automatically Collected Information</h3>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        We may automatically collect certain information when you visit our website, including your IP address,
                        browser type, operating system, referring URLs, and browsing behavior through cookies and analytics
                        tools (Google Analytics).
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">3. How We Use Your Information</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-4">We use the information we collect to:</p>
                    <ul class="list-disc pl-6 text-slate-600 dark:text-slate-300 space-y-2">
                        <li>Respond to your inquiries and provide customer support</li>
                        <li>Deliver and manage our digital services</li>
                        <li>Improve our website and user experience</li>
                        <li>Send project updates and communications related to our services</li>
                        <li>Comply with legal obligations</li>
                    </ul>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">4. Data Retention</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        We retain your personal information for as long as necessary to fulfill the purposes for which it was
                        collected, including to satisfy legal, accounting, or reporting requirements. Contact form submissions
                        are retained for a maximum of 2 years unless an active business relationship exists.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">5. Data Sharing</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        We do not sell, trade, or rent your personal information to third parties. We may share your data with
                        trusted service providers who assist us in operating our website and services (e.g., hosting providers,
                        email services), subject to confidentiality agreements.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">6. Cookies</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        Our website uses cookies to enhance your browsing experience, analyze site traffic, and understand
                        user preferences. You can control cookie settings through your browser. Disabling cookies may affect
                        certain features of our website.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">7. Your Rights</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed mb-4">You have the right to:</p>
                    <ul class="list-disc pl-6 text-slate-600 dark:text-slate-300 space-y-2">
                        <li>Access the personal data we hold about you</li>
                        <li>Request correction of inaccurate data</li>
                        <li>Request deletion of your personal data</li>
                        <li>Withdraw consent for data processing</li>
                    </ul>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed mt-4">
                        To exercise any of these rights, please contact us at the email address provided below.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">8. Security</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        We implement appropriate technical and organizational measures to protect your personal information
                        against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission
                        over the internet is 100% secure.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">9. Changes to This Policy</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        We may update this Privacy Policy from time to time. Changes will be posted on this page with an
                        updated revision date. We encourage you to review this policy periodically.
                    </p>
                </section>

                <section>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">10. Contact Us</h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed">
                        If you have any questions about this Privacy Policy, please contact us:
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
