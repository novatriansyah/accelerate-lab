<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="{{ $demo->description ?: 'Interactive client prototype by Accelerate Lab.' }}">
    
    <!-- Open Graph & Social Cards (WhatsApp, Telegram, Slack, LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $demo->title }} — Prototype Showcase | Accelerate Lab">
    <meta property="og:description" content="{{ $demo->description ?: 'Interactive client prototype by Accelerate Lab.' }}">
    <meta property="og:url" content="{{ route('demos.showcase', $demo->slug) }}">
    @if($demo->thumbnail)
        <meta property="og:image" content="{{ asset('storage/' . $demo->thumbnail) }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $demo->thumbnail) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $demo->title }} — Prototype Showcase">
    <meta name="twitter:description" content="{{ $demo->description ?: 'Interactive client prototype by Accelerate Lab.' }}">

    <title>{{ $demo->title }} — Prototype Showcase | Accelerate Lab</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background-color: #090d16; color: #f1f5f9; height: 100vh; display: flex; flex-direction: column; overflow: hidden; }
        
        .toolbar {
            height: 64px;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 50;
            flex-shrink: 0;
        }

        .toolbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .agency-brand {
            display: flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: -0.01em;
            padding-right: 16px;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .agency-brand span.dot {
            width: 8px;
            height: 8px;
            background: #38bdf8;
            border-radius: 50%;
            box-shadow: 0 0 10px #38bdf8;
        }

        .demo-meta {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .demo-client-logo {
            height: 28px;
            width: auto;
            max-width: 100px;
            object-fit: contain;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.05);
            padding: 2px 4px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }


        .demo-title {
            font-size: 13.5px;
            font-weight: 600;
            color: #f8fafc;
        }

        .demo-client-badge {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            background: rgba(56, 189, 248, 0.1);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.25);
            padding: 2px 8px;
            border-radius: 4px;
        }

        .device-switcher {
            display: flex;
            align-items: center;
            background: rgba(0, 0, 0, 0.4);
            padding: 4px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            gap: 4px;
        }

        .device-btn {
            background: transparent;
            border: none;
            color: #94a3b8;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: 200ms all ease;
        }

        .device-btn:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .device-btn.active {
            background: #0284c7;
            color: #ffffff;
            box-shadow: 0 2px 8px rgba(2, 132, 199, 0.4);
        }

        .toolbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-action {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #f1f5f9;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: 200ms all;
        }

        .btn-action:hover {
            background: rgba(255, 255, 255, 0.12);
            border-color: rgba(255, 255, 255, 0.25);
            color: #ffffff;
        }

        .btn-fullscreen {
            background: #38bdf8;
            color: #090d16;
            border: none;
        }

        .btn-fullscreen:hover {
            background: #7dd3fc;
            color: #090d16;
        }

        .preview-viewport {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #040711;
            overflow: hidden;
            position: relative;
            padding: 16px 0;
        }

        .frame-wrapper {
            height: 100%;
            width: 100%;
            transition: width 350ms cubic-bezier(0.4, 0, 0.2, 1), box-shadow 350ms ease;
            position: relative;
            display: flex;
            justify-content: center;
        }

        .frame-wrapper.mode-desktop {
            width: 100%;
            padding: 0;
        }

        .frame-wrapper.mode-tablet {
            width: 768px;
            border-radius: 12px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
        }

        .frame-wrapper.mode-mobile {
            width: 390px;
            border-radius: 20px;
            box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.8), 0 0 0 2px rgba(255, 255, 255, 0.15);
            overflow: hidden;
        }

        iframe#demo-frame {
            width: 100%;
            height: 100%;
            border: none;
            background: #ffffff;
        }

        @media (max-width: 768px) {
            .device-switcher { display: none; }
            .agency-brand { border-right: none; }
        }
    </style>
</head>
<body>

    <header class="toolbar">
        <div class="toolbar-left">
            <a href="/" class="agency-brand" aria-label="Accelerate Lab Homepage">
                <span class="dot"></span>
                <span>Accelerate Lab</span>
            </a>
            <div class="demo-meta">
                @if($demo->client_logo)
                    <img src="{{ asset('storage/' . $demo->client_logo) }}" alt="{{ $demo->client_name ?? $demo->title }}" class="demo-client-logo">
                @endif
                <span class="demo-title">{{ $demo->title }}</span>
                @if($demo->client_name)
                    <span class="demo-client-badge">{{ $demo->client_name }}</span>
                @endif
            </div>
        </div>


        <div class="device-switcher" role="group" aria-label="Device Viewport Switcher">
            <button class="device-btn active" id="btn-desktop" onclick="setDevice('desktop')" aria-label="Desktop View">
                🖥️ <span>Desktop</span>
            </button>
            <button class="device-btn" id="btn-tablet" onclick="setDevice('tablet')" aria-label="Tablet View">
                📱 <span>Tablet</span>
            </button>
            <button class="device-btn" id="btn-mobile" onclick="setDevice('mobile')" aria-label="Mobile View">
                📱 <span>Mobile</span>
            </button>
        </div>

        <div class="toolbar-right">
            <button class="btn-action" onclick="reloadFrame()" aria-label="Reload Preview">
                🔄 <span>Reload</span>
            </button>
            <a href="{{ route('demos.preview', $demo->slug) }}" target="_blank" class="btn-action btn-fullscreen" aria-label="Open Fullscreen in New Window">
                <span>Open Fullscreen</span> ↗
            </a>
        </div>
    </header>

    <main class="preview-viewport">
        <div class="frame-wrapper mode-desktop" id="frame-wrapper">
            <iframe id="demo-frame" src="{{ route('demos.preview', $demo->slug) }}" title="{{ $demo->title }} Preview"></iframe>
        </div>
    </main>

    <script>
        function setDevice(mode) {
            const wrapper = document.getElementById('frame-wrapper');
            document.querySelectorAll('.device-btn').forEach(btn => btn.classList.remove('active'));
            
            wrapper.className = 'frame-wrapper mode-' + mode;
            document.getElementById('btn-' + mode).classList.add('active');
        }

        function reloadFrame() {
            const frame = document.getElementById('demo-frame');
            frame.src = frame.src;
        }

        // Initialize default device
        @if($demo->default_device && in_array($demo->default_device, ['desktop', 'tablet', 'mobile']))
            setDevice('{{ $demo->default_device }}');
        @endif
    </script>
</body>
</html>
