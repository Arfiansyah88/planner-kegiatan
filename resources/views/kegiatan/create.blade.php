<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kegiatan</title>
    <style>
        /* ===== BODY ===== */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0fdf4;
            margin: 0;
            padding: 20px;
            color: #064e3b;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #065f46;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.05);
        }

        /* ===== FORM ===== */
        form {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 25px 30px;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        form:hover {
            transform: translateY(-3px);
        }

        label {
            font-weight: 600;
        }

        input,
        select,
        textarea {
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #a7f3d0;
            font-size: 15px;
            width: 100%;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #10b981;
            box-shadow: 0 0 8px rgba(16, 185, 129, 0.4);
            outline: none;
        }

        textarea {
            resize: none;
        }

        /* ===== TOMBOL ===== */
        button {
            background: linear-gradient(135deg, #10b981, #047857);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            padding: 12px;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.1);
        }

        button:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #047857, #065f46);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        /* ===== LINK KEMBALI ===== */
        a {
            text-decoration: none;
            color: #065f46;
            font-weight: bold;
            text-align: center;
            display: block;
            margin-top: 10px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #10b981;
        }
    </style>
</head>

<body>
    <h3>Tambah Kegiatan</h3>

    <form method="POST" action="{{ route('kegiatan.store') }}">
        @csrf
        <label>Kegiatan</label>
        <input type="text" name="kegiatan" value="{{ old('kegiatan') }}" required>

        <label>Status</label>
        <select name="status" required>
            <option value="Not Started" {{ old('status') == 'Not Started' ? 'selected' : '' }}>Not Started</option>
            <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Blocked" {{ old('status') == 'Blocked' ? 'selected' : '' }}>Blocked</option>
            <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <label>Penanggung Jawab</label>
        <input type="text" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}" required>

        <label>Peserta</label>
        <input type="text" name="peserta_kegiatan" value="{{ old('peserta_kegiatan') }}">

        <label>Tanggal Mulai</label>
        <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}">

        <label>Tanggal Selesai</label>
        <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">

        <label>Tempat</label>
        <input type="text" name="tempat_kegiatan" value="{{ old('tempat_kegiatan') }}">

        <label>Notes</label>
        <textarea name="notes" rows="3">{{ old('notes') }}</textarea>

        <button type="submit">Simpan Kegiatan</button>
        <a href="{{ route('kegiatan.index') }}">← Kembali ke Daftar Kegiatan</a>
    </form>
</body>

</html>
