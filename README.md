# Blue & Beige Online Application Portal

A 3-page responsive registration website built with HTML, CSS, JavaScript, jQuery, PHP and MySQL.

## Pages
1. `index.php` – landing page
2. `register.php` – application form with browser-side validation (JavaScript + jQuery)
3. `about.php` – explains the registration process
4. `submit.php` – PHP backend that validates, inserts into MySQL, and displays a formatted result/print view

## Requirements
- XAMPP (Apache + MySQL) or another PHP/MySQL environment
- PHP 8+ with PDO MySQL enabled
- Internet connection for Google Fonts and the jQuery CDN (the form still has native HTML validation if jQuery is unavailable)

## Run using XAMPP
1. Extract the `blue_beige_registration` folder into `C:\\xampp\\htdocs\\`.
2. Start **Apache** and **MySQL** in the XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin`.
4. Select **Import**, choose `database.sql` from this folder, and click **Import/Go**. This creates the `blue_beige_portal` database and `applications` table.
5. Open `config.php`. The default XAMPP MySQL settings are host `localhost`, username `root`, and an empty password. Change them if your MySQL setup uses a password.
6. Visit `http://localhost/blue_beige_registration/`.

## Test the backend
- Open Apply, complete all required fields, and submit.
- A successful submission inserts a row into `applications` and displays an application ID and formatted summary.
- In phpMyAdmin, open `blue_beige_portal` → `applications` → **Browse** to verify the stored record.
- Use **Print summary** to print or save the confirmation as PDF.

## Technologies used
- HTML5: page structure and form controls
- CSS3: responsive blue and beige design
- JavaScript + jQuery: client-side form validation
- PHP + PDO: server-side validation and prepared SQL insert
- MySQL: persistent application storage

## Notes
This is a learning/demo registration portal. For production use, add CSRF protection, rate limiting, stronger privacy controls, HTTPS, and an admin authentication system. Do not expose database credentials publicly.
