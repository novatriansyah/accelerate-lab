@extends('components.layout')

@section('content')
<main class="flex-1 flex flex-col items-center w-full">
<section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pt-12 pb-6">
<div class="flex flex-col gap-4 max-w-3xl">
<h1 class="text-4xl md:text-5xl font-black leading-tight tracking-[-0.033em] text-slate-dark dark:text-white">
                    Insights &amp; Innovation
                </h1>
<p class="text-lg text-slate-medium dark:text-slate-400 font-normal leading-relaxed">
                    Exploring the future of web technology, engineering patterns, and digital product design.
                </p>
</div>
</section>
<section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
<div class="group relative overflow-hidden rounded-2xl bg-white dark:bg-white/5 border border-[#e7f3f2] dark:border-white/10 shadow-sm transition-all hover:shadow-md">
<div class="grid lg:grid-cols-2 gap-0">
<div class="relative h-64 lg:h-auto overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" data-alt="Futuristic server room with blue lighting representing cloud infrastructure" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAj3GIGhT36of53ZMYhGoBFfXfYVfaxv-7wh9FD0YZanOphf7YOus4dWLrpGk0mFtX5_GEBMnrVKOMO5p0pmsp0l-JimTjNmnr3YB3xY4tm8qstr0qkfSJeRbGvKbiua20X_t4X49xMFZ66KDPASFvNCkZlTKhYjVh5dD3a5AV1FmG-7MRosUWVOvZxCyJnd0_ckcPbUnFCaxTBKVj19AJ_Se8U_sJiqdv1PxZxjxT6bUC8IhsWeThimK9JFfOmwKqViye2cTdnsiQ");'>
</div>
<div class="absolute top-4 left-4 bg-primary text-slate-dark text-xs font-bold px-3 py-1 rounded-full">
                            Featured
                        </div>
</div>
<div class="flex flex-col justify-center p-8 lg:p-12 gap-6">
<div class="flex items-center gap-3 text-sm text-slate-medium dark:text-slate-400">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">calendar_today</span> Oct 24, 2023</span>
<span>•</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">schedule</span> 8 min read</span>
</div>
<h2 class="text-3xl font-black leading-tight tracking-tight text-slate-dark dark:text-white group-hover:text-primary transition-colors">
                            Migrating to Serverless: A CTO's Guide to Cost Optimization
                        </h2>
<p class="text-base text-slate-600 dark:text-slate-300">
                            Learn how modern cloud architecture can reduce overhead and improve scalability for enterprise applications. We break down the real-world metrics.
                        </p>
<div class="flex items-center gap-4 pt-2">
<img alt="Author Avatar" class="w-10 h-10 rounded-full border-2 border-white dark:border-slate-800 object-cover" data-alt="Portrait of a professional man in a suit" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrxWkdBlcAwbhpE6DM1Kmcquj1bGq0ambtoTQqQIxht--6A_fYDuYgtuI_JXbIAOcULFdsICD3DZKKuZt3iLofmLZZARBsqXJh4FZZtNM2Q7cbn6ZqmhVSct5ADuxJ0NW44d3cU32kYVtAL_w3oh84BEhdNN58o19hyXfgPrcy3GBaIBe-7whz7ni-ZUmJj5r2P8IVCWLylJChfqN5bN0qxqDhTk4I2GqUWVRLX3nvs7E32_vH4hDXiGG9RP9FNzGxUS_0npDnNlM"/>
<div class="text-sm">
<p class="font-bold text-slate-dark dark:text-white">David Chen</p>
<p class="text-slate-medium dark:text-slate-500">Chief Technology Officer</p>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
<div class="flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center">
<div class="flex flex-wrap gap-3">
<button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white text-sm font-medium transition-colors">
<span class="material-symbols-outlined text-[20px]">star</span>
                        All
                    </button>
<button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-[#e7f3f2] hover:bg-primary/20 dark:bg-white/5 dark:hover:bg-white/10 text-slate-dark dark:text-white text-sm font-medium transition-colors">
<span class="material-symbols-outlined text-[20px]">code</span>
                        Engineering
                    </button>
<button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-[#e7f3f2] hover:bg-primary/20 dark:bg-white/5 dark:hover:bg-white/10 text-slate-dark dark:text-white text-sm font-medium transition-colors">
<span class="material-symbols-outlined text-[20px]">brush</span>
                        UX/UI Design
                    </button>
<button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-[#e7f3f2] hover:bg-primary/20 dark:bg-white/5 dark:hover:bg-white/10 text-slate-dark dark:text-white text-sm font-medium transition-colors">
<span class="material-symbols-outlined text-[20px]">cloud</span>
                        Cloud Architecture
                    </button>
<button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-[#e7f3f2] hover:bg-primary/20 dark:bg-white/5 dark:hover:bg-white/10 text-slate-dark dark:text-white text-sm font-medium transition-colors">
<span class="material-symbols-outlined text-[20px]">newspaper</span>
                        Company News
                    </button>
</div>
<div class="w-full lg:w-auto min-w-[300px]">
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-slate-medium">search</span>
</div>
<input class="block w-full pl-10 pr-3 py-2.5 border-none rounded-lg bg-[#e7f3f2] dark:bg-white/5 text-slate-dark dark:text-white placeholder-slate-medium focus:outline-none focus:ring-2 focus:ring-primary transition-all" placeholder="Search articles..." type="text"/>
</div>
</div>
</div>
</section>
<section class="w-full max-w-7xl px-4 sm:px-6 lg:px-8 pb-16">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<article class="group flex flex-col bg-white dark:bg-white/5 rounded-xl border border-[#e7f3f2] dark:border-white/10 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-primary/50">
<div class="relative h-48 overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="React JS logo code snippet background" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCLyWT7SB9TuyB8fiWStOoTvxtC9rgooS-tc-8_E3rxI4Vyyjda6DIh_HbTzDA59j33sHSFTHNHGMzlQhUnys2v9fWz512W5l-o2FoMboZhnpLxBsOTxszZZ6rdVab9DawSb9T3zRsVVcZx1POJUJXzMihVSZToLY_Bkax00ZzNSU-GQErTcqmexay6rc_fGFxl5JjGuHvZ9sSLuAZKQaBRlzcgO1I07R-nAjexCMh_JYSVnMnbMyWtP8yRdS3BqdeF25-RrQCeXKk");'>
</div>
<div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-slate-dark dark:text-white text-xs font-bold px-2 py-1 rounded">
                            Engineering
                        </div>
</div>
<div class="flex flex-col flex-1 p-6">
<div class="flex items-center gap-2 text-xs text-slate-medium mb-3">
<span>Sep 12, 2023</span>
<span>•</span>
<span>5 min read</span>
</div>
<h3 class="text-xl font-bold text-slate-dark dark:text-white mb-3 group-hover:text-primary transition-colors">
                            The State of React in 2024
                        </h3>
<p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3 mb-6 flex-1">
                            An in-depth look at Server Components, Suspense, and the evolving ecosystem. Is it time to upgrade your legacy codebase?
                        </p>
<div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-white/10">
<img alt="Sarah Jenkins" class="w-8 h-8 rounded-full object-cover" data-alt="Professional woman looking at camera" src="https://lh3.googleusercontent.com/aida-public/AB6AXuANLbZM5KmvmdIUO54fj6JBO8cfAzV37cSWIY8kA8TgQOVGWvHzlZRtqn22vpmePBieIavxUmZ49TVyjSy1OqwSGtQYPuJHaZR4PaJu8_ltpr-KtKTjFjzGpjkehoVBtWl3McBjLrdOnbA3EkNpX5ZjrRWtdawd0H-2xFwimFSV5i0DuLyIglsC7tJKWptqdl0UxDxq6IlYEJYG-Pz4vg3AeGjNnKRXlFz3pJ_3sQT5d5YY4bri3Ds_zZ08ZLH77O8U-PUC62yHpRE"/>
<span class="text-xs font-medium text-slate-dark dark:text-white">Sarah Jenkins</span>
</div>
</div>
</article>
<article class="group flex flex-col bg-white dark:bg-white/5 rounded-xl border border-[#e7f3f2] dark:border-white/10 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-primary/50">
<div class="relative h-48 overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Data dashboard analytics visualization on a screen" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBuzcdsBFLqwAuKKyzUgqZbOIrU0IK01e_5DqE0LvWn2Xc8fk7cATheIYa2aCyH6NSRHPFDvNOJSYdb9E2xGhQ46DAkhGMpgVJXejuiY-_R_W4p_WFc7wcwC7dm0kDxQTOZE4uJYifGLH78As8O4gsxLKelk6OW-hsGhjAgOTP-npt5RN9QcqH-sOWocHaLsrO_AnlmWayN5k21zrwjiigNAx88YxzJtGr7PFpMWIEUNqhrSepm1MbTczDZBe1jy5PUolSCmyGsQzE");'>
</div>
<div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-slate-dark dark:text-white text-xs font-bold px-2 py-1 rounded">
                            Case Study
                        </div>
</div>
<div class="flex flex-col flex-1 p-6">
<div class="flex items-center gap-2 text-xs text-slate-medium mb-3">
<span>Aug 28, 2023</span>
<span>•</span>
<span>4 min read</span>
</div>
<h3 class="text-xl font-bold text-slate-dark dark:text-white mb-3 group-hover:text-primary transition-colors">
                            Why Accessibility Drives User Retention
                        </h3>
<p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3 mb-6 flex-1">
                            Accessibility isn't just about compliance; it's a growth strategy. We analyze how inclusive design impacts churn rates.
                        </p>
<div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-white/10">
<img alt="Marcus Wright" class="w-8 h-8 rounded-full object-cover" data-alt="Man smiling in a white shirt" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7QjAqzuaJkm9zDZbzbAjYcMsDQ_e7Ju_yY4msCwO4xP3dWoIRKMOu7JdnG_uoIebWK7MAm7napUDyUHKaNgsyPdyTpZCq5iloMPXVfKlny_hAG5CSNCfR8sVyyo30Lwluh_7UCbQfkLG_xqBmLCzprTLIhHXzz_c7QaCo0KbSVrpH7x5MIGLrfFETLFCw5Lpt-uN0ByRoNFEkdQpoftwDzi9hh0oSAMga2DaNjZAeX9qIRU4W44gzbNHLI-r6nRIeZB5IfecPBa8"/>
<span class="text-xs font-medium text-slate-dark dark:text-white">Marcus Wright</span>
</div>
</div>
</article>
<article class="group flex flex-col bg-white dark:bg-white/5 rounded-xl border border-[#e7f3f2] dark:border-white/10 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-primary/50">
<div class="relative h-48 overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Modern office meeting room with people collaborating" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC_ZQDocAfPnz6yUnGIDjHMrrxZChidzz71JE4T9tkkBRdu3YObl3yW-YRDIN8wdS8O-B8_GYRYHuFUDrVuahIadZE-U95pfC4WTA-t7A9UQnOM2hj-Iu-RmLtVikYxB0JlDiN7x1N_KwAbHPViOcFncxySDNZIfPc69rnAMtX41dMX_qxP98QnGst4dBlRQwOBjyxo-wsj7uP4nzfzx33GEHzqAHNOv1NutorAKEI11w6-iTM8r6SZiPlzXljRL7GehH2WhgQWbSU");'>
</div>
<div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-slate-dark dark:text-white text-xs font-bold px-2 py-1 rounded">
                            Company News
                        </div>
</div>
<div class="flex flex-col flex-1 p-6">
<div class="flex items-center gap-2 text-xs text-slate-medium mb-3">
<span>Aug 15, 2023</span>
<span>•</span>
<span>2 min read</span>
</div>
<h3 class="text-xl font-bold text-slate-dark dark:text-white mb-3 group-hover:text-primary transition-colors">
                            Accelerate Lab wins Best Tech Agency Award
                        </h3>
<p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3 mb-6 flex-1">
                            We are humbled to be recognized by the Digital Innovation Summit for our work on high-scale fintech platforms.
                        </p>
<div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-white/10">
<img alt="Emily Tao" class="w-8 h-8 rounded-full object-cover" data-alt="Woman with curly hair smiling" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFdqPUB7k4HfVFOWvMq2q2W-xhXd1ys3jHaojxOzeoDtTA8J1SU2fM6As3XAXKMYAbSfyCwpM9-gSFoyC7foju2O5yobIi6QZTCdrzhWvrPpCPLRwr6wGCUG2gytUELZ1ezErdTwc-nSa1m5-54HxZv4uS-jjSk1r3ZNQdrKrOI0IZ0x7oGq_bhefxFX-S8-0fGjp9Fg2zUlrAsMOndLsuRYJ5JawBcqcraQDXdaiQ657gIq8ccQ2adFrkEps4BOYylnS5EEUfa-Q"/>
<span class="text-xs font-medium text-slate-dark dark:text-white">Emily Tao</span>
</div>
</div>
</article>
<article class="group flex flex-col bg-white dark:bg-white/5 rounded-xl border border-[#e7f3f2] dark:border-white/10 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-primary/50">
<div class="relative h-48 overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Abstract AI neural network visualization with colorful nodes" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA90OtF5DRjKBTw_un5JuPMnIG1L3ZFKUpECRUQX0pbtvHrRpeRueqBAqzRiPc2LgQfMFCJQ_C99WsNv5MG9JP8K6LLC-FeK9x6jY4_J093z3MXfkn9d8vmx-ONGa94kR8krPa3tbsOc6KtUOCfONIF4R9Z0wlktYTScAJNviu0xovUk_k7E6E6a-kaF4sL9BvQIf57DETssSuU7j9m_8uYq5ZxZaUFqzoCWCjKrIIrjNATEnTfm9c6wiJyrFSpfIFjunbXTFFgSbM");'>
</div>
<div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-slate-dark dark:text-white text-xs font-bold px-2 py-1 rounded">
                            AI &amp; ML
                        </div>
</div>
<div class="flex flex-col flex-1 p-6">
<div class="flex items-center gap-2 text-xs text-slate-medium mb-3">
<span>Jul 30, 2023</span>
<span>•</span>
<span>6 min read</span>
</div>
<h3 class="text-xl font-bold text-slate-dark dark:text-white mb-3 group-hover:text-primary transition-colors">
                            AI in Design Workflows
                        </h3>
<p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3 mb-6 flex-1">
                            Generative AI isn't replacing designers; it's supercharging them. Here's our internal stack for rapid prototyping.
                        </p>
<div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-white/10">
<img alt="Alex Rivera" class="w-8 h-8 rounded-full object-cover" data-alt="Man with glasses smiling" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiF8JvIssRK0ZAqdgxKr1WeePg7xzIVe-UTP8EzO7X-0UEjfwCVulm--qogcnBGic-vEDBT-TKZcxJ97-9Q-kaoVgJ1QCFmiSY4a6iZeEB6ucUCBZKyJJ_xOw42eIHVCeXOWaIK1Edc-l4TmSn-pzfO0VY8slZRIIbbWyWwlXP3U9rgJVPcM1eFxmnf61K974t-UaIdqc8T3WSCyLO_wAXXrqyzjFWdjnVxPZhWbkRGqDspK-Sl8uX6Ajp1DptGdzBrOQD55XUXas"/>
<span class="text-xs font-medium text-slate-dark dark:text-white">Alex Rivera</span>
</div>
</div>
</article>
<div class="col-span-1 md:col-span-2 lg:col-span-1 bg-gradient-to-br from-primary/10 to-primary/5 border border-primary/20 rounded-xl p-8 flex flex-col justify-center items-start text-left">
<div class="size-12 rounded-full bg-primary/20 flex items-center justify-center text-primary mb-6">
<span class="material-symbols-outlined text-[28px]">mail</span>
</div>
<h3 class="text-2xl font-black text-slate-dark dark:text-white mb-2">
                        Weekly Tech Digest
                    </h3>
<p class="text-sm text-slate-600 dark:text-slate-300 mb-6">
                        Join 5,000+ developers receiving our curated list of engineering patterns and design trends.
                    </p>
<form class="w-full space-y-3">
<input class="w-full px-4 py-2.5 rounded-lg border-0 bg-white dark:bg-white/10 focus:ring-2 focus:ring-primary text-slate-dark dark:text-white placeholder:text-slate-400" placeholder="Enter your email" type="email"/>
<button class="w-full bg-slate-dark hover:bg-slate-800 dark:bg-white dark:text-slate-900 dark:hover:bg-gray-200 text-white font-bold py-2.5 rounded-lg transition-colors">
                            Subscribe
                        </button>
</form>
<p class="text-xs text-slate-400 mt-4">No spam, unsubscribe anytime.</p>
</div>
<article class="group flex flex-col bg-white dark:bg-white/5 rounded-xl border border-[#e7f3f2] dark:border-white/10 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 hover:border-primary/50">
<div class="relative h-48 overflow-hidden">
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-110" data-alt="Code editor screen with backend code syntax" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCBZ1s1Q9iJsTN-QzmL0_JeornEhuc8xN8ojE1pRrrSyxXhP_toXCcueIvtHBaOHCtvPOAZUXwVMCOcpoWkTNXurNsvsj9k5HeFF7st_LSR4SR6NZ9O06BG_3RZQ8UbzywXmEZAVQZYH91j8P9KU-QA7bgsc-NVP4YeXsbUa3HjJIiP2Opvzv_GFGhw5sbvLF3wSWNfL-014vOSb-YhdgeBiI003U5g42KDHI7gg6nCCWRqI6N4vbOYECGiE4_4C8gQkqw6JC0JSWA");'>
</div>
<div class="absolute top-3 left-3 bg-white/90 dark:bg-black/80 backdrop-blur text-slate-dark dark:text-white text-xs font-bold px-2 py-1 rounded">
                            Backend
                        </div>
</div>
<div class="flex flex-col flex-1 p-6">
<div class="flex items-center gap-2 text-xs text-slate-medium mb-3">
<span>Jul 12, 2023</span>
<span>•</span>
<span>10 min read</span>
</div>
<h3 class="text-xl font-bold text-slate-dark dark:text-white mb-3 group-hover:text-primary transition-colors">
                            Optimizing Database Queries
                        </h3>
<p class="text-sm text-slate-600 dark:text-slate-300 line-clamp-3 mb-6 flex-1">
                            A technical deep dive into indexing strategies and query planning for PostgreSQL in high-throughput applications.
                        </p>
<div class="flex items-center gap-3 pt-4 border-t border-gray-100 dark:border-white/10">
<img alt="James Lee" class="w-8 h-8 rounded-full object-cover" data-alt="Portrait of a young man" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCfnz7er_Oq2DWVqRtXzf5ficlH21382MIolgMNvn51Fe3TVObaTqDWlajXNXiMjliNNPEtLHFP1DNrQ-Cthfop4xbGOzr1hH1Sg7mA78lAWrI6ngoGcZ7C5wnGmYKCt3cwJ2jFeuhAXZMxTpu9mukELHV-OxbArbGk4ZJngEKIkx_dK8QVNTL3gZp7eUGm_TEjVS_vqVFAT-k4__NZniPdtmjX-ESTef7x0eY01CatY-55ytKewheMbKcFMizhUVzO-vpaaoONrF4"/>
<span class="text-xs font-medium text-slate-dark dark:text-white">James Lee</span>
</div>
</div>
</article>
</div>
<div class="flex justify-center mt-12">
<button class="flex items-center gap-2 px-6 py-3 border border-[#e7f3f2] dark:border-white/20 hover:border-primary dark:hover:border-primary bg-white dark:bg-white/5 rounded-lg text-slate-dark dark:text-white font-medium transition-all group">
                    Load More Articles
                    <span class="material-symbols-outlined text-[20px] group-hover:translate-y-0.5 transition-transform">expand_more</span>
</button>
</div>
</section>
</main>
@endsection
