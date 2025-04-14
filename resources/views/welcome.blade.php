<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Financial Tracker</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #000000;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        .header {
            text-align: center;
            padding: 4rem 0;
            border-bottom: 1px solid #e5e5e5;
        }
        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .tagline {
            font-size: 1.25rem;
            color: #666;
            margin-bottom: 2rem;
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            padding: 4rem 0;
        }
        .feature {
            text-align: center;
            padding: 2rem;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }
        .feature:hover {
            transform: translateY(-5px);
        }
        .feature-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .feature-description {
            color: #666;
            margin-bottom: 1.5rem;
        }
        .cta {
            text-align: center;
            padding: 4rem 0;
            background-color: #f9f9f9;
        }
        .cta-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        .cta-description {
            font-size: 1.125rem;
            color: #666;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #000;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #333;
        }
        .btn-secondary {
            background-color: #fff;
            color: #000;
            border: 1px solid #000;
        }
        .btn-secondary:hover {
            background-color: #f5f5f5;
        }
        .footer {
            text-align: center;
            padding: 2rem 0;
            border-top: 1px solid #e5e5e5;
            color: #666;
        }
        .developers {
            margin-top: 1rem;
            font-weight: 500;
        }
        @media (max-width: 768px) {
            .header {
                padding: 2rem 0;
            }
            .logo {
                font-size: 2rem;
            }
            .features {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">Student Financial Tracker</div>
            <div class="tagline">Manage your student finances with ease</div>
            <div>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
            </div>
        </header>

        <section class="features">
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Track Income & Expenses</h3>
                <p class="feature-description">Keep track of all your financial transactions in one place. Monitor your income from part-time jobs, bursaries, and expenses.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h3 class="feature-title">Categorize Transactions</h3>
                <p class="feature-description">Organize your transactions into categories to better understand your spending habits and identify areas for savings.</p>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h3 class="feature-title">Generate Reports</h3>
                <p class="feature-description">Get detailed reports and insights about your financial situation to make informed decisions about your student budget.</p>
            </div>
        </section>

        <section class="cta">
            <h2 class="cta-title">Start Managing Your Finances Today</h2>
            <p class="cta-description">Join thousands of students who are taking control of their financial future with our easy-to-use financial tracking tool.</p>
            <div>
                <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
            </div>
        </section>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} Student Financial Tracker. All rights reserved.</p>
            <p class="developers">Developed by DUSABIMANA Hozana AND UWIMANA Anitha</p>
        </footer>
    </div>
</body>
</html>