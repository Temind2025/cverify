<!-- resources/views/layouts/frontend.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ \App\Models\Setting::first()->site_name ?? 'Certificate Verification' }}</title>
</head>
<body>
    <header style="background-color: #f8f8f8; padding: 10px; border-bottom: 1px solid #ddd;">
        <div style="max-width: 1200px; margin: 0 auto;">
            @if ($logo = \App\Models\Setting::first()?->logo_url)
                <img src="{{ $logo }}" alt="Logo" style="height: 48px;">
            @else
                <h1 style="font-size: 24px; margin: 0;">{{ \App\Models\Setting::first()->site_name ?? 'Certificate Verification' }}</h1>
            @endif
        </div>
    </header>

    <main style="max-width: 1200px; margin: 20px auto; padding: 0 10px;">
        {{ $slot }}
    </main>
</body>
</html>