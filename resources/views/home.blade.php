<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Platform Edukasi Kesehatan Interaktif</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <style>
        /* Modern styling with Bootstrap overrides */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6dd5fa 0%, #2980b9 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar, .footer {
            background: #007bff;
            backdrop-filter: saturate(180%) blur(10px);
        }
        .hero {
            padding: 5rem 1rem;
            text-align: center;
            flex-grow: 1;
        }
        .hero .btn-primary {
            background: #3a86ff;
            border: none;
            padding: 1rem 2rem;
            font-weight: 600;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }
        .hero .btn-primary:hover {
            background: #265ddb;
        }
        .features {
            padding: 4rem 1rem;
            color: #f0f0f0;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            max-width: 1100px;
            margin: 0 auto 3rem auto;
        }
        .feature-icon {
            font-size: 3rem;
            color: #3a86ff;
            margin-bottom: 1rem;
        }
        .footer {
            padding: 1rem 0;
            text-align: center;
            font-size: 0.9rem;
            color: #b2becd;
        }
        a.nav-link {
            color: #fff;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        a.nav-link:hover, a.nav-link:focus {
            color: #3a86ff;
            text-decoration: none;
        }
        @media (max-width: 768px) {
            .hero {
                padding: 3rem 1rem;
            }
        }
            
    </style> -->
<!-- <style>
        body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(to bottom, #3db2ff, #007bff);
    color: #fff;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.navbar, .footer {
    background: #007bff;
    backdrop-filter: saturate(180%) blur(10px);
}

.hero {
    padding: 5rem 1rem;
    text-align: center;
    flex-grow: 1;
}

.hero .btn-primary {
    background: #0056cc; /* warna lebih gelap dari #007bff */
    border: none;
    padding: 1rem 2rem;
    font-weight: 600;
    border-radius: 12px;
    transition: background-color 0.3s ease;
}

.hero .btn-primary:hover {
    background: #0040a0; /* warna hover yang lebih gelap */
}

.features {
    padding: 4rem 1rem;
    color: #f0f0f0;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    max-width: 1100px;
    margin: 0 auto 3rem auto;
}

.feature-icon {
    font-size: 3rem;
    color: #3db2ff; /* disamakan warnanya */
    margin-bottom: 1rem;
}

.footer {
    padding: 1rem 0;
    text-align: center;
    font-size: 0.9rem;
    color: #b2becd;
}

a.nav-link {
    color: #fff;
    font-weight: 500;
    transition: color 0.3s ease;
}

a.nav-link:hover,
a.nav-link:focus {
    color: #3db2ff;
    text-decoration: none;
}

@media (max-width: 768px) {
    .hero {
        padding: 3rem 1rem;
    }
}

    </style> -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        {{-- Brand: Logo  --}}
        <a class="navbar-brand text-white fw-bold fs-3 d-flex align-items-center" href="#">
            <img src="{{ asset('assets/img/edu.png') }}" alt="Logo EduKes" style="height: 50px; width: auto; margin-right: 10px;">
            SmartHealth
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Daftar</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Tentang</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="hero d-flex flex-column justify-content-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3" style="text-shadow: 0 2px 4px rgba(0,0,0,0.6);">
                Platform Pembelajaran Interaktif <br /> untuk Edukasi Kesehatan
            </h1>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg shadow">Mulai Belajar Sekarang</a>
        </div>
    </main>

    <section id="features" class="features">
        <div class="container text-center">
            <h2 class="mb-5 fw-bold">Fitur Utama</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="feature-icon">📚</div>
                    <h5 class="mb-3">Materi</h5>
                    <p>
                        Akses beragam modul edukasi kesehatan seperti Pola Hidup Sehat, Reproduksi dan Kesehatan Mental yang mudah dipahami dan selalu diperbarui.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="feature-icon">🎥</div>
                    <h5 class="mb-3">Video Interaktif</h5>
                    <p>
                        Pelajari melalui video berkualitas tinggi dengan visual menarik dan fitur interaktif yang mempercepat pemahaman.
                    </p>
                </div>
                
    </section>

    <section id="about" class="container text-white text-center mb-5">
        <h2 class="mb-4 fw-bold">Tentang Kami</h2>
        <p style="max-width: 800px; margin: auto; line-height: 1.6; text-shadow: 0 1px 3px rgba(0,0,0,0.5);">
            EdukasiKesehatan berdedikasi untuk meningkatkan pengetahuan siswa tentang kesehatan melalui teknologi.
            Kami percaya bahwa pendidikan yang mudah diakses dan interaktif dapat memberdayakan orang untuk hidup lebih sehat.
        </p>
    </section>

    <footer class="footer">
        <div class="container">
            &copy; 2025 SmartHealth. Semua hak dilindungi.
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

