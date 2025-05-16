# Scholarship Information Management System (WMSU SIMS)

## 1. Project Overview

The Scholarship Information Management System (SIMS) is a web-based application designed to automate and streamline the scholarship application process for students and administrators at Western Mindanao State University (WMSU). The system allows students to submit applications, upload documents, schedule appointments, and track their application status online, while providing administrators with tools to efficiently manage, review, and process applications.

---

## 2. Prerequisites / Required Software

- PHP >= 7.4  
- MySQL 5.7+  
- Composer (for PHP dependencies)  
- Web Server: Apache or Nginx  
- Operating System: Windows 10+, macOS 10.13+, or any modern Linux distribution  
- Git (for cloning the repository)

---

## 3. Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Potchiiii/Scholarship-Information-Management-System
   cd scholarship-sims
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

---

## 4. Database Setup

1. **Create the database:**
   ```sql
   CREATE DATABASE scholarship_sims;
   ```

2. **Import the schema and seed data:**
   ```bash
   mysql -u root -p scholarship_sims < database/schema.sql
   ```

3. **Configure environment variables:**  
   Create a `.env` file in the project root with the following content:
   ```
   DB_HOST=localhost
   DB_DATABASE=scholarship_sims
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

---

## 5. Configuration

- Place your `.env` file in the project root directory.
- Set up any required API keys or external service credentials in `.env`.
- Adjust settings such as port or debug mode in the `.env` or `config.php` file.
- For email notifications, configure SMTP settings in the environment or config file.

---

## 6. Running the Application

- **Start the PHP built-in server (for local development):**
  ```bash
  php -S localhost:8000
  ```
- **Or deploy to your web server’s public directory.**
- **Access the application:**  
  Open [http://localhost:8000](http://localhost:8000) in your browser (for local development).

### **InfinityFree Hosting Instructions**

- Upload all project files to your InfinityFree hosting account using the file manager or FTP.
- Create a new MySQL database using the InfinityFree control panel.
- Import the database schema using phpMyAdmin provided by InfinityFree.
- Update your database credentials in the configuration file or `.env` file to match your InfinityFree database settings.
- Access your application using the domain/subdomain provided by InfinityFree.

---

## 7. Testing

- **Run PHP unit tests:**
  ```bash
  ./vendor/bin/phpunit

---

## 8. Deployment

- **Production deployment steps:**
  - Pull latest code:  
    ```bash
    git pull origin main
    ```
  - Set correct file permissions:
    ```bash
    chmod -R 755 storage
    chmod -R 755 bootstrap/cache
    ```
  - Optimize configuration (if using Laravel or similar):
    ```bash
    php artisan config:cache
    php artisan route:cache
    ```
  - Clear and cache views/assets as needed.

- **InfinityFree Hosting:**  
  - Upload all files via FTP or the InfinityFree file manager.
  - Import the database using phpMyAdmin.
  - Update database credentials in your config or `.env` file.

---

## 9. Troubleshooting / FAQ

- **Blank page or 500 error:**  
  - Check file permissions and error logs.
  - Ensure `.env` is configured correctly.

- **Database connection errors:**  
  - Verify DB credentials and that MySQL is running.

- **Assets not loading:**  
  - Check asset paths and ensure files are uploaded correctly.

- **Email not sending:**  
  - Confirm SMTP settings in `.env` or config.

---

## 10. Contribution Guidelines

- Fork the repository.
- Create a new branch for your feature or bugfix.
- Commit your changes with clear messages.
- Open a pull request with a detailed description.

---

## 11. License

This project is licensed under the MIT License. See [LICENSE](LICENSE) for details.