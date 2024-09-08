<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist APP - Registrasi User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f4f8;
            font-family: 'Press Start 2P', cursive;
            overflow: hidden;
            position: relative;
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
        .title-container {
        position: absolute;
        top: 12%; /* Mengatur jarak dari bagian atas halaman */
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        z-index: 2;
    }
    .title-container h1 {
        font-size: 2rem;
        color: #4a148c;
    }
        .logo h4 {
            color: #4a148c;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
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
        .alert {
            margin-bottom: 1rem;
            font-size: 0.875rem;
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
        .pixel-text {
            position: relative;
            display: inline-block;
            overflow: hidden;
        }
        .pixel-text::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.2);
            animation: pixelate 1s infinite;
            z-index: 0;
            transform: translate(-50%, -50%) scale(0);
        }
        @keyframes pixelate {
            0% { transform: translate(-50%, -50%) scale(0); }
            50% { transform: translate(-50%, -50%) scale(1); }
            100% { transform: translate(-50%, -50%) scale(0); }
        }
        .pixel-text span {
            position: relative;
            z-index: 1;
        }
        .gradient-bg {
        background: linear-gradient(135deg, #b39ddb 0%, #e1bee7 100%);
        color: #4a148c;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        z-index: 1;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .gradient-bg:hover {
        transform: translateY(-10px);
    }

    .gradient-bg h3 {
        color: white;
        font-size: 1.5rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        animation: fadeIn 1s ease-in-out;
    }

    .gradient-bg p {
        color: white;
        font-size: 1rem;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>
<body>
    <!-- Title of the App -->
    <div class="title-container">
        <h1>Todolist APP</h1>
    </div>
    <div class="pixel-background"></div>
    <div class="stars"></div>

    
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6">
                <div class="card">
                    <form action="/auth/register" method="post">
                        <?= csrf_field() ?>
                        <h3 class="text-center mb-4 pixel-text"><span>Registrasi User</span></h3>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="form-label">Konfirmasi Password</label>
                            <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button class="btn gradient-btn btn-block mt-3" type="submit">Registrasi</button>
                        </div>

                        <div class="text-center mt-4">
                            <a href="/login" class="text-secondary">Sudah punya akun? Login di sini</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 gradient-bg d-flex flex-column justify-content-center align-items-center p-4">
    <h3 class="text-center">Bersiap untuk Hari yang Lebih Teratur?</h3>
    <p class="text-center">Akses semua tugas dan daftar Anda di satu tempat. Mulailah produktivitas Anda dengan login ke akun Anda.</p>
</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
