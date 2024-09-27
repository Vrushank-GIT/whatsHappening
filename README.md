# whatsHappening
The What's Happening Full Stack Website which uses PHP , JavaScript, HTML, CSS &amp; MYSQL Languages to complete this project
# Full-Stack Secure Login System

This project is a full-stack web application developed using **PHP, HTML, CSS, and JavaScript**. It serves as a lightweight Content Management System (CMS) for community events, allowing users to manage and view upcoming events securely.

## Main Features

- **Secure User Registration and Login:**
  - Users can create accounts with strong passwords that adhere to strict security rules, including length, character types, and special characters.
  - Passwords are securely stored in the database as hashed values.

- **Password Validation:**
  - Passwords are validated using regular expressions during account creation, ensuring they meet all criteria with appropriate error messages for any deficiencies.

- **Future Events Display:**
  - Dynamically shows only future events on the homepage, events page, and single-post pages based on the current date and time.

- **Prepared Statements for Database Security:**
  - All SQL queries use prepared statements to prevent SQL injection attacks.

- **Responsive Pages:**
  - The site features a landing page, about page, community groups page, events page, and login page, all adapting the Bootstrap theme for a cohesive look and feel.

## Purpose of Assignments Over the Term

Throughout the term, we will build a lightweight Content Management System (CMS) called **What's Happening**. This online site allows community members to upload their events and contact information, enabling users to view upcoming events and potentially contact event organizers to purchase tickets or contribute.

By the end of the course, the site will feature:
- Responsive pages with a landing page
- Collections of events organized by themes and dates
- The ability for community groups to upload events
- A search functionality for users to find events
- Administrative duties such as uploading event information, removing events after their dates, and ensuring site security

### Users of the Site
- **Community Groups:** Can add events.
- **General Users:** Can view events.
- **Administrators:** Ensure the site is secure and up to date.

## Assignment Description

For the first assignment, you will familiarize yourself with the code and structure/look and feel of the Bootstrap theme by adapting it to meet the requirements outlined in this assignment. We will create templates for the following pages:
1. **Homepage (landing page)** - `index.php`
2. **About page** - `about.php`
3. **Community groups page** - `groups.php`
4. **Events by themes and dates** - `events.php`
5. **Login page** - `login.php`
6. **Add Events page** - `addEvents.php` (not implemented in A1)
7. **Search functionality** (to be implemented later)

Note: For Assignment 1, you will create the first 5 templates without navigation and additional functionality.

## Installation Steps

To run this project locally, you will need to set up either MAMP or XAMPP.

1. **Download and Install MAMP or XAMPP:**
   - [MAMP](https://www.mamp.info/en/downloads/)
   - [XAMPP](https://www.apachefriends.org/index.html)

2. **Set Up the Project:**
   - Clone this repository or download the ZIP file.
   - Place all project files in the `htdocs` directory of your MAMP or XAMPP installation.
     - For MAMP: `/Applications/MAMP/htdocs/`
     - For XAMPP: `C:\xampp\htdocs\`

3. **Database Setup:**
   - Open phpMyAdmin (`http://localhost/phpmyadmin`).
   - Create a new database for the project and import the SQL dump file to set up the necessary tables. Ensure the `Login` table has a `VARCHAR(255)` field for storing hashed passwords.

4. **Configuration:**
   - Update the database connection settings in the configuration file (e.g., `config.php`) with your database credentials.

5. **Start the Server:**
   - Start MAMP or XAMPP and ensure the Apache and MySQL services are running.

6. **Access the Application:**
   - Open your web browser and navigate to `http://localhost/your_project_directory/` to access the application.


## Acknowledgements

- [PHP](https://www.php.net/) for server-side scripting.
- [MySQL](https://www.mysql.com/) for database management.
- [MAMP](https://www.mamp.info/en/) and [XAMPP](https://www.apachefriends.org/index.html) for local development environments.
- All images used in this project are stock images available from Microsoft PowerPoint.
