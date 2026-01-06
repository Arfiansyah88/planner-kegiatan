<!-- resources/views/kegiatan/update.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Update Activity</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            margin: 20px;
            color: #333;
        }

        h3 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input,
        select,
        textarea,
        button {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 5px rgba(79, 70, 229, 0.5);
            outline: none;
        }

        button {
            background-color: #10b981;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }

        button:hover {
            background-color: #059669;
        }

        a {
            text-decoration: none;
            color: #4f46e5;
            font-weight: bold;
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        a:hover {
            color: #3730a3;
        }
    </style>
</head>

<body>

    <h3>Update Activity</h3>

    <form method="POST" action="<?php echo e(route('kegiatan.update', $kegiatan->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label>Activity</label>
        <input type="text" name="kegiatan" value="<?php echo e(old('kegiatan', $kegiatan->kegiatan)); ?>" required>

        <label>Status</label>
        <select name="status">
            <option value="Not Started" <?php echo e($kegiatan->status == 'Not Started' ? 'selected' : ''); ?>>Not Started</option>
            <option value="In Progress" <?php echo e($kegiatan->status == 'In Progress' ? 'selected' : ''); ?>>In Progress</option>
            <option value="Blocked" <?php echo e($kegiatan->status == 'Blocked' ? 'selected' : ''); ?>>Blocked</option>
            <option value="Completed" <?php echo e($kegiatan->status == 'Completed' ? 'selected' : ''); ?>>Completed</option>
        </select>

        <label>Responsible Person</label>
        <input type="text" name="penanggung_jawab" value="<?php echo e(old('penanggung_jawab', $kegiatan->penanggung_jawab)); ?>" required>

        <label>Participants</label>
        <input type="text" name="peserta_kegiatan" value="<?php echo e(old('peserta_kegiatan', $kegiatan->peserta_kegiatan)); ?>">

        <label>Start Date</label>
        <input type="date" name="tanggal_mulai" value="<?php echo e(old('tanggal_mulai', $kegiatan->tanggal_mulai)); ?>">

        <label>End Date</label>
        <input type="date" name="tanggal_selesai" value="<?php echo e(old('tanggal_selesai', $kegiatan->tanggal_selesai)); ?>">

        <label>Location</label>
        <input type="text" name="tempat_kegiatan" value="<?php echo e(old('tempat_kegiatan', $kegiatan->tempat_kegiatan)); ?>">

        <label>Notes</label>
        <textarea name="notes" rows="3"><?php echo e(old('notes', $kegiatan->notes)); ?></textarea>

        <button type="submit">Update Activity</button>

        <a href="<?php echo e(route('kegiatan.index')); ?>">← Back to Activity List</a>
    </form>

</body>

</html>
<?php /**PATH C:\Modul Program\planner-tahunan\resources\views/kegiatan/update.blade.php ENDPATH**/ ?>