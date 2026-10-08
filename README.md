# 💻 Raj Mukut – Personal Portfolio

A modern and responsive personal portfolio website designed to showcase my academic background, technical skills, projects, experience, and professional profile.

---

## 📌 About

This portfolio represents my journey as a Computer Science & Engineering graduate and provides an overview of my technical skills, academic qualifications, projects, and professional interests.

The website is designed with a clean, modern, and responsive interface to provide an engaging user experience across desktop, tablet, and mobile devices.

---

## ✨ Features

* 👤 Personal Profile
* 🎓 Educational Qualification
* 💻 Technical Skills
* 🚀 Project Showcase
* 🔗 GitHub Integration
* 📱 Responsive Design
* 🎨 Modern UI
* ✨ Animated Interface
* 📩 Contact Information
* 🔐 Admin Panel
* 🗂️ Dynamic Portfolio Content Management

---

## 🛠️ Technologies Used

### Frontend

* HTML5
* CSS3
* JavaScript
* Bootstrap

### Backend

* PHP
* Laravel

### Database

* MySQL

### Development Tools

* XAMPP
* Composer
* Git
* GitHub
* Visual Studio Code

---

## 📂 Main Sections

```text
Portfolio
│
├── Home
├── About Me
├── Skills
├── Education
├── Projects
├── GitHub
├── Contact
└── Admin Panel
```

---

## 🎯 Project Objectives

* Create a professional online portfolio
* Showcase academic qualifications
* Present technical skills and projects
* Provide easy access to professional information
* Build a responsive personal website
* Provide an online professional identity
* Allow dynamic portfolio content management

---

## 🔐 Admin Panel

The portfolio includes an administrative panel for managing portfolio content.

Admin functionality includes:

* Secure admin login
* Manage profile information
* Manage skills
* Manage education
* Manage projects
* Manage portfolio content
* Update website information

---

## 🏗️ System Architecture

```text
                    ┌─────────────────────┐
                    │       Visitor       │
                    └──────────┬──────────┘
                               │
                               ▼
                    ┌─────────────────────┐
                    │      Frontend       │
                    │   HTML / CSS / JS   │
                    └──────────┬──────────┘
                               │
                               ▼
                    ┌─────────────────────┐
                    │      Laravel        │
                    │       PHP           │
                    └──────────┬──────────┘
                               │
                               ▼
                    ┌─────────────────────┐
                    │       MySQL         │
                    │      Database       │
                    └─────────────────────┘
```

---

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/rajmukut791/portfolio.git
```

### 2. Navigate to the Project

```bash
cd portfolio
```

### 3. Install Dependencies

```bash
composer install
```

### 4. Configure Environment

```bash
cp .env.example .env
```

Configure the database:

```env
DB_DATABASE=portfolio
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Run Database Migration

```bash
php artisan migrate
```

### 7. Start the Application

```bash
php artisan serve
```

---

## 📸 Screenshots

```markdown
![Home Page](screenshots/home.png)

![About Section](screenshots/about.png)

![Skills Section](screenshots/skills.png)

![Projects Section](screenshots/projects.png)

![Admin Dashboard](screenshots/admin-dashboard.png)
```

---

## 🔮 Future Improvements

* Blog system
* Downloadable CV
* Contact form with email notifications
* Advanced project filtering
* Online resume builder
* Dark/light mode
* Multi-language support
* Advanced analytics
* More interactive animations

---

## 👨‍💻 Developer

**Raj Mukut**

Computer Science & Engineering
Northern University Bangladesh

### Connect

* GitHub: https://github.com/rajmukut1628
* Facebook: https://facebook.com/rajmukut791
* Email: [rajmukut791@gmail.com](mailto:rajmukut791@gmail.com)

---

## 📄 License

This project was developed for academic and personal portfolio purposes.

© 2026 Raj Mukut. All Rights Reserved.
