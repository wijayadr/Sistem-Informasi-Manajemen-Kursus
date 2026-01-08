# 📚 Sistem Informasi Manajemen Kursus

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-10.10+-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat-square&logo=php)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)
![Status](https://img.shields.io/badge/Status-Active-brightgreen?style=flat-square)

**Sistem Informasi Manajemen Kursus** adalah aplikasi web modern yang membantu institusi pendidikan mengelola data kursus, siswa, dan desa dengan fitur lengkap dan antarmuka yang intuitif.

[🌐 Demo](#) • [📖 Dokumentasi](#) • [🐛 Lapor Bug](https://github.com/wijayadr/Sistem-Informasi-Manajemen-Kursus/issues) • [💬 Diskusi](https://github.com/wijayadr/Sistem-Informasi-Manajemen-Kursus/discussions)

</div>

---

## 🎯 Tentang Proyek

Sistem Informasi Manajemen Kursus adalah solusi terintegrasi yang dirancang untuk memudahkan pengelolaan data di tingkat desa. Aplikasi ini menyediakan modul komprehensif untuk mengelola:

- 👥 **Data Penduduk & Identitas** - Manajemen profil penduduk lengkap
- 📖 **Manajemen Kursus** - Pendaftaran, penjadwalan, dan pelacakan peserta
- 📅 **Event Management** - Perencanaan dan pengelolaan acara desa
- 📰 **Berita & Informasi** - Publikasi berita dan pengumuman desa
- 📊 **Analytics & Reporting** - Dashboard interaktif dan laporan komprehensif
- 📋 **Regulasi & Kebijakan** - Manajemen dokumen dan peraturan desa
- 🎯 **SDGS Integration** - Tracking progress terhadap Sustainable Development Goals

## ✨ Fitur Utama

### 🎨 Antarmuka Modern
- Desain responsif yang bekerja di semua perangkat (desktop, tablet, mobile)
- Dashboard intuitif dengan visualisasi data real-time
- Dark mode untuk kenyamanan pengguna malam hari

### 🔐 Keamanan
- Autentikasi berbasis role dan permission
- Enkripsi data sensitif
- CSRF protection dan input validation
- API Security dengan Sanctum

### ⚡ Performa
- Optimized database queries
- Caching strategy untuk response cepat
- Lazy loading untuk images dan components

### 🔌 Integrasi Lanjutan
- Livewire 3 untuk real-time interactivity tanpa page refresh
- Export ke Excel/PDF untuk laporan
- API RESTful untuk integrasi eksternal

### 📱 Multi-tenant Ready
- Manajemen multiple institusi/desa
- Isolated data per tenant
- Custom branding per institusi

## 🚀 Quick Start

### Prerequisites
- PHP 8.1 atau lebih tinggi
- Composer
- Node.js & npm
- MySQL 8.0 atau MariaDB 10.4+
- Git

### Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/wijayadr/Sistem-Informasi-Manajemen-Kursus.git
cd Sistem-Informasi-Manajemen-Kursus
```

2. **Install Dependencies**
```bash
# PHP Dependencies
composer install

# JavaScript Dependencies
npm install
```

3. **Setup Environment**
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

4. **Configure Database**
Edit file `.env` dan atur koneksi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_kursus
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run Migrations & Seeders**
```bash
# Jalankan migrations
php artisan migrate

# (Opsional) Jalankan seeders untuk dummy data
php artisan db:seed
```

6. **Build Assets**
```bash
# Development
npm run dev

# Production
npm run build
```

7. **Start Server**
```bash
php artisan serve
```

Aplikasi akan tersedia di `http://localhost:8000`

## 📖 Dokumentasi

Dokumentasi lengkap tersedia di [docs/](docs/) folder:

- [Instalasi & Setup](docs/INSTALLATION.md)
- [Panduan User](docs/USER_GUIDE.md)
- [API Documentation](docs/API.md)
- [Contribusi Guidelines](CONTRIBUTING.md)
- [Changelog](CHANGELOG.md)

## 🛠️ Struktur Project

```
├── app/
│   ├── Http/
│   │   └── Controllers/          # Request handlers
│   ├── Models/                   # Eloquent models
│   ├── Livewire/                 # Livewire components
│   └── Utilities/                # Helper functions
├── database/
│   ├── migrations/               # Database schemas
│   ├── factories/                # Model factories
│   └── seeders/                  # Database seeders
├── resources/
│   ├── views/                    # Blade templates
│   ├── css/                      # Stylesheets
│   └── js/                       # JavaScript files
├── routes/
│   ├── web.php                   # Web routes
│   └── api.php                   # API routes
├── tests/                        # Unit & Feature tests
└── config/                       # Configuration files
```

## 🔧 Konfigurasi

### Environment Variables
Konfigurasi penting di `.env`:
- `APP_NAME` - Nama aplikasi
- `APP_URL` - URL aplikasi
- `DB_*` - Database credentials
- `MAIL_*` - Email configuration
- `CACHE_DRIVER` - Cache driver (redis/file)

### Features Configuration
Edit `config/` untuk mengaktifkan/menonaktifkan fitur sesuai kebutuhan.

## 📊 Database Schema

Aplikasi menggunakan multiple tables untuk berbagai modul:
- `users` - Data pengguna & autentikasi
- `identities` - Data identitas penduduk
- `courses` - Data kursus
- `events` - Event desa
- `news` - Berita dan pengumuman
- Dan lebih banyak lagi...

Lihat [database/migrations/](database/migrations/) untuk schema detail.

## 🧪 Testing

Jalankan test suite:
```bash
# Unit tests
php artisan test

# Feature tests
php artisan test tests/Feature

# Dengan coverage report
php artisan test --coverage
```

## 🐛 Troubleshooting

### Database Connection Error
```bash
# Cek database configuration
php artisan tinker
>>> DB::connection()->getPDO();
```

### Missing Storage Folder
```bash
php artisan storage:link
```

### Cache Issues
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## 🤝 Contributing

Kontribusi sangat diterima! Silakan ikuti panduan di [CONTRIBUTING.md](CONTRIBUTING.md)

### Proses Kontribusi:
1. Fork repository
2. Buat feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buka Pull Request

## 📋 Roadmap

- [ ] Mobile app (Flutter)
- [ ] Advanced analytics & reporting
- [ ] Payment gateway integration
- [ ] Multi-language support
- [ ] WhatsApp integration
- [ ] Biometric authentication
- [ ] Blockchain untuk verifikasi dokumen

## 📄 License

Proyek ini dilisensikan di bawah [MIT License](LICENSE) - lihat file LICENSE untuk detail lengkap.

## 👨‍💻 Author

**Andri Wijaya**
- GitHub: [@wijayadr](https://github.com/wijayadr)
- Email: aaabbb242410@gmail.com

## 💬 Support & Contact

- 📧 Email: aaabbb242410@gmail.com
- 🐛 Issues: [GitHub Issues](https://github.com/wijayadr/Sistem-Informasi-Manajemen-Kursus/issues)
- 💬 Discussions: [GitHub Discussions](https://github.com/wijayadr/Sistem-Informasi-Manajemen-Kursus/discussions)

## 🙏 Terima Kasih

Terima kasih kepada semua kontributor dan pengguna yang telah membantu mengembangkan proyek ini!

---

<div align="center">

Made with ❤️ by [Andri Wijaya](https://github.com/wijayadr)

[⬆ Kembali ke Atas](#sistem-informasi-manajemen-kursus)

</div>

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
#   S i s t e m - I n f o r m a s i - M a n a j e m e n - K u r s u s 
 
 #   s i s t e m - i n f o r m a s i - d e s a  
 