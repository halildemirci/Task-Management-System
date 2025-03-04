# 📝 Task Management System

![Task Management](https://img.shields.io/badge/Laravel-12-red?style=for-the-badge) ![API](https://img.shields.io/badge/API-REST-blue?style=for-the-badge)

Task Management System, kullanıcıların **görev oluşturup yönetmesini sağlayan bir Laravel tabanlı** projedir.  
Hem **web arayüzü hem de REST API desteği** sunar. 🚀

## 📌 **Özellikler**

✅ Kullanıcı Girişi ve Yetkilendirme (Laravel Sanctum)  
✅ Görevleri Oluşturma, Güncelleme, Silme  
✅ Web Arayüzü (Blade + Tailwind CSS)  
✅ REST API Desteği (Postman ile test edilebilir)  
✅ JSON Web Token (JWT) ile API Kimlik Doğrulama  
✅ Kullanıcı Paneli, Kullanıcı'ya Atanmış Görevler

---

## 🔧 **Kurulum Adımları**

### 1️⃣ **Projeyi Klonla**

```bash
git clone https://github.com/halildemirci/Task-Management-System.git
cd Task-Management-System
```

### 2️⃣ **Bağımlılıkları Yükle**

```bash
composer install
npm install
```

### 3️⃣ **.env Dosyasını Oluştur ve Düzenle**

```bash
cp .env.example .env
```

### **Daha sonra .env dosyanı aç ve aşağıdaki gibi ayarla:**

```bash
APP_NAME="Task Management System"
APP_URL=http://127.0.0.1:8000
DB_CONNECTION=sqlite
```

### 4️⃣ **Veritabanını Kur ve Migrasyonları Çalıştır**

```bash
php artisan migrate
```

### 5️⃣ **Laravel için key oluştur**

```bash
php artisan key:generate
```

### 6️⃣ **Uygulamayı Başlat**

```bash
php artisan serve
npm run dev
```

## 📡 **REST API Kullanımı**

## 🔐 **Kullanıcı Girişi**

```bash
POST /api/auth/login
```

```bash
{
    "email": "test@example.com",
    "password": "password123"
}
```

## 📌 **Görev Listeleme**

```bash
GET /api/tasks
Authorization: Bearer YOUR_ACCESS_TOKEN
```

## 📝 **Yeni Görev Ekleme**

```bash
POST /api/task/create
Authorization: Bearer YOUR_ACCESS_TOKEN
```

```bash
{
    "name": "Yeni Görev",
    "description": "Yeni Görev Açıklaması",
    "user_id": {id} # Atama yapılacak kullanıcı ID
}
```

## 📝 **Görev Düzenleme**

```bash
PUT /api/task/edit/{id} # Hangi Görev Düzenlenecekse Görev ID
Authorization: Bearer YOUR_ACCESS_TOKEN
```

```bash
{
    "name": "Yeni Görev",
    "description": "Yeni Görev Açıklaması",
}
```

## ✅ **Görev Tamamlama**

```bash
PATCH /api/task/completed/{id} # Hangi Görev Tamamlanacaksa Görev ID
Authorization: Bearer YOUR_ACCESS_TOKEN
```

## ❌ **Görev Silme**

```bash
DELETE /api/task/delete/{id} # Hangi Görev Silinecekse Görev ID
Authorization: Bearer YOUR_ACCESS_TOKEN
```

## 👥 **Kullanıcılar**

```bash
GET /api/users
Authorization: Bearer YOUR_ACCESS_TOKEN
```

## 🔍 **Belirli Bir Kullanıcı Görevleri**

```bash
GET /api/user/{id}
Authorization: Bearer YOUR_ACCESS_TOKEN
```

## 🔓 **Çıkış Yap**

```bash
GET /api/auth/logout # Oluşturulan Tüm Tokenleri Siler
Authorization: Bearer YOUR_ACCESS_TOKEN
```
