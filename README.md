BSU Engineering — PHP + Bootstrap (Bilingual) Scaffold (v3)
---------------------------------------------------------
Contents:
- public/                       -> web root (index.php, students, courses, admin)
- sql/university.sql            -> SQL file to create DB & seed data
- README.md                     -> this file

Features:
- Bilingual UI (Arabic / English) using ?lang=ar or ?lang=en and a toggle in navbar.
- Students & Courses CRUD (Add/Edit/Delete) pages.
- DB connection via PDO (templates/db.php) with prepared statements.
- Responsive layout using Bootstrap CDN + RTL support for Arabic.
- Simple admin login (admin/admin123) for protected actions (create/edit/delete).

How to run locally:
1. Create a webroot and put the 'public' folder there, or use Docker / PHP built-in server.
   Example using PHP built-in server (for testing):
     cd public
     php -S 0.0.0.0:8080
   Then open http://localhost:8080/?lang=ar or http://localhost:8080/?lang=en

2. Create a MySQL database and import sql/university.sql:
   - Database name: university_db (or edit templates/db.php)
   - Import file: sql/university.sql

3. Edit templates/db.php if your DB credentials differ.

Admin credentials:
- username: admin
- password: admin123

Notes:
- This scaffold is for demonstration and learning. For production, add CSRF protection, stronger auth, input validation, file upload sanitation, rate limiting, and HTTPS.
