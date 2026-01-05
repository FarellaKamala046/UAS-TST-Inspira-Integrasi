# Laporan Tugas 3: Inspira - Inspiration-to-Commerce Microservice Platform
**Mata Kuliah: II3160 Teknologi Sistem Terintegrasi**

---

**Inspira** merupakan sebuah platform layanan mikro (microservice) galeri fashion OOTD (Outfit of the Day) yang menjembatani proses eksplorasi inspirasi visual dengan pengambilan keputusan pembelian produk fashion secara langsung. 

* **URL Layanan Terintegrasi:** https://uas-tst-inspira-integrasi.vercel.app/

---

## Overview & Konsep
Sistem ini mengusung konsep **inspiration-to-commerce**. Inspira berfokus pada pengelolaan konten inspirasi visual, sementara informasi produk disediakan melalui integrasi dengan layanan eksternal bernama **Clothify**.

### Fitur Utama:
- **Visual Gallery**: Menjelajahi koleksi OOTD secara publik.
- **Authentication & Authorization**: Mekanisme pendaftaran dan masuk berbasis token untuk melindungi fitur personal.
- **Personal Collection (Save to Board)**: Menyimpan inspirasi gaya ke koleksi pribadi pengguna.
- **Get the Look (Integration)**: Fitur unggulan yang secara otomatis memetakan elemen pakaian pada foto inspirasi ke katalog produk siap beli dari Clothify.

---

## Arsitektur & Infrastruktur
Sistem dideploy menggunakan pendekatan microservices untuk memastikan isolasi dan skalabilitas layanan.

- **Backend Inspira**: Dideploy menggunakan teknologi containerization **Docker** pada perangkat **Set Top Box (STB)** berbasis OS Armbian.
- **Frontend**: Dideploy menggunakan platform **Vercel** untuk aksesibilitas publik yang cepat.
- **Komunikasi**: Integrasi antar layanan menggunakan mekanisme **Service-to-Service API Communication**.

---

## Akses Layanan & Deployment
Layanan ini dapat diakses secara publik melalui tautan berikut:

- **Frontend Integrasi (Vercel)**: [https://uas-tst-inspira-integrasi.vercel.app](https://uas-tst-inspira-integrasi.vercel.app) 
- **Backend API Inspira (STB)**: [https://inspira-container.otwdochub.my.id/](https://inspira-container.otwdochub.my.id/) 
- **API Rekan (Clothify)**: [https://clothify.otwdochub.my.id/](https://clothify.otwdochub.my.id/) 
- **Video Dokumentasi**: [https://youtu.be/D5DtM22K5SQ](https://youtu.be/D5DtM22K5SQ) 

---

## Dokumentasi API Endpoint

### 1. Layanan Inti (Inspira)
| Method | Endpoint | Akses | Fungsi |
|--------|----------|-------|--------|
| POST | /api/register | Publik | Mendaftarkan akun pengguna baru  |
| POST | /api/login | Publik | Autentikasi dan pengambilan Access Token  |
| GET | /api/looks | Publik | Mengambil daftar galeri foto OOTD  |
| GET | /api/boards/id/looks | Token | Mengambil koleksi simpanan pribadi  |

### 2. Layanan Terintegrasi
| Method | Endpoint | Akses | Fungsi |
|--------|----------|-------|--------|
| GET | /products | Publik | Mengambil katalog produk dari Clothify  |
| POST | /api/quick-save | Token | Menyimpan data OOTD terintegrasi ke database  |

---

## Cara Menjalankan Secara Lokal
Jika ingin menjalankan frontend secara lokal:
1. Clone repositori ini: `git clone https://github.com/FarellaKamala046/UAS-TST-Inspira-Integrasi.git`.
2. Buka file `index.html` pada browser Anda.
3. Pastikan koneksi internet tersedia untuk memanggil API yang berada di STB.

---

## 👥 Tim Pengembang
- **Farella Kamala Budianto** / 18223046 / Inspira
- **Kenlyn Tesalonika Winata** / 18223098 / Clothify
