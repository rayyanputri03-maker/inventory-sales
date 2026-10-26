# Inventory Sales - Aplikasi Inventaris & Penjualan

Inventory Sales adalah aplikasi manajemen inventaris barang dan transaksi penjualan/pembelian berbasis web yang dibuat menggunakan Laravel Breeze dan Tailwind CSS.

## Fitur Utama
- **Dashboard Statistics:** Ringkasan total produk, kategori, supplier, transaksi, serta peringatan stok rendah.
- **Manajemen Master Data:** CRUD Kategori, Supplier, dan Produk.
- **Transaksi Penjualan & Pembelian:** Pencatatan riwayat transaksi beserta detail item.
- **Laporan Penjualan:** Filter laporan berdasarkan rentang tanggal dan pencarian nomor invoice.

## Tech Stack
- **Framework:** Laravel 11
- **Authentication:** Laravel Breeze
- **Database:** MySQL
- **Frontend Styling:** Tailwind CSS

## Cara Instalasi Lokal
1. Clone repository ini:
   ```bash
   git clone [https://github.com/username-kamu/inventory-sales.git](https://github.com/username-kamu/inventory-sales.git)
   cd inventory-sales

2. Install dependensi:
   Bash
   composer install
   npm install && npm run build

3. Salin .env.example menjadi .env dan sesuaikan konfigurasi database:
   Bash
   cp .env.example .env
   php artisan key:generate

4. Jalankan migrasi database:
   Bash
   php artisan migrate

5. Jalankan server lokal:
   Bash
   php artisan serve

6. Simpan filenya (**`Ctrl + S`**).
7. Setelah itu, kamu bisa lanjut jalankan perintah `git add .` di terminal untuk di-*push* ke GitHub!

<ElicitationsGroup>
<Elicitation>
<Question>Butuh panduan perintah Git selanjutnya untuk push ke GitHub?</Question>
<Options>
<Option text="Ya, minta urutan perintah Git-nya"/>
<Option text="Sudah paham, terima kasih!"/>
</Options>
</Elicitation>
</ElicitationsGroup>

## Akun Pengujian (Login Credentials)
Untuk mencoba fitur aplikasi, kamu bisa masuk menggunakan akun default berikut atau mendaftar akun baru melalui menu **Register**:
- **Email:** admin@gmail.com
- **Password:** password123
  
## Langkah-Langkah Login ke Aplikasi
1. Jalankan server Laravel (`php artisan serve`) dan asset builder (`npm run dev`).
2. Buka browser dan kunjungi `http://127.0.0.1:8000`.
3. Klik tombol **Log in** di pojok kanan atas halaman utama.
4. Masukkan **Email** dan **Password** sesuai kredensial di atas.
5. Klik tombol **Log in** untuk masuk ke halaman **Dashboard StockHub**.

tampilan aplikasi:
<img width="959" height="476" alt="image" src="https://github.com/user-attachments/assets/7c2a581d-d2a5-4995-8cbe-d2cf3d8521a1" />
<img width="959" height="441" alt="image" src="https://github.com/user-attachments/assets/e1fed154-d32a-4bc1-a2df-18a31704d382" />

<img width="959" height="476" alt="image" src="https://github.com/user-attachments/assets/32fb259a-0208-4b86-92b5-e795f3ef79b5" />
<img width="959" height="441" alt="image" src="https://github.com/user-attachments/assets/c47e209e-51cf-4195-8d00-ead528f14c07" />
<img width="959" height="442" alt="image" src="https://github.com/user-attachments/assets/ea18bbcd-f024-4234-94ea-2a8bca82e9c8" />
<img width="959" height="441" alt="image" src="https://github.com/user-attachments/assets/670ebead-3c43-4d6d-8230-ffdf4517b2ba" />
<img width="959" height="440" alt="image" src="https://github.com/user-attachments/assets/d2032b16-c915-4c1c-bf90-8a46856d32d7" />
<img width="959" height="438" alt="image" src="https://github.com/user-attachments/assets/00b350a5-528a-47ba-af45-8e415e9e92fd" />
<img width="959" height="446" alt="image" src="https://github.com/user-attachments/assets/2ff47a91-76ac-4dd9-8a91-f40725e79ecb" />
