## Fleet Management System

A full-stack web application for managing vehicle rentals with features for both users and administrators. This system enables users to book vehicles with flexible options (self-drive or with driver) and download invoices. The admin panel provides tools to manage vehicles, track financials, customers and employees.

## Features

User Side:

* Vehicle Booking with selection of pick-up and drop-off dates.
* Flexible Pricing Models: Charges based on day, kilometer, or hour.
* Self-Drive Option with license verification.
* Driver Assignment based on availability.
* Invoice Generation and downloading in PDF format.

Admin Side:

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

## Tech Stack

* Frontend: HTML, CSS, JavaScript, Bootstrap 5
* Backend: PHP, MySQL
* Interactivity: AJAX
* PDF Generation: FPDF
* Email Notifications: Email API

## Setup Instructions

   Go to into the XAMPP's "htdocs" directory 

1. **Clone the Repository**

   ```
   git clone https://github.com/preethikavitha/Fleet_Management_Project.git
   cd Fleet_Management_Project
   ```

2. **Setup Database**

   * Import the provided SQL file into your MySQL server.

3. **Run Locally**

   * Use XAMPP to serve the project folder.
   * Visit `http://localhost/Fleet_Management_Project/user/` in your browser.




