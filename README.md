# 📸 PhotoGallery Pro – Enterprise PHP Architecture

**PhotoGallery Pro** is a high-performance image management ecosystem engineered with **Pure PHP**. Moving beyond basic scripting, this platform implements the **Repository Pattern** to decouple data access from business logic, ensuring a scalable, maintainable, and industry-standard codebase without the overhead of heavy frameworks.

---

## 🏗️ Architecture: The Repository Pattern

To eliminate "Spaghetti Code," this project enforces a strict separation between the **Database Layer** and the **User Interface**. This architectural choice provides professional-grade organization:

* **Entities:** Domain models representing the core data structures (e.g., Image, User).
* **Repositories:** Dedicated abstraction classes containing all **SQL/PDO logic**. The application consumes data without needing to know the underlying query complexity.
* **Controller Layer:** Orchestrates user requests and bridges the communication between Views and Repositories.

---

## 🛠️ Technical Stack & Environment

* **Backend:** PHP 8.x (Pure / Vanilla)
* **Database:** MySQL / MariaDB (Managed via **phpMyAdmin**)
* **Infrastructure:** XAMPP / Apache Stack
* **Design Patterns:** **Repository Pattern** & Singleton DB Wrapper
* **Security:** Full **PDO Integration** with Prepared Statements to neutralize SQL Injection vulnerabilities.

---

## 🚀 Key Engineering Highlights

### 🖼️ Intelligent Asset Orchestration
High-speed gallery rendering with dynamic metadata retrieval. The system is optimized for low-latency image loading through a structured abstraction layer.

### 🔐 Enterprise-Grade Data Security
Complete transition away from legacy `mysqli` functions. All database interactions utilize **PDO**, providing a secure, robust environment for handling sensitive user data and media assets.

### 📱 Responsive "Mobile-First" UI
A sleek, modern interface built with **HTML5** and **CSS3 (Flexbox/Grid)**, delivering a seamless experience across mobile, tablet, and ultra-wide desktop displays.

---

## 📂 Project Anatomy

```text
/src
 ├── Core/          # Database Lifecycle (Singleton Pattern)
 ├── Repositories/  # Abstraction Layer (SQL & Data Logic)
 ├── Entities/      # Data Models (Class Blueprints)
 ├── Public/        # Gateway (index.php) & Static Assets
 └── Views/         # UI Templates & Server-Side Rendering
