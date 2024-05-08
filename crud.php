<?php
include 'koneksi.php';

function tambahTugas($task_name, $deadline, $status) {
    global $koneksi;
    $sql = "INSERT INTO tasks (task_name, deadline, status) VALUES ('$task_name', '$deadline', '$status')";
    return $koneksi->query($sql);
}

function ambilTugas() {
    global $koneksi;
    $sql = "SELECT * FROM tasks";
    return $koneksi->query($sql);
}

function updateTugas($id, $task_name, $deadline, $status) {
    global $koneksi;
    $sql = "UPDATE tasks SET task_name='$task_name', deadline='$deadline', status='$status' WHERE id=$id";
    return $koneksi->query($sql);
}

function hapusTugas($id) {
    global $koneksi;
    $sql = "DELETE FROM tasks WHERE id=$id";
    return $koneksi->query($sql);
}
?>
