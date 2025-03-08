# PHP MVC Projesi

Bu proje, basit bir MVC (Model-View-Controller) mimarisi kullanarak PHP ile geliştirilmiş temel bir web uygulaması örneğidir. Amaç, PHP'de basit bir framework yapısının nasıl kurulabileceğini ve temel CRUD (Oluşturma, Okuma, Güncelleme, Silme) işlemlerinin nasıl yönetilebileceğini göstermektir. Proje, gönderi (post) yönetimi üzerine odaklanmıştır ve basit API endpoint'leri sunar.


## Kurulum

Projeyi çalıştırmak için aşağıdaki adımları izleyin:

1. **Depoyu Klonlayın:**
   ```bash
   git clone https://github.com/berkinmentas/php-mvc-framework.git
   ```

2. **Veritabanı Yapılandırması:**
   - Proje dizininde `config/database.php` dosyası oluşturun.
   - Örnek veritabanı yapılandırması:
   ```php
   <?php
    return [
        'host' => 'localhost',
        'database' => 'test',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
    ];
   ```
   - MySQL veritabanı üzerinde oluşturduğunuz veritabanı bağlantı bilgilerini yapılandırma dosyasına yazın.

## Çalıştırma

Yukarıdaki kurulum adımlarını tamamladıktan sonra, projeyi çalıştırmak için web sunucunuzu başlatmanız yeterlidir.

## Rotalar

Projede tanımlı rotalar ve işlevleri aşağıda listelenmiştir. Rotalar `config/routes.php` dosyasında tanımlanmıştır.

**Test Rotaları:**

- **GET `/virtara-task/test`**: Basit bir test sayfasını görüntüler.
- **GET `/virtara-task/test/{id}`**: ID parametresi ile test sayfasını görüntüler.

**Gönderi (Post) API Rotaları:**

- **GET `/virtara-task/posts`**: Tüm gönderileri JSON formatında listeler.
  ```json
  [
    { "id": "1", "title": "İlk Gönderi", "content": "Bu ilk gönderinin içeriği.", "user_id": "1", "status": "1" },
    { "id": "2", "title": "İkinci Gönderi", "content": "Bu ikinci gönderinin içeriği.", "user_id": "1", "status": "1" }
  ]
  ```

- **GET `/virtara-task/posts/{id}`**: Belirtilen ID'ye sahip gönderiyi JSON formatında görüntüler.
  ```json
  { "id": "1", "title": "İlk Gönderi", "content": "Bu ilk gönderinin içeriği.", "user_id": "1", "status": "1" }
  ```

- **POST `/virtara-task/posts`**: Yeni bir gönderi oluşturur. İstek gövdesinde JSON formatında gönderi verileri göndermeniz gerekir.
  **Örnek İstek Gövdesi (JSON):**
  ```json
  {
    "title": "Yeni Gönderi Başlığı",
    "content": "Yeni gönderi içeriği.",
    "user_id": "1"
  }
  ```
  **Başarılı Yanıt (JSON):**
  ```json
    {
    "id": 1,
    "title": "Yeni Gönderi Başlığı",
    "content": "Yeni gönderi içeriği.",
    "user_id": 1,
    "created_at": "2025-03-08 22:05:11",
    "updated_at": "2025-03-08 22:05:11"
    }
  ```
  (Yanıt, oluşturulan gönderinin ID'sini içerir.)

- **PUT `/virtara-task/posts/{id}`**: Belirtilen ID'ye sahip gönderiyi günceller. İstek gövdesinde güncellenmiş gönderi verilerini JSON formatında göndermeniz gerekir.
  **Örnek İstek Gövdesi (JSON):**
  ```json
  {
    "title": "Güncellenmiş Gönderi Başlığı",
    "content": "Güncellenmiş gönderi içeriği."
  }
  ```
  **Başarılı Yanıt (JSON):**
  ```json
  {
    "id": "1",
    "message": "Post updated successfully"
  }
  ```

- **DELETE `/virtara-task/posts/{id}`**: Belirtilen ID'ye sahip gönderiyi siler.
  **Başarılı Yanıt (JSON):**
  ```json
  {
    "message": "Post deleted successfully"
  }
  ```
