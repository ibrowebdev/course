# Laravel Course Enrollment System

## 🚀 Live Demo
🔗 https://tinyurl.com/courses-apps

## 📦 GitHub Repo
🔗 https://github.com/ibrowebdev/course

## 👤 Test User Credentials
Email: oaubot7@gmail.com  
Password: 1234

---

## 📚 Features
- User registration/login (Laravel + Livewire)
- Course listing, enrollment, filtering
- Course detail page with comments (Livewire)
- REST API with Sanctum token auth
- Queued email notifications (database queue)
- Rate-limited API endpoints

---

## ⚙️ Project Setup

1. Clone the repo:
    ```bash
    git clone https://github.com/ibrowebdev/course.git
    cd course
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install && npm run build
    ```

3. Set up `.env`:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```


4. Configure  settings in `.env` (courselite.sql file in database folder)

| Key              | Value   |
|-------------------|------------|
| DB_CONNECTION | mysql   |
| DB_HOST | 127.0.0.1   |
| DB_PORT | 3306   |
| DB_USERNAME | root   |
| DB_PASSWORD |    |

| MAIL_MAILER | smtp   |
| MAIL_HOST   | sandbox.smtp.mailtrap.io    |
| MAIL_PORT   | 2525    |
| MAIL_USERNAME | f4438450ba822b    |
| MAIL_PASSWORD | d4d5577532e1f9    |
| MAIL_FROM_ADDRESS | "hello@courselite.com"    |
| MAIL_FROM_NAME | "CourseLite Admin"    |
| QUEUE_CONNECTION | database    |

5. Run migrations:
    ```bash
    php artisan migrate
    ```
    

6. Start the server:
    ```bash
    php artisan serve
    npm run dev
    ```

8. Start queue worker:
    ```bash
    php artisan queue:work
    ```


---
## 🧪 API Testing

Use tools like Postman:

```http
POST /api/login
Body: { email, password }
-> Returns: token

Authorization: Bearer {token}
GET /api/courses - List enrolled courses
GET /api/courses/{id} - Get specific course details with the first 5 comments
POST /api/courses/{id}/comments - Post a new comment
GET /api/courses/{id}/comments - Get course comments
