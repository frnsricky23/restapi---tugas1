<?php

namespace App\Controllers;

use App\Models\todolistModel;

class todolistController extends BaseController
{
    protected $todolistModel;
    protected $session;

    public function __construct()
    {
        $this->todolistModel = new todolistModel();
        $this->session = \Config\Services::session(); // Mengakses session
    }

    public function index()
    {
        // Mengambil data todo list dari model
        $data['todos'] = $this->todolistModel->getTodos();
        
        // Tampilkan halaman todo dengan data yang diambil
        return view('todo_view', $data);
    }

    public function add()
    {
        // Mengambil task dari form input
        $task = $this->request->getPost('task');
        $currentTaskCount = $this->todolistModel->getTodoCount();

        // Cek apakah input task kosong
        if (!empty($task)) {
            // Cek jika sudah ada 5 tugas
            if ($currentTaskCount >= 5) {
                // Set flashdata untuk pesan error jika lebih dari 5 tugas
                $this->session->setFlashdata('error', 'Anda tidak dapat menambahkan lebih dari 5 tugas.');
            } else {
                // Tambah tugas ke database
                $this->todolistModel->addTodo($task);
                // Set flashdata untuk pesan sukses
                $this->session->setFlashdata('success', 'Tugas berhasil ditambahkan.');
            }
        }
        return redirect()->to('/todo');
    }

    public function complete($id)
    {
        // Menandai tugas sebagai selesai
        $this->todolistModel->completeTodo($id);
        // Set flashdata untuk pesan sukses
        $this->session->setFlashdata('success', 'Tugas selesai.');
        return redirect()->to('/todo');
    }

    public function delete($id)
    {
        // Menghapus tugas
        $this->todolistModel->deleteTodo($id);
        return redirect()->to('/todo');
    }
}
