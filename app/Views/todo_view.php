<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        .container {
            margin-top: 20px; 
            max-width: 600px;
            position: relative;
            z-index: 1;
        }
        .todo-item {
            margin-bottom: 15px;
            border-radius: 1rem;
            background-color: #ffffff;
            border: 2px solid #d1c4e9;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }
        .todo-item.completed {
            background-color: #e9ecef;
        }
        .todo-item.completed .task {
            text-decoration: line-through;
            color: #6c757d;
        }
        .task {
            flex: 1;
            font-size: 1.1rem;
        }
        .btn-primary {
            background-color: #b39ddb;
            border-color: #b39ddb;
            font-size: 0.875rem;
            padding: 0.5rem;
            border-radius: 25px;
        }
        .btn-primary:hover {
            background-color: #9575cd;
            border-color: #9575cd;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            font-size: 0.875rem;
            padding: 0.5rem;
            border-radius: 25px;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #c82333;
        }
        .form-control {
            border-radius: 25px;
            box-shadow: inset 0 0 5px rgba(0,0,0,0.1);
            font-size: 0.875rem;
            padding: 0.5rem;
        }
        .btn {
            border-radius: 25px;
            padding: 10px 20px;
        }
        .alert-info {
            background-color: #d1ecf1;
            border-color: #bee5eb;
            color: #0c5460;
        }
        .alert-info a {
            color: #0c5460;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .alert-danger a {
            color: #721c24;
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
    <div class="container">
        <h2 class="text-center mb-4">To Do List</h2>

        <!-- Form to add new tasks -->
        <form action="<?= site_url('/todo/add') ?>" method="POST" class="form-inline mb-4 justify-content-center">
            <div class="form-group flex-fill">
                <input type="text" name="task" class="form-control w-75" placeholder="<Teks to do>" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>

        <!-- Display messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <!-- Display todo list -->
        <?php if (!empty($todos)): ?>
            <?php foreach ($todos as $todo): ?>
                <div class="todo-item <?= $todo['status'] == 'completed' ? 'completed' : '' ?>">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="task">
                            <?= esc($todo['task']) ?>
                        </div>
                        <div class="actions">
                            <?php if ($todo['status'] == 'pending'): ?>
                                <a href="<?= site_url('/todo/complete/'.$todo['id']) ?>" class="btn btn-primary btn-sm">Selesai</a>
                            <?php else: ?>
                                <button class="btn btn-primary btn-sm btn-disabled" disabled>Selesai</button>
                            <?php endif; ?>
                            <a href="<?= site_url('/todo/delete/'.$todo['id']) ?>" class="btn btn-danger btn-sm ml-2">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info" role="alert">
                Tidak ada tugas saat ini
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
