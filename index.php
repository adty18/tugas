<?php
include 'koneksi.php';
include 'crud.php';

// Initialize $tasks variable
$tasks = null;

// Tambahkan tugas jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    tambahTugas($_POST['task_name'], $_POST['deadline'], $_POST['status']);
}

// Ambil tugas-tugas dari database
$tasks = ambilTugas();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <!-- Add Tailwind CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <div class="container mx-auto p-4">
            <h2 class="text-2xl mb-4">Daftar Tugas</h2>

            <ul>
                <?php 
                if ($tasks && $tasks->num_rows > 0) {
                    while ($task = $tasks->fetch_assoc()) : ?>
                        <li class="mb-4">
                            <?= $task['task_name'] ?> - Deadline: <?= $task['deadline'] ?> - Status: <?= $task['status'] ?>
                            <a href="edit.php?id=<?= $task['id'] ?>" class="ml-2 text-blue-500">Edit</a> |
                            <a href="hapus.php?id=<?= $task['id'] ?>" class="text-red-500">Hapus</a>
                        </li>
                    <?php endwhile;
                } else {
                    echo "<li>Tidak ada tugas.</li>";
                }
                ?>
            </ul>

            <h2 class="text-2xl mb-4">Tambah Tugas Baru</h2>

            <form method="post" action="">
                <div class="mb-4">
                    <label for="task_name" class="block">Nama Tugas:</label>
                    <input type="text" name="task_name" id="task_name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="deadline" class="block">Deadline:</label>
                    <input type="date" name="deadline" id="deadline" class="border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                </div>
                <div class="mb-4">
                    <label for="status" class="block">Status:</label>
                    <select name="status" id="status" class="border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                        <option value="Belum Selesai">Belum Selesai</option>
                        <option value="Selesai">Selesai</option>
                        <option value="Dalam Proses">Dalam Proses</option>
                        <option value="Ditunda">Ditunda</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Tugas</button>
            </form>
        </div>
    </div>

</body>

</html>
