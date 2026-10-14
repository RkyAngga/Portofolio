# Personal Portfolio

Portfolio website profesional dibangun dengan Laravel, PHP, MySQL, Tailwind CSS, dan JavaScript. Menampilkan profil, keahlian, pengalaman, project, dan form kontak. Dilengkapi admin dashboard untuk mengelola konten.

## Fitur Utama

### Public Portfolio
- **Home/Hero** — Headline profesional dengan CTA
- **About** — Profil dan latar belakang profesional
- **Skills** — Keahlian dikelompokkan berdasarkan kategori
- **Experience** — Timeline pengalaman kerja
- **Projects** — Portfolio project dengan relasi skills
- **Contact** — Form kontak dengan validasi (rate-limited)
- **Footer** — Informasi dan social links

### Admin Dashboard
- **Autentikasi** — Login aman dengan Breeze authentication
- **Profile Management** — Edit informasi profil dan social links
- **Project CRUD** — Tambah/edit/hapus project dengan featured flag
- **Skills CRUD** — Kelola daftar skill per kategori
- **Experience CRUD** — Kelola riwayat kerja
- **Contact Messages** — Lihat dan kelola pesan dari pengunjung
- **Rate Limiting** — Perlindungan spam pada form kontak

## Requirements

- PHP 8.2 atau lebih tinggi
- Composer
- Node.js 18+
- npm / yarn
- SQLite (default) atau MySQL
- Database credentials jika menggunakan MySQL

## Instalasi

### 1. Clone atau Unduh Repository
```bash
git clone <repository-url>
cd Portofolio
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
Salin `.env.example` ke `.env` dan konfigurasi:
```bash
cp .env.example .env
php artisan key:generate
```

**Untuk SQLite (default, tanpa konfigurasi tambahan):**
Database akan otomatis dibuat di `database/database.sqlite`.

**Untuk MySQL:**
Edit `.env` dan uncomment MySQL settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Jalankan Migrations
```bash
php artisan migrate
```

### 5. Seed Data Awal
```bash
php artisan db:seed
```

Seeder membuat:
- **Admin Account** — Email: `admin@example.com`, Password: `password`
- **Sample Profile** — Placeholder profesional
- **Sample Skills** — 16 skill di 5 kategori
- **Sample Experiences** — 2 contoh pengalaman kerja
- **Sample Projects** — 3 project dengan relasi skills

## Development

### Jalankan Dev Server
```bash
php artisan serve
```
Akses di `http://localhost:8000`

### Build Frontend Assets
Development (watch mode):
```bash
npm run dev
```

Production build:
```bash
npm run build
```

## Admin Login

1. Akses `http://localhost:8000/login`
2. Login dengan:
   - **Email:** `admin@example.com`
   - **Password:** `password`
3. Verifikasi email (auto-verified di seeder)
4. Akses dashboard di `/admin/dashboard`

**SECURITY:** Ubah password admin di profile setelah login pertama. Disable public registration aktif di seeder.

## File & Folder Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── PortfolioController.php       # Public pages
│   │   ├── ContactController.php         # Contact form
│   │   └── Admin/
│   │       ├── DashboardController.php
│   │       ├── ProjectController.php
│   │       ├── SkillController.php
│   │       ├── ExperienceController.php
│   │       ├── ProfileController.php
│   │       └── ContactMessageController.php
│   ├── Requests/                         # Form validation
│   └── Middleware/
├── Models/                               # Eloquent models
└── Console/
database/
├── migrations/                           # Schema
├── seeders/                              # Initial data
└── database.sqlite                       # SQLite (default)
resources/
├── css/app.css                           # Tailwind config
├── views/
│   ├── layouts/
│   │   ├── app.blade.php                 # Public layout
│   │   └── admin.blade.php               # Admin layout
│   ├── portfolio/
│   │   └── index.blade.php               # Public pages
│   ├── admin/
│   │   ├── dashboard.blade.php
│   │   ├── profile/
│   │   ├── projects/
│   │   ├── skills/
│   │   ├── experiences/
│   │   └── messages/
│   └── auth/                             # Breeze auth views
routes/
├── web.php                               # Public & admin routes
├── auth.php                              # Auth routes (registration disabled)
```

## Database Schema

### users
- id, name, email, password, email_verified_at, timestamps

### profiles
- id, user_id, full_name, headline, bio_short, about_me
- avatar_url, resume_url, email, phone, location
- github_url, linkedin_url, twitter_url, timestamps

### projects
- id, title, slug, description, thumbnail, demo_url, github_url
- category, is_featured, order_index, timestamps

### skills
- id, name, category, icon, order_index, timestamps

### experiences
- id, role, company, location, type, start_date, end_date
- is_current, description, order_index, timestamps

### project_skill (many-to-many)
- id, project_id, skill_id, timestamps

### contact_messages
- id, name, email, subject, message, is_read, timestamps

## API Endpoints

### Public
- `GET /` — Homepage
- `POST /contact` — Submit kontak (rate-limited 5/menit)

### Admin (Autentikasi Required)
- `GET /admin/dashboard` — Dashboard ringkasan
- `GET /admin/projects` — List projects
- `POST /admin/projects` — Create project
- `GET /admin/projects/{id}/edit` — Edit project form
- `PUT /admin/projects/{id}` — Update project
- `DELETE /admin/projects/{id}` — Delete project
- Similar endpoints untuk `/admin/skills`, `/admin/experiences`
- `GET /admin/profile` — Edit profil
- `PUT /admin/profile` — Update profil
- `GET /admin/messages` — List kontak messages
- `GET /admin/messages/{id}` — View pesan detail
- `DELETE /admin/messages/{id}` — Delete pesan

## Validasi

### Contact Form (Frontend + Backend)
- Name: Required, max 255
- Email: Required, valid email
- Subject: Optional, max 255
- Message: Required, max 5000

### Project CRUD
- Title: Required, max 255
- Description: Required, max 10000
- Category: Required
- URLs: Valid URL atau empty
- Skills: Optional, array of skill IDs

### Skills CRUD
- Name: Required, max 100
- Category: Required (Frontend, Backend, Database, Tools, Other)

### Experience CRUD
- Role: Required, max 255
- Company: Required, max 255
- Type: Required (Full-time, Part-time, Internship, Freelance, Contract)
- Start Date: Required, format date
- End Date: Optional, after_or_equal start_date
- is_current: Boolean, jika true ignore end_date

## Testing

Jalankan test suite:
```bash
php artisan test
```

Tests mencakup:
- Authentication (login, logout, registration disabled)
- Email verification
- Password management
- Profile CRUD
- Existing auth scenarios dari Breeze

Untuk menambah test portfolio-specific:
```bash
php artisan make:test PortfolioTest
php artisan make:test AdminProjectTest
```

## Build & Optimization

### Production Build
```bash
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

### Security Checklist
- [ ] Ubah APP_KEY di `.env`
- [ ] Set `APP_DEBUG=false` untuk production
- [ ] Ubah admin password
- [ ] Setup HTTPS
- [ ] Configure MAIL settings untuk production
- [ ] Backup database sebelum deploy
- [ ] Setup proper logging (not to stdout)

## Deployment

### Vercel Limitation
Laravel memerlukan writable filesystem untuk cache, storage, dan session management. **Vercel hanya menyediakan read-only filesystem di production (cold starts), sehingga Laravel akan gagal**. 

Rekomendasi hosting:
- **Laravel Dedicated:** Forge, Vapor, DigitalOcean App Platform, Heroku
- **Shared Hosting:** Hostinger, Niagahoster, Domainesia (support PHP 8.2+)
- **Alternative (Jika pakai Vercel):** Pisahkan backend ke platform lain + frontend ke Vercel (additional complexity)

### Self-Hosted Setup (Example: DigitalOcean / Ubuntu)

1. **SSH ke server**
```bash
ssh root@your_server_ip
```

2. **Install dependencies**
```bash
apt update && apt install -y php8.2 php8.2-mysql php8.2-mbstring php8.2-xml composer nodejs npm
```

3. **Clone repository**
```bash
cd /var/www
git clone <repo-url> portfolio
cd portfolio
```

4. **Setup Laravel**
```bash
composer install
npm install
npm run build
cp .env.example .env
php artisan key:generate
```

5. **Configure database** (MySQL recommended)
```bash
mysql -u root -p
CREATE DATABASE portfolio_prod;
exit
```

Update `.env` dengan database credentials MySQL.

6. **Run migrations**
```bash
php artisan migrate --force
php artisan db:seed --force
```

7. **Setup Nginx**
```bash
# Create /etc/nginx/sites-available/portfolio
server {
    listen 80;
    server_name your_domain.com;
    root /var/www/portfolio/public;
    
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
    
    index index.php;
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
    
    location ~ /\.(?!well-known).* {
        deny all;
    }
}

# Enable site
ln -s /etc/nginx/sites-available/portfolio /etc/nginx/sites-enabled/
nginx -t && systemctl reload nginx
```

8. **Setup SSL with Let's Encrypt**
```bash
apt install -y certbot python3-certbot-nginx
certbot --nginx -d your_domain.com
```

9. **Setup permissions**
```bash
chown -R www-data:www-data /var/www/portfolio
chmod -R 755 /var/www/portfolio
chmod -R 775 /var/www/portfolio/storage /var/www/portfolio/bootstrap/cache
```

10. **Verify deployment**
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

11. **Setup cron job** (untuk queue jika digunakan)
```bash
crontab -e
# Tambahkan:
* * * * * cd /var/www/portfolio && php artisan schedule:run >> /dev/null 2>&1
```

## Environment Variables

Dokumentasi lengkap `.env`:

```
# Application
APP_NAME=Portfolio              # Nama aplikasi
APP_ENV=production              # local, production
APP_DEBUG=false                 # Jangan enable di production
APP_KEY=base64:xxxxx            # Auto-generated, jangan share
APP_URL=https://yourdomain.com  # Domain production

# Database (SQLite default, uncomment MySQL jika perlu)
DB_CONNECTION=sqlite
# DB_HOST=localhost
# DB_PORT=3306
# DB_DATABASE=portfolio_prod
# DB_USERNAME=root
# DB_PASSWORD=secure_password

# Session & Cache
SESSION_DRIVER=database         # Untuk distributed systems, gunakan redis/memcached
CACHE_STORE=database            # Uncomment REDIS_ jika menggunakan Redis

# Mail
MAIL_MAILER=smtp                # smtp, sendmail, log
MAIL_HOST=smtp.mailtrap.io      # atau sendgrid, mailgun, dsb
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS=noreply@yourdomain.com
MAIL_FROM_NAME="${APP_NAME}"

# Logging
LOG_CHANNEL=stack               # single, stack, daily
LOG_LEVEL=error                 # debug, info, notice, warning, error
```

## Troubleshooting

**Error: "no such table: profiles"**
- Jalankan: `php artisan migrate --force`
- Pastikan database connection benar di `.env`

**Error: "CSRF token mismatch"**
- Pastikan form include `@csrf`
- Check browser cookies (clear cache jika perlu)

**Error: "File not found" di production**
- Run: `php artisan config:cache && php artisan route:cache`
- Pastikan folder `public/` bisa diakses via web

**Admin tidak bisa login**
- Jalankan seeder: `php artisan db:seed`
- Reset password: `php artisan tinker` → `App\Models\User::find(1)->update(['password' => Hash::make('newpassword')])`

**Contact form tidak kirim email**
- Setup MAIL env variables dengan service provider (Mailtrap, SendGrid, dsb)
- Test email: `php artisan tinker` → `Mail::to('test@example.com')->send(new TestMail())`

**Assets tidak load (404 pada CSS/JS)**
- Run: `npm run build`
- Pastikan `public/build/` folder exist
- Clear browser cache (Ctrl+Shift+Delete)

## Maintenance

### Regular Tasks
- Monitor error logs: `tail -f storage/logs/laravel.log`
- Backup database secara berkala
- Update dependencies: `composer update`, `npm update`
- Monitor disk usage (especially `storage/` folder)
- Review contact messages secara berkala

### Cache Clearing
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Security Notes

- **Disable public registration** — Route auth registration sudah disabled di seeder
- **Rate limiting** — Contact form: 5 requests per minute
- **CSRF protection** — Semua form include CSRF token
- **SQL Injection** — Gunakan Eloquent ORM + parameterized queries
- **XSS prevention** — Blade template auto-escape output
- **Password hashing** — Laravel bawaan dengan Bcrypt
- **Environment secrets** — Jangan commit `.env` atau `.env.local`

## License

MIT License — Bebas digunakan untuk personal atau komersial

## Support

Untuk pertanyaan atau issue:
1. Check dokumentasi Laravel: https://laravel.com/docs
2. Review Tailwind docs: https://tailwindcss.com/docs
3. Baca kode di folder `app/`, `resources/views/`, `routes/`
4. Test via `php artisan tinker` untuk debugging

---

**Last Updated:** 2026-10-14
**Laravel Version:** 11.x
**PHP Version:** 8.2+
