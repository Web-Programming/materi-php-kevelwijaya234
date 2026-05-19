<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            background-color: #f3f4f6; 
        }
        .card { 
            background: white; 
            padding: 2.5rem; 
            border-radius: 12px; 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); 
            text-align: center; 
            width: 100%;
            max-width: 350px;
        }
        h2 {
            margin-top: 0;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }
        input { 
            padding: 0.75rem; 
            margin-bottom: 1rem; 
            border: 1px solid #d1d5db; 
            border-radius: 6px; 
            width: 100%; 
            box-sizing: border-box; 
            font-size: 1rem;
        }
        input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        button { 
            padding: 0.75rem 1rem; 
            background: #3b82f6; 
            color: white; 
            border: none; 
            border-radius: 6px; 
            cursor: pointer; 
            width: 100%; 
            font-size: 1rem;
            font-weight: 600;
            transition: background 0.2s;
        }
        button:hover { 
            background: #2563eb; 
        }
        .back-link {
            display: inline-block; 
            margin-top: 1.5rem; 
            color: #3b82f6; 
            text-decoration: none;
            font-weight: 500;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .welcome-text {
            color: #10b981;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="card">
        @if(isset($username))
            <h2 class="welcome-text">Welcome, {{ $username }}! 🎉</h2>
            <p>It's great to have you here.</p>
            <a href="{{ url('/') }}" class="back-link">Go Back</a>
            <a href="">|</a>
            <a href="{{ route('produk.index') }}" class="back-link">Cari Produk</a>
        @else
            <h2>Login</h2>
            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <input type="text" name="username" placeholder="Enter your username" required autocomplete="off">
                <button type="submit">Login</button>
            </form>
        @endif
    </div>
</body>
</html>
