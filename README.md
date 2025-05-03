# 🚗 Vehicle Rental Management System

A full-stack web application for managing vehicle rentals with features for both users and administrators. This system enables users to book vehicles with flexible options (self-drive or with driver), track bookings, and download invoices. The admin panel provides tools to manage vehicles, track financials, and oversee customers and employees.

---

## 🌐 Features

### 👤 User Side:

* Vehicle Booking with selection of pick-up and drop-off dates.
* Flexible Pricing Models: Charges based on day, kilometer, or hour.
* Self-Drive Option with license verification.
* Driver Assignment based on availability.
* Invoice Generation and downloading in PDF format.

### 🛠 Admin Side:

* Dashboard Overview showing:

  * Vehicle availability
  * Profit & expense reports (service, insurance, RTO)
* Vehicle Management:

  * Add/edit/suspend vehicles
  * Configure charge models
* Payment Reminders and management
* Customer & Employee Management:

  * View customer and employee details
  * Track booking history and payment records

---

## 🧰 Tech Stack

* Frontend: HTML, CSS, JavaScript, Bootstrap 5
* Backend: PHP, MySQL
* Interactivity: AJAX
* PDF Generation: FPDF
* Email Notifications: Email API

---

## 🖥 Setup Instructions

1. **Clone the Repository**

   ```
   git clone https://github.com/yourusername/vehicle-rental-system.git
   cd vehicle-rental-system
   ```

2. **Setup Database**

   * Import the provided SQL file into your MySQL server.
   * Update database credentials in `/config/db.php`.

3. **Configure Email API (optional)**

   * Set your SMTP credentials in the email configuration file.

4. **Run Locally**

   * Use XAMPP/LAMP/MAMP to serve the project folder.
   * Visit `http://localhost/vehicle-rental-system/` in your browser.

---


