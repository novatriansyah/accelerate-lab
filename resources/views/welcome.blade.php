<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                        <path d="M61.8548 14.6253C61.8548 14.332 61.8339 14.0381 61.7921 13.7442C61.7084 13.1565 61.5421 12.5895 61.2931 12.0432C61.0441 11.4962 60.7125 10.9899 60.3035 10.5239C59.8945 10.0579 59.4071 9.64259 58.8488 9.28787C58.2905 8.93247 57.6539 8.6476 56.9531 8.43231C56.2523 8.21702 55.4931 8.08212 54.6837 8.02024C53.8743 7.95836 53.0142 7.97893 52.1243 8.08212C50.9333 8.2471 49.7731 8.59247 48.653 9.1157C47.5336 9.63391 46.4638 10.3208 45.4533 11.166C44.4428 12.0112 43.5015 12.9975 42.6393 14.1126C41.7771 15.2277 41.0039 16.4616 40.3298 17.8042C39.6556 19.1468 39.0805 20.5898 38.6146 22.1223C38.1486 23.6548 37.7918 25.2673 37.553 26.9496C37.3141 28.632 37.1956 30.3671 37.1956 32.1449C37.1956 33.9227 37.3141 35.6578 37.553 37.3394C37.7918 39.0218 38.1486 40.635 38.6146 42.1675C39.0805 43.7008 39.6556 45.1431 40.3298 46.4857C41.0039 47.8283 41.7771 49.0622 42.6393 50.1773C43.5015 51.2924 44.4428 52.2787 45.4533 53.1239C46.4638 53.9691 47.5336 54.6567 48.653 55.1749C49.7731 55.6931 50.9333 56.0378 52.1243 56.2028C53.0142 56.306 53.8743 56.3265 54.6837 56.2647C55.4931 56.2028 56.2523 56.0679 56.9531 55.8526C57.6539 55.638 58.2905 55.3531 58.8488 54.9977C59.4071 54.6422 59.8945 54.2269 60.3035 53.7609C60.7125 53.2949 61.0441 52.7886 61.2931 52.2423C61.5421 51.696 61.7084 51.129 61.7921 50.5413C61.8339 50.2474 61.8548 49.9535 61.8548 49.6602V14.6253ZM54.062 13.3384C53.4866 13.212 52.8893 13.1678 52.2921 13.2062C51.6948 13.2453 51.107 13.3667 50.5398 13.567C49.9726 13.7673 49.4312 14.0427 48.9243 14.3881C48.4174 14.7342 47.9498 15.1458 47.5266 15.6182C47.1034 16.0906 46.7297 16.6223 46.4111 17.2045C46.0918 17.7867 45.8321 18.4119 45.6396 19.0709C45.4471 19.7299 45.3216 20.4184 45.2662 21.1276C45.2108 21.8368 45.2266 22.5533 45.3125 23.2682L21.2936 23.2682C21.4645 22.4439 21.7225 21.6443 22.0676 20.8732C22.4127 20.1028 22.8423 19.3731 23.3529 18.6912C23.8635 18.0093 24.4515 17.3807 25.1095 16.8113C25.7675 16.2412 26.4913 15.7337 27.271 15.2936C28.0507 14.8535 28.8831 14.4845 29.7583 14.192C30.6342 13.8988 31.5496 13.6861 32.4953 13.5582C33.441 13.4296 34.4152 13.3854 35.4085 13.4296C36.4018 13.4738 37.4087 13.6104 38.4148 13.8346L38.4148 32.1449L21.3252 32.1449C21.3252 33.1672 21.4224 34.1688 21.6169 35.1448C21.8114 36.1208 22.103 37.0654 22.4863 37.9713C22.8696 38.8779 23.3421 39.7395 23.8963 40.5488C24.4505 41.3581 25.0839 42.1125 25.7872 42.8054C26.4905 43.4983 27.2619 44.1243 28.0898 44.6758C28.9177 45.2273 29.8002 45.6983 30.722 46.0824C31.6438 46.4665 32.6024 46.7614 33.5841 46.9603C34.5658 47.1592 35.5681 47.2585 36.581 47.2546C37.5939 47.2507 38.6143 47.1432 39.6329 46.9328L39.6329 55.8879C38.6268 56.1121 37.62 56.2444 36.6139 56.2843C35.6078 56.3241 34.6041 56.2716 33.6063 56.1266C32.6085 55.9816 31.6214 55.7443 30.6542 55.4185C29.687 55.0927 28.7461 54.6808 27.8396 54.188C26.9331 53.6952 26.0669 53.1241 25.2498 52.4822C24.4327 51.8403 23.6723 51.1322 22.9754 50.3639C22.2785 49.5955 21.6517 48.7722 21.1027 47.9004C20.5537 47.0286 20.0883 46.1139 19.7135 45.1643C19.3387 44.2147 19.0573 43.2343 18.8752 42.228C18.6931 41.2217 18.6134 40.1947 18.6343 39.1535C18.6552 38.1123 18.7766 37.0671 18.9953 36.0254C19.214 34.9837 19.5284 33.9513 19.9328 32.938L19.9328 13.8346L18.6343 13.8346C18.6343 12.8123 18.7315 11.8107 18.926 10.8347C19.1205 9.8587 19.4121 8.9141 19.7954 8.00822C20.1787 7.10233 20.6511 6.24074 21.2054 5.43145C21.7596 4.62216 22.393 3.86777 23.0963 3.17487C23.7996 2.48197 24.571 1.85599 25.3989 1.30449C26.2268 0.752994 27.1093 0.28196 28.0311 0.108621L29.121 -0.0784912L29.121 13.8346L37.1956 13.8346L37.1956 8.05051C37.8283 8.05051 38.461 8.05051 39.0937 8.05051L39.0937 13.8346L44.0937 13.8346L44.0937 8.05051C44.7264 8.05051 45.3591 8.05051 45.9918 8.05051L45.9918 13.8346L50.9918 13.8346L50.9918 8.49962C51.666 8.58336 52.3292 8.74834 52.9716 8.99201C53.614 9.23636 54.2265 9.55509 54.7984 9.94094C55.3703 10.3268 55.8924 10.776 56.3543 11.2823C56.8162 11.7886 57.2155 12.3456 57.5451 12.9461C57.8754 13.5466 58.1321 14.1859 58.3094 14.8556L54.062 14.8556L54.062 13.3384Z" fill="#FF2D20" />
                    </svg>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Documentation</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laravel has wonderful documentation covering every aspect of the framework. Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://laracasts.com" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Laracasts</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <a href="https://laravel-news.com" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 18V7.125C4.5 6.504 5.004 6 5.625 6H9" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Laravel News</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </p>
                            </div>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </a>

                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l-.775.387-1.255 1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-.775.387-1.255 1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-.775.387-1.255 1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-.775.387-1.255 1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-.775.387-1.255 1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-3.069 1.535c-.84.42-1.155 1.45-.825 2.286l.319.8, .319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387 1.255-1.255a3 3 0 013.182 0l.076.153c.217.433.132.956-.21 1.298l-1.348 1.348c-.21.21-.329.497-.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.775-.387-1.255-1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-.775.387-1.255 1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-3.069 1.535c-.84.42-1.155 1.45-.825 2.286l.319.8.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l-.775.387-1.255 1.255a3 3 0 01-3.182 0l-.076-.153c-.217-.433-.132-.956.21-1.298l1.348-1.348c.21-.21.329-.497.329-.795V14.5c0-.426-.24-.815-.622-1.006l-.153-.076c-.433-.217-.956-.132-1.298.21l-3.069 1.535c-.84.42-1.155 1.45-.825 2.286l.319.8z" />
                                    </svg>
                                </div>

                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</h2>

                                <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Forge</a>, <a href="https://vapor.laravel.com" class="underline hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Vapor</a>, <a href="https://nova.laravel.com" class="underline hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Nova</a>, and <a href="https://envoyer.io" class="underline hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel-livewire.com" class="underline hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Livewire</a>, <a href="https://inertiajs.com" class="underline hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inertia</a>, or <a href="https://alpinejs.dev" class="underline hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Alpine.js</a> for situations where you need to build dynamic user interfaces.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
