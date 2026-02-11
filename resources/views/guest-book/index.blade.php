<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Bidang Anggaran BKPG</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0ebf8;
            background-image: url("/images/background-1.jpeg");
            background-size: cover;
            /* Warna latar belakang ungu muda */
            margin: 0;
            padding: 20px 0;
            display: flex;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 640px;
            margin: 0 auto;
        }

        /* Header Card */
        .header-card {
            background-color: white;
            border-radius: 8px;
            border-top: 10px solid #673ab7;
            /* Warna ungu khas Google Form */
            padding: 24px;
            margin-bottom: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .header-title {
            font-size: 32px;
            font-weight: 400;
            margin-bottom: 12px;
            color: #202124;
        }

        .account-info {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 10px;
            border-top: 1px solid #dadce0;
            padding-top: 10px;
        }

        .account-info a {
            color: #1a73e8;
            text-decoration: none;
        }

        .required-text {
            color: #d93025;
            font-size: 14px;
            margin-top: 10px;
        }

        /* Question Card */
        .question-card {
            background-color: white;
            border-radius: 8px;
            padding: 24px;
            margin-bottom: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }

        .question-title {
            font-size: 16px;
            font-weight: 500;
            margin-bottom: 24px;
            color: #202124;
        }

        .required-asterisk {
            color: #d93025;
            margin-left: 2px;
        }

        /* Input Styles */
        .input-text {
            width: 100%;
            border: none;
            border-bottom: 1px solid #dadce0;
            font-size: 14px;
            padding: 5px 0;
            margin-bottom: 10px;
            outline: none;
            transition: border-bottom 0.3s;
        }

        .input-text:focus {
            border-bottom: 2px solid #673ab7;
        }

        .input-date {
            width: 100%;
            border: none;
            border-bottom: 1px solid #dadce0;
            font-size: 14px;
            padding: 5px 0;
            color: #70757a;
            outline: none;
        }

        .input-date:focus {
            border-bottom: 2px solid #673ab7;
        }

        .group-header {
            font-size: 14px;
            font-weight: 700;
            color: #673ab7;
            /* Warna ungu agar senada */
            margin-top: 15px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Supaya grup pertama tidak ada margin atas berlebih */
        .group-wrapper:first-child .group-header {
            margin-top: 0;
        }

        /* Radio Buttons */
        .radio-option {
            display: flex;
            align-items: center;
            margin-bottom: 16px;
            cursor: pointer;
        }

        .radio-option input[type="radio"] {
            margin-right: 12px;
            width: 20px;
            height: 20px;
            accent-color: #673ab7;
        }

        .radio-label {
            font-size: 14px;
            color: #202124;
        }

        /* Footer / Submit Button */
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .btn-submit {
            background-color: #673ab7;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #5e35b1;
        }

        .btn-clear {
            background: none;
            border: none;
            color: #673ab7;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
        }

        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #5f6368;
            margin-top: 20px;
        }

        /* Placeholder style */
        ::placeholder {
            color: #70757a;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Notifikasi Sukses -->
        @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            <strong>{{ session('success') }}</strong>
        </div>
        @endif

        <!-- Form Header -->
        <div class="header-card">
            <h1 class="header-title">Buku Tamu Badan Keuangan dan Aset Daerah</h1>
            <!-- ... (Kode header tetap sama) ... -->
        </div>

        <!-- UPDATE ACTION ROUTE DISINI -->
        <form action="{{ route('guest-book.store') }}" method="POST">
            @csrf

            <!-- Email -->
            <div class="question-card">
                <div class="question-title">Email <span class="required-asterisk">*</span></div>
                <input type="email" name="email" class="input-text" placeholder="Isi Email" value="{{ old('email') }}" required>
                @error('email') <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
            </div>

            <!-- Nama Lengkap -->
            <div class="question-card">
                <div class="question-title">Nama Lengkap <span class="required-asterisk">*</span></div>
                <input type="text" name="full_name" class="input-text" placeholder="Isi Nama Lengkap" value="{{ old('full_name') }}" required>
            </div>

            <!-- Jabatan -->
            <div class="question-card">
                <div class="question-title">Jabatan <span class="required-asterisk">*</span></div>
                <input type="text" name="position" class="input-text" placeholder="Isi Jabatan" value="{{ old('position') }}" required>
            </div>

            <!-- Tanggal Berkunjung -->
            <div class="question-card">
                <div class="question-title">Tanggal Berkunjung <span class="required-asterisk">*</span></div>
                <input type="date" name="visit_date" class="input-date" value="{{ old('visit_date') }}" required>
            </div>

            <!-- Asal Instansi -->
            <div class="question-card">
                <div class="question-title">Asal Instansi / Organisasi / Perusahaan / Yayasan / Kantor / dsb <span class="required-asterisk">*</span></div>
                <input type="text" name="institution" class="input-text" placeholder="Isi Instansi" value="{{ old('institution') }}" required>
            </div>

            <!-- Pejabat yang dituju -->
            <div class="question-card">
                <div class="question-title">Pejabat yang dituju <span class="required-asterisk">*</span></div>

                @if(count($officialGroups) > 0)
                {{-- Loop Luar: Grup (Pimpinan, Koordinator, dst) --}}
                @foreach($officialGroups as $group)
                <div class="group-wrapper">
                    <!-- Menampilkan Nama Grup -->
                    <div class="group-header">{{ $group['group_name'] }}</div>

                    {{-- Loop Dalam: Item Pejabat --}}
                    @foreach($group['items'] as $official)
                    <label class="radio-option">
                        <input
                            type="radio"
                            name="target_official"
                            value="{{ $official['name'] }}"
                            {{ old('target_official') == $official['name'] ? 'checked' : '' }}
                            required>
                        <span class="radio-label">{{ $official['name'] }}</span>
                    </label>
                    @endforeach
                </div>
                @endforeach
                @else
                <p style="color: red; font-style: italic;">Data pejabat tidak tersedia.</p>
                @endif

                @error('target_official') <div style="color: red; font-size: 12px; margin-top: 5px;">{{ $message }}</div> @enderror
            </div>

            <!-- Maksud Kedatangan -->
            <div class="question-card">
                <div class="question-title">Maksud Kedatangan <span class="required-asterisk">*</span></div>
                <input type="text" name="purpose" class="input-text" placeholder="Isi maksud" value="{{ old('purpose') }}" required>
            </div>

            <!-- Pesan / Kesan -->
            <div class="question-card">
                <div class="question-title">Pesan / Kesan / Kritik / Saran / Masukan <span class="required-asterisk">*</span></div>
                <input type="text" name="feedback" class="input-text" placeholder="Isi pesan" value="{{ old('feedback') }}" required>
            </div>

            <!-- Tombol Submit & Reset -->
            <div class="form-footer" style="padding: 20px; background: rgba(255, 255, 255, 0.8); border-radius: 5px">
                <button type="submit" class="btn-submit">Kirim</button>
                <button type="reset" class="btn-clear" onclick="window.location.href=window.location.href">Kosongkan formulir</button>
            </div>

        </form>

        <div class="footer-text" style="padding: 20px; background: rgba(255, 255, 255, 0.8); border-radius: 5px">
            Jangan pernah mengirimkan sandi melalui Buku Tamu.
            <br><br>
            <h2 style="font-size: 22px; font-weight: normal; color: #5f6368;">Buku Tamu</h2>
        </div>

    </div>

</body>

</html>