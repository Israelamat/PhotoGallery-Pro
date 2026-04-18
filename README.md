# 📸 PhotoGallery Pro – Clean Architecture PHP Solution

**PhotoGallery Pro** is a high-performance image management ecosystem built with **Pure PHP**. Unlike standard basic projects, this gallery implements the **Repository Pattern**, abstracting data access to ensure a scalable, maintainable, and professional codebase without the need for heavy frameworks.

---

## 🏗️ The Repository Pattern Architecture

To avoid "Spaghetti Code," this project separates **Database Logic** from the **User Interface**. This architecture allows for cleaner code, easier debugging, and professional-grade organization.

* **Entities:** Data objects representing the Image and User models.
* **Repositories:** Dedicated classes that house all **SQL/PDO queries**. The rest of the app doesn't know *how* the data is fetched, it only consumes it.
* **Controller Layer:** Handles user requests and coordinates between the View and the Repository layers.

---

## 🛠️ Technical Stack & Environment

* **Backend:** PHP 8.x (Pure / Vanilla)
* **Database:** MySQL / MariaDB (Managed via **phpMyAdmin**)
* **Server Stack:** XAMPP / Apache
* **Architecture:** **Repository Pattern** & Singleton DB Wrapper
* **Security:** Full **PDO Integration** with Prepared Statements to neutralize SQL Injection.

---

## 🚀 Key Technical Features

### 🖼️ Intelligent Asset Management
High-speed rendering of image galleries with dynamic metadata retrieval through the abstraction layer.

### 🔐 Secure Data Access
Zero use of outdated `mysqli_query`. All database interactions are handled via **PDO**, ensuring enterprise-grade security for user data and file uploads.

### 📱 Fully Responsive UI
A sleek, modern frontend built with **HTML5** and **CSS3 Flexbox/Grid**, optimized for mobile, tablet, and desktop viewing.

---

## 📂 Project Structure

```text
/src
 ├── Core/          # Database Connection (Singleton Pattern)
 ├── Repositories/  # The Abstraction Layer (SQL Logic & Queries)
 ├── Entities/      # Data Models (Class structures)
 ├── Public/        # Entry point (index.php) and Assets
 └── Views/         # UI Templates & Rendered Pages
