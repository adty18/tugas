<?php
include 'crud.php';

// Ambil ID tugas dari parameter URL
$id = $_GET['id'];

// Ambil informasi tugas berdasarkan ID
$result = $koneksi->query("SELECT * FROM tasks WHERE id=$id");
$task = $result->fetch_assoc();

// Jika form disubmit, lakukan update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_name = $_POST['task_name'];
    $deadline = $_POST['deadline'];
    $status = $_POST['status'];

    updateTugas($id, $task_name, $deadline, $status);

    // Redirect kembali ke halaman utama setelah berhasil update
    header("Location: index.php");
    exit();
}
?>

<h2>Edit Tugas</h2>

<form method="post" action="">
    Nama Tugas: <input type="text" name="task_name" value="<?= $task['task_name'] ?>" required><br>
    Deadline: <input type="date" name="deadline" value="<?= $task['deadline'] ?>" required><br>
    Status: <input type="text" name="status" value="<?= $task['status'] ?>" required><br>
    <button type="submit">Update Tugas</button>
</form>
