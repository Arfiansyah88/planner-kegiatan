<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Kegiatan</title>
    <style>
        /* ===== BODY ===== */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f0fdf4; 
            color: #064e3b; 
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 60px;
            color: #065f46;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* ===== TOMBOL TAMBAH ===== */
        .add-btn {
            display: inline-block;
            background: linear-gradient(135deg, #10b981, #047857);
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 15px;
        }

        .add-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            background: linear-gradient(135deg, #047857, #065f46);
        }

        /* ===== TABLE ===== */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            background: white;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background: linear-gradient(135deg, #10b981, #047857);
            color: white;
            font-weight: 600;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:nth-child(even) {
            background-color: #f0fdf4;
        }

        tbody tr:hover {
            background-color: #d1fae5;
            transform: scale(1.02);
        }

        /* ===== TOMBOL AKSI ===== */
        .aksi {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .aksi button {
            padding: 8px 14px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
        }

        .update-btn {
            background: linear-gradient(135deg, #34d399, #059669);
            color: white;
        }

        .update-btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #059669, #065f46);
        }

        .delete-btn {
            background: linear-gradient(135deg, #f87171, #dc2626);
            color: white;
        }

        .delete-btn:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }

        .button-link {
            text-decoration: none;
        }

        /* ===== NOTIF ===== */
        .success-msg {
            text-align: center;
            margin-bottom: 15px;
            padding: 10px;
            background-color: #d1fae5;
            color: #065f46;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h3>Daftar Kegiatan</h3>

    <?php if(session('success')): ?>
        <div class="success-msg"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <a href="<?php echo e(route('kegiatan.create')); ?>" class="add-btn">Tambah Kegiatan</a>

    <table>
        <thead>
            <tr>
                <th>Kegiatan</th>
                <th>Status</th>
                <th>Penanggung Jawab</th>
                <th>Peserta</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Tempat</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $kegiatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($k->kegiatan); ?></td>
                    <td><?php echo e($k->status); ?></td>
                    <td><?php echo e($k->penanggung_jawab); ?></td>
                    <td><?php echo e($k->peserta_kegiatan); ?></td>
                    <td><?php echo e($k->tanggal_mulai); ?></td>
                    <td><?php echo e($k->tanggal_selesai); ?></td>
                    <td><?php echo e($k->tempat_kegiatan); ?></td>
                    <td><?php echo e($k->notes); ?></td>
                    <td class="aksi">
                        <a class="button-link" href="<?php echo e(route('kegiatan.edit', $k->id)); ?>">
                            <button type="button" class="update-btn">Update</button>
                        </a>
                        <form method="POST" action="<?php echo e(route('kegiatan.destroy', $k->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\Modul Program\planner-tahunan\resources\views/kegiatan/index.blade.php ENDPATH**/ ?>