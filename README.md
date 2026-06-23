# 🧑‍💻 Portfolio Web — Flask + Docker

Profile web personal dibangun dengan Python (Flask), HTML, CSS, JavaScript, dan di-deploy menggunakan Docker Compose + Nginx.

## 📁 Struktur Proyek

```
portfolio/
├── app.py                 # Flask app & data profil
├── requirements.txt       # Python dependencies
├── Dockerfile             # Multi-stage Docker build
├── docker-compose.yml     # Orkestrasi layanan
├── nginx.conf             # Reverse proxy config
├── .dockerignore
├── templates/
│   └── index.html         # Template HTML utama
└── static/
    ├── css/style.css      # Stylesheet
    └── js/main.js         # JavaScript interaktif
```

## 🚀 Cara Menjalankan

### Dengan Docker Compose (Direkomendasikan)

```bash
# Clone / masuk ke folder proyek
cd portfolio

# Build & jalankan semua service
docker compose up --build

# Jalankan di background
docker compose up --build -d
```

Buka browser: **http://localhost** (via Nginx) atau **http://localhost:8080** (langsung ke Flask)

### Stop & Bersihkan

```bash
docker compose down           # Stop containers
docker compose down -v        # Stop + hapus volumes
docker compose down --rmi all # Stop + hapus images
```

### Tanpa Docker (Development)

```bash
pip install -r requirements.txt
python app.py
# Buka http://localhost:5000
```

## ✏️ Kustomisasi

Edit data profil di **`app.py`** pada variabel `PROFILE`:

```python
PROFILE = {
    "name": "Nama Anda",
    "title": "Jabatan Anda",
    "bio": "Deskripsi singkat tentang Anda...",
    "skills": [...],
    "projects": [...],
}
```

## 🛠️ Tech Stack

| Layer    | Teknologi              |
|----------|------------------------|
| Backend  | Python 3.12, Flask 3.0 |
| Frontend | HTML5, CSS3, JS (Vanilla) |
| Server   | Gunicorn (WSGI)        |
| Proxy    | Nginx 1.25             |
| Container| Docker, Docker Compose |
