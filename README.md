# BriQsLab Website

A PHP website for BriQsLab, a technology training academy. It includes pages for the academy, courses, contact enquiries, and student enrollment.

## Requirements

- PHP 8.0 or later
- PostgreSQL for saving contact messages and enrollment requests
- PHP PDO PostgreSQL driver (`pdo_pgsql`)

There are no Composer or npm dependencies required for the current site.

## Run locally on Windows

Open Command Prompt or the VS Code terminal and change to the project directory:

```bat
cd /d C:\Users\HomePC\projects\majorlar\briqslab
```

Start PHP's built-in development server:

```bat
php -S localhost:8000
```

Open [http://localhost:8000](http://localhost:8000) in your browser. Keep the terminal open while using the site; press `Ctrl+C` to stop the server.

If `php` is not recognized, install PHP or use XAMPP. With XAMPP, place the project folder inside `C:\xampp\htdocs` and start Apache, then visit `http://localhost/briqslab/`.

## Database setup

The home, about, and courses pages can be viewed without the database. The contact and enrollment pages connect to PostgreSQL through `includes/db.php` and need the database configured before they can be used.

1. Create a PostgreSQL database named `briqslab`.
2. Run [`schema.sql`](schema.sql) against that database to create the `contact_messages` and `enrollments` tables. For example, using `psql`:

   ```bat
   psql -U postgres -d briqslab -f schema.sql
   ```

3. Update the host, port, database name, username, and password in `includes/db.php` to match your PostgreSQL setup. The checked-in password value is a placeholder; replace it with your local database password. Do not commit real credentials.
4. Ensure PHP's `pdo_pgsql` extension is enabled. If PHP reports that it cannot find the `pgsql` PDO driver, enable `pdo_pgsql` in the PHP configuration (`php.ini`) and restart the server.

## Project structure

```text
.
├── index.php          # Home page
├── about.php          # About BriQsLab
├── courses.php        # Course listings
├── contact.php        # Contact form
├── enroll.php         # Enrollment form
├── style.css          # Site styles
├── schema.sql         # PostgreSQL table definitions
└── includes/
    ├── db.php         # PostgreSQL connection
    ├── header.php     # Shared page header and navigation
    └── footer.php     # Shared footer
```

## Notes

- Use PHP's built-in server for local development only; it is not intended for production hosting.
- Contact and enrollment form submissions are stored in PostgreSQL. Keep database credentials private and use production-grade configuration when deploying.
