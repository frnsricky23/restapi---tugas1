<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist APP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f0f4f8;
            font-family: 'Press Start 2P', cursive;
            overflow: hidden;
            position: relative;
        }

        .title-container {
            margin-bottom: 2rem;
            text-align: center;
        }

        .title-container h1 {
            color: #4a148c;
            font-size: 2.5rem;
        }

        .card {
            border-radius: 1rem;
            background-color: #ffffff;
            border: 2px solid #d1c4e9;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
            padding: 1rem;
        }

        .form-label {
            color: #7e57c2;
            font-size: 0.875rem;
        }

        .form-control {
            font-size: 0.875rem;
            padding: 0.5rem;
        }

        .gradient-btn {
            background: #b39ddb;
            color: white;
            border: none;
            position: relative;
            overflow: hidden;
            transition: background 0.3s ease;
            font-size: 0.875rem;
            padding: 0.5rem;
        }

        .gradient-btn:hover {
            background: #9575cd;
        }

        .gradient-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            transition: transform 0.3s ease;
            transform: translate(-50%, -50%) scale(0);
            z-index: 0;
        }

        .gradient-btn:hover::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .gradient-bg {
            background: #e1bee7;
            color: #4a148c;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1;
            padding: 1rem;
        }

        .gradient-bg h3, .gradient-bg p {
            color: #4a148c;
            font-size: 1rem;
        }

        .pixel-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/paper-fabric.png');
            background-size: 50px 50px;
            opacity: 0.1;
            z-index: 0;
            animation: pixelMove 10s infinite linear;
        }

        @keyframes pixelMove {
            0% { background-position: 0 0; }
            100% { background-position: 50px 50px; }
        }

        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/stardust.png');
            background-size: cover;
            opacity: 0.3;
            z-index: 0;
            animation: twinkle 5s infinite alternate;
        }

        @keyframes twinkle {
            0% { opacity: 0.3; }
            100% { opacity: 0.6; }
        }

    </style>
</head>
<body>
    <div class="pixel-background"></div>
    <div class="stars"></div>

    <!-- Title of the App -->
    <div class="title-container">
        <h1>Todolist APP</h1>
    </div>

    <div class="container">
        <div class="row no-gutters justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form action="/auth/process" method="post">
                        <?= csrf_field() ?>
                        <p class="text-center">Please login to your account</p>

                        <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required />
                        </div>

                        <div class="text-center">
                            <button class="btn gradient-btn btn-block mt-3" type="submit">Log in</button>
                        </div>

                        <div class="text-center mt-4">
                            <p>Don't have an account?</p>
                            <a href="/register" class="btn btn-outline-secondary">Create new</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
