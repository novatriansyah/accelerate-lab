<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Protected Client Demo - {{ $demo->title }} | Accelerate Lab</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Inter', sans-serif; background: #090d16; color: #f8fafc; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 20px; }
        .card { background: #0f172a; border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; padding: 36px; max-width: 420px; width: 100%; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); }
        .icon { width: 48px; height: 48px; background: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.25); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-bottom: 20px; color: #38bdf8; }
        .card-logo { max-height: 48px; max-width: 160px; object-fit: contain; margin-bottom: 20px; background: rgba(255, 255, 255, 0.04); padding: 6px 12px; border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.08); }
        h1 { font-size: 20px; font-weight: 700; margin-bottom: 8px; }
        p { font-size: 13.5px; color: #94a3b8; line-height: 1.5; margin-bottom: 24px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: #cbd5e1; margin-bottom: 8px; }
        input[type="password"] { width: 100%; background: #040711; border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 6px; padding: 12px 14px; color: #ffffff; font-size: 14px; outline: none; transition: 200ms border-color; }
        input[type="password"]:focus { border-color: #38bdf8; }
        .btn-submit { width: 100%; background: #0284c7; color: #ffffff; border: none; padding: 12px; border-radius: 6px; font-weight: 600; font-size: 14px; cursor: pointer; transition: 200ms background; }
        .btn-submit:hover { background: #0369a1; }
        .error-box { background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.25); color: #f87171; font-size: 12.5px; padding: 10px 14px; border-radius: 6px; margin-bottom: 18px; }
    </style>
</head>
<body>
    <div class="card">
        @if($demo->client_logo)
            <img src="{{ asset('storage/' . $demo->client_logo) }}" alt="{{ $demo->client_name ?? $demo->title }}" class="card-logo">
        @else
            <div class="icon">🔒</div>
        @endif
        <h1>Protected Client Demo</h1>

        <p>This prototype for <strong>{{ $demo->title }}</strong> is confidential. Please enter the passcode provided by Accelerate Lab to view.</p>

        @if($errors->has('passcode'))
            <div class="error-box">
                {{ $errors->first('passcode') }}
            </div>
        @endif

        <form method="POST" action="{{ route('demos.verify', $demo->slug) }}">
            @csrf
            <div class="form-group">
                <label for="passcode">Access Passcode</label>
                <input type="password" id="passcode" name="passcode" placeholder="Enter access passcode" required autofocus>
            </div>
            <button type="submit" class="btn-submit">Unlock Client Demo →</button>
        </form>
    </div>
</body>
</html>
