# Sistem Informasi Desa

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php)
![Livewire](https://img.shields.io/badge/Livewire-3-FB70A9?style=for-the-badge&logo=livewire)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

**Sistem Informasi Desa** adalah platform manajemen terintegrasi yang dirancang khusus untuk membantu pemerintah desa mengelola data penduduk, kegiatan, surat menyurat, dan informasi publik secara efisien dan transparan.

[Dokumentasi](https://github.com/wijayadr/sistem-informasi-desa#dokumentasi) • [Instalasi](#instalasi) • [Fitur](#fitur-utama) • [Lisensi](#lisensi)

</div>

---

## Tentang Proyek

Sistem Informasi Desa adalah solusi manajemen data komprehensif yang membantu pemerintah desa dalam:

- **Manajemen Data Penduduk** - Pencatatan identitas, profil, dan data demografis penduduk
- **Manajemen Surat-Menyurat** - Penerbitan dan pendistribusian surat keterangan dan dokumen resmi
- **Kalender Kegiatan** - Perencanaan dan publikasi acara desa
- **Berita & Pengumuman** - Penyebarluasan informasi penting kepada masyarakat
- **Laporan & Analitik** - Dashboard komprehensif dengan visualisasi data
- **Manajemen Regulasi** - Penyimpanan dan publikasi peraturan desa
- **Tracking SDGs** - Monitoring capaian Sustainable Development Goals

## Fitur Utama

### Manajemen Data Terintegrasi
- Database terpusat untuk semua data penduduk dan kegiatan
- Sistem validasi data yang ketat
- Audit trail untuk setiap perubahan data
- Export data dalam format Excel dan PDF

### Antarmuka Pengguna
- Desain responsif untuk desktop, tablet, dan mobile
- Dashboard dengan visualisasi data real-time
- User experience yang intuitif dan mudah digunakan
- Multi-language support

### Keamanan & Akses
- Sistem autentikasi berbasis role-based access control (RBAC)
- Enkripsi data sensitif
- Protection terhadap serangan CSRF dan SQL injection
- API documentation lengkap dengan authentication

### Performa & Skalabilitas
- API RESTful untuk integrasi eksternal
- Multi-tenant ready dengan data isolation

## Teknologi Stack

| Layer | Technology |
|-------|-----------|
| **Backend** | Laravel 10.x, PHP 8.1+ |
| **Frontend** | Livewire 3, Blade Templates, Tailwind CSS |
| **Database** | MySQL 8.0+, Eloquent ORM |
| **Real-time** | Livewire Components |
| **API** | Laravel Sanctum |
| **Task Scheduling** | Laravel Scheduler |
| **Build Tools** | Vite, npm |

## Instalasi & Setup

### Prasyarat Sistem

Pastikan Anda memiliki:
- PHP 8.1 atau lebih tinggi
- Composer (PHP package manager)
- Node.js 16+ dan npm
- MySQL 8.0 atau MariaDB 10.4+
- Git

### Langkah-langkah Instalasi

#### 1. Clone Repository

```bash
git clone https://github.com/wijayadr/sistem-informasi-desa.git
cd sistem-informasi-desa
```

#### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

#### 3. Konfigurasi Environment

```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

#### 4. Setup Database

Edit file `.env` dengan detail database Anda:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_informasi_desa
DB_USERNAME=root
DB_PASSWORD=
```

#### 5. Jalankan Database Migrations

```bash
# Eksekusi migrations
php artisan migrate

# (Opsional) Seed database dengan data dummy
php artisan db:seed
```

#### 6. Build Frontend Assets

```bash
# Development dengan hot reload
npm run dev

# Production build
npm run build
```

#### 7. Mulai Server Aplikasi

```bash
php artisan serve
```

Aplikasi akan tersedia di: **http://localhost:8000**

## Struktur Folder

```
sistem-informasi-desa/
├── app/
│   ├── Http/
│   │   ├── Controllers/           # Request handlers & business logic
│   │   ├── Middleware/            # HTTP middleware
│   │   └── Kernel.php             # HTTP kernel configuration
│   ├── Models/                    # Eloquent models
│   │   ├── User.php
│   │   ├── Letter/                # Letter-related models
│   │   ├── Master/                # Master data models
│   │   ├── Regulation/            # Regulation models
│   │   └── Sdgs/                  # SDGs tracking models
│   ├── Livewire/                  # Livewire components
│   │   ├── AdminPanel/            # Admin dashboard components
│   │   ├── Forms/                 # Form components
│   │   └── Public/                # Public-facing components
│   ├── Utilities/                 # Helper functions
│   └── Providers/                 # Service providers
├── database/
│   ├── migrations/                # Database migrations
│   ├── seeders/                   # Database seeders
│   └── factories/                 # Model factories
├── resources/
│   ├── views/                     # Blade templates
│   ├── css/                       # Stylesheets
│   └── js/                        # JavaScript files
├── routes/
│   ├── web.php                    # Web routes
│   ├── api.php                    # API routes
│   └── console.php                # Console commands
├── config/                        # Configuration files
├── public/                        # Public assets
└── tests/                         # Unit & Feature tests
```

## Dokumentasi

Dokumentasi lebih lanjut:

- [API Reference](docs/API.md)
- [User Guide](docs/USER_GUIDE.md)
- [Developer Guide](docs/DEVELOPER.md)
- [Contribution Guidelines](CONTRIBUTING.md)
## Fitur Utama Modul

### 1. Manajemen Data Penduduk
- Pencatatan identitas lengkap dengan NIK
- Profil keluarga dan hubungan keluarga
- Tracking status kependudukan
- Export data demografis

### 2. Surat-Menyurat
- Template surat siap pakai
- Nomor surat otomatis
- Tracking status permohonan
- Digital signature support

### 3. Manajemen Event
- Calendaring acara desa
- Participant management
- Resource allocation
- Event reporting

### 4. Sistem Berita
- Publikasi berita desa
- Kategori dan tagging
- Media management
- Public comments moderation

### 5. Dashboard & Analytics
- Real-time statistics
- Interactive charts
- Custom reports
- Data export (Excel, PDF)

### 6. Regulasi & Kebijakan
- Document repository
- Version control
- Access management
- Full-text search

## Konfigurasi Awal

### Environment Setup

Setelah instalasi, konfigurasi file `.env`:

```env
APP_NAME="Sistem Informasi Desa"
APP_URL=http://localhost:8000
APP_DEBUG=true  # Set false untuk production

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=sistem_desa
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_FROM_ADDRESS=noreply@sistemdesa.id
```

### Default Admin User

Setelah seed, gunakan credentials berikut:
- **Email**: admin@sistemdesa.id
- **Password**: password

**PENTING**: Ubah password admin saat first login!

## Database Migrations

Struktur database utama:

| Tabel | Deskripsi |
|-------|-----------|
| `users` | Akun pengguna sistem |
| `identities` | Data identitas penduduk |
| `events` | Calendaring acara |
| `news` | Publikasi berita |
| `regulations` | Dokumen peraturan |
| `letters` | Template & tracking surat |
| `categories` | Kategori konten |

Lihat [database/migrations/](database/migrations/) untuk schema lengkap.

## Testing

Jalankan test suite untuk memastikan semua berfungsi:

```bash
# Jalankan semua test
php artisan test

# Test fitur tertentu
php artisan test tests/Feature/UserTest.php

# Generate coverage report
php artisan test --coverage
```

## Debugging & Troubleshooting

### Issue: Connection Refused

```bash
# Verify database configuration
php artisan tinker
>>> DB::connection()->getPDO();
```

### Issue: Storage Link Not Found

```bash
# Create symbolic link
php artisan storage:link
```

### Issue: Cache/Config Stale

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Enable Debug Mode

Untuk development, set di `.env`:
```
APP_DEBUG=true
```

## Best Practices

- **Always use migrations** untuk database changes
- **Commit regularly** dengan meaningful messages
- **Write tests** untuk fitur baru
- **Follow Laravel conventions** untuk consistency
- **Use environment variables** untuk sensitive data
- **Keep dependencies updated** dengan `composer update`

## Performance Tips

```bash
# Optimize autoloader
composer dump-autoload --optimize

# Cache routes & config
php artisan config:cache
php artisan route:cache

# Use Redis untuk caching
# Edit .env: CACHE_DRIVER=redis
```

## Contributing & Support

Kami membuka kontribusi dari komunitas!

### Cara Berkontribusi:

1. **Fork** repository ini
2. **Clone** ke local machine
3. **Buat branch** feature (`git checkout -b feature/YourFeature`)
4. **Commit** perubahan (`git commit -m 'Add YourFeature'`)
5. **Push** ke branch (`git push origin feature/YourFeature`)
6. **Buat Pull Request** dengan deskripsi jelas

### Guideline:
- Follow PSR-12 coding standards
- Tulis meaningful commit messages
- Add unit tests untuk fitur baru
- Update documentation jika diperlukan

## Roadmap Pengembangan

- [ ] Mobile Application (Flutter)
- [ ] Advanced Analytics & Business Intelligence
- [ ] Payment Gateway Integration
- [ ] WhatsApp API Integration
- [ ] Biometric Authentication
- [ ] Blockchain Verification untuk dokumen
- [ ] Multi-language Support
- [ ] SMS Notification Service

## License

Proyek ini menggunakan lisensi [MIT License](LICENSE).

Anda bebas menggunakan, memodifikasi, dan mendistribusikan kode ini sesuai dengan syarat MIT License.

## Author & Support

**Andri Wijaya**
- GitHub: [@wijayadr](https://github.com/wijayadr)
- Issues: [Report Bug](https://github.com/wijayadr/sistem-informasi-desa/issues)
- Discussions: [Join Discussion](https://github.com/wijayadr/sistem-informasi-desa/discussions)

---

<div align="center">

Made with ❤️ for Community

[⬆ Back to top](#sistem-informasi-desa)

</div>
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
 #   s i s t e m - i n f o r m a s i - d e s a 
 
 