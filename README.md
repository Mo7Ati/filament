# My Filament Project 🧵

A Laravel application leveraging **FilamentPHP** to provide a clean, modern admin  Dashboard.

## 🚀 Features

- 🔐 User authentication & role-based access control
- 📋 CRUD interfaces via Filament Resources
- ⚙️ Custom columns, filters, actions
- 🗂️ File uploads & media handling
- 🔔 Live notifications 

## 🛠️ Tech Stack

- **Laravel** 12  
- **PHP** 8.2
- **FilamentPHP** 3.x  
- **Livewire**, **Alpine.js**, **Tailwind CSS**  

## 📥 Installation

1. Clone the project:
   ```bash
   git clone https://github.com/Mo7Ati/filament.git
   cd filament
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install JS dependencies:
   ```bash
   npm install && npm run dev
   ```

4. Duplicate environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Set your database and other `.env` values.

6. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

7. Run the app:
   ```bash
   php artisan serve
   ```

## 🧩 Key Components

- **app/Filament/Resources/** – Admin resource definitions.
- **app/Policies/** – Authorization logic .
- **app/Models/** – Eloquent models .
- **config/filament.php** – Filament panel configurations.

## 📦 Usage Guide

- Access admin panel at `/admin/dashboard`.

## 🧑‍💻 Default Admin Access

To log into the admin panel, use the following default credentials:

- **Email:** `admin@ps.com`
- **Password:** `password`


## 📄 License

This project is licensed under the **MIT License**. See [LICENSE](LICENSE) for details.

---

**FilamentPHP** is an amazing admin dashboard for Laravel — learn more at their [official docs](https://filamentphp.com).
