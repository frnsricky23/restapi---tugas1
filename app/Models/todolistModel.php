<?php

namespace App\Models;

use CodeIgniter\Model;

class todolistModel extends Model
{
    protected $table = 'todos'; // Nama tabel
    protected $primaryKey = 'id';
    protected $allowedFields = ['task', 'status'];

    // Mengambil semua tugas
    public function getTodos()
    {
        return $this->findAll();
    }

    // Menambahkan tugas baru
    public function addTodo($task)
    {
        $data = [
            'task' => $task,
            'status' => 'pending'
        ];
        $this->save($data);
    }

    // Menandai tugas sebagai selesai
    public function completeTodo($id)
    {
        $this->update($id, ['status' => 'completed']);
    }

    // Menghapus tugas
    public function deleteTodo($id)
    {
        $this->delete($id);
    }

    // Menghitung jumlah tugas
    public function getTodoCount()
    {
        return $this->countAll();
    }
}
