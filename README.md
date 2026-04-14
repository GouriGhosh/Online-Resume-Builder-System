# Online-Resume-Builder-System
Online Resume Builder System
A full-stack Online Resume Builder Web Application built using PHP, MySQL, HTML, CSS, and JavaScript.
This system allows users to create, manage, and download professional resumes with multiple templates.
Features

•	 User Authentication (Register / Login / Logout)
•	 Forgot Password with OTP (Email-based verification)
•	 Create Resume with detailed sections:
o	Personal Information
o	Career Objective
o	Technical Skills (with ratings)
o	Soft Skills
o	Work Experience
o	Education
•	 Multiple Resume Templates (5 Unique Designs)
•	 Live Template Preview (Slider)
•	 Print / Save Resume as PDF
•	 Copy Resume Feature
•	 Edit Resume
•	 Delete Resume
•	 Profile Image Upload
Technologies Used
•	Frontend: HTML, CSS, Bootstrap, JavaScript
•	Backend: PHP (Core PHP)
•	Database: MySQL
•	Mail Service: PHPMailer (SMTP - Gmail)
Installation Guide (Local Setup - XAMPP)
1Download Project
•	Download ZIP or clone repository
•	Extract into:
C:/xampp/htdocs/resume-builder-project
2 Start XAMPP
•	Start Apache
•	Start MySQL
3 Setup Database
1.	Open phpMyAdmin
2.	Run the SQL file:
resume_builder.sql
4Configure Database Connection
Open:
config/db.php
Update 
$conn = mysqli_connect("localhost", "root", "", "resume_builder");
5 Configure Email (OTP System)
Open:
config/mail.php
Update:
$mail->Username = 'yourgmail@gmail.com';
$mail->Password = 'your_app_password';
Important:
•	Enable 2-Step Verification in Gmail
•	Generate App Password
•	Use that password here
6 Disable Dev Mode
Open:
config/app.php
Change:
define('DEV_MODE', false);
7 Run Project
Open browser:
http://localhost/resume-builder-project/

 Screenshots (Optional)
 Future Improvements
•	Add Drag & Drop Resume Sections
•	Add More Templates
•	Add Admin Panel
Author
Gouri Ghosh
License
This project is for educational purposes.

.
