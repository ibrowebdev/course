# 📚 Laravel Course Enrollment System

A full-stack Laravel application with Livewire, Tailwind CSS, REST API, and queue processing. Built as part of a technical assessment.

## 🚀 Features

### 🔐 User Authentication
- Registration and login using Laravel (Livewire stack)

### 🎓 Course Management
- Livewire-powered course list (paginated)
- Filter between enrolled/not enrolled
- Enroll / Cancel enrollment
- Course detail page with dynamic comment section

### 💬 Comment System
- Add/Delete comments on enrolled courses
- Real-time updates with Livewire
- Comments visible only to enrolled users

### 🧾 REST API (Sanctum Auth)
- `GET /api/courses` - List user’s enrolled courses
- `GET /api/courses/{id}` - Course detail with first 5 comments
- `GET /api/courses/{id}/comments` - List comments
- `POST /api/courses/{id}/comments` - Add comment

### 📨 Queued Jobs
- Email notification on enrollment (queued)
- Comment notification (queued)

---

## 🛠 Tech Stack

- Laravel 11.x
- Livewire 3
- Tailwind CSS
- Sanctum (API auth)
- MySQL
- Laravel Queue with `database` driver

---

## ⚙️ Project Setup

1. Clone the repo:
    ```bash
    git clone https://github.com/your-username/course-enrollment.git
    cd course-enrollment
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

4. Configure DB and mail settings in `.env`

5. Run migrations:
    ```bash
    php artisan migrate
    ```

6. Start the server:
    ```bash
    php artisan serve
    ```

7. Start queue worker:
    ```bash
    php artisan queue:work
    ```

---

## 🌐 Live Demo

🔗 **App URL**: https://your-live-app-url.com  
🔗 **GitHub**: https://github.com/ibrowebdev/course

---

## 👥 Sample User Credentials

| Email              | Password   |
|-------------------|------------|
| oaubot7@gmail.com | 1234   |

✅ This user is already enrolled in multiple courses with comments.

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
