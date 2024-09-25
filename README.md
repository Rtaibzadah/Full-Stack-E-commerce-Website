

# Ecommerce Website for Books

## Project Overview
This project is an ecommerce website that allows users to browse, filter, and purchase books, and provides administrators with tools to manage products and user accounts. The project was built as part of a computing course to demonstrate a full-stack web application using technologies like **PHP**, **HTML**, **CSS**, **JavaScript**, and **MySQL** for the backend.

## Features
- **User Functionality**:
  - Browse books by author or search by keywords.
  - Register, log in, and manage their accounts.
  - Add books to a shopping basket, adjust quantities, and remove items.
  - View a summary and complete purchases at checkout.
  
- **Admin Functionality**:
  - Create, update, delete, and display users and products.
  - Full control over book inventory and user management.
  - Secure login and session management for administrators.

## Technologies Used
- **PHP**: Used for server-side logic to handle user authentication, database connections, and form processing.
- **MySQL**: A relational database to store user information, product data, and shopping cart sessions.
- **HTML/CSS/JavaScript**: Front-end technologies used for building the user interface.
- **phpMyAdmin**: A GUI tool to manage MySQL databases.
- **MAMP**: A local server environment for PHP development.

## Why I Chose PHP
PHP was chosen for this project due to its widespread use in web development and its ability to easily integrate with MySQL databases. Compared to newer frameworks like **Node.js** or **Django**, PHP offers:
- **Simplicity**: PHP is straightforward for building small to medium web projects, making it easier for quick development and iteration.
- **Mature Ecosystem**: PHP has extensive support, documentation, and a large number of libraries that streamline tasks like authentication and session management.
- **Speed**: In a traditional setup, PHP's tight coupling with MySQL allows for fast query execution and data retrieval.
- **Wide Hosting Availability**: Most web hosting services support PHP by default, which reduces deployment complexity.

### Approach Comparison
- **PHP vs Node.js**: While Node.js offers a non-blocking, event-driven architecture that can be more efficient for real-time applications, PHP's synchronous processing is more than sufficient for an ecommerce site, where most operations are user-based and require processing database-driven forms and queries. The simplicity of PHP for this task outweighs the need for more complex frameworks.
- **PHP vs Django**: While Django (Python) offers a "batteries-included" approach, PHP's learning curve is lower for this project, and PHP's native database handling is more straightforward for creating custom eCommerce logic.

## Project Structure

```
├── /admin/
│   ├── adminpanel.php - Admin dashboard to manage users and products.
│   ├── add_user.php - Add new users to the system.
│   ├── edit_user.php - Edit user details.
│   └── ...
├── /products/
│   ├── display_products.php - Display all products to users.
│   ├── add_to_cart.php - Add selected products to the user's shopping cart.
│   └── ...
├── /users/
│   ├── login.php - User login page.
│   ├── register.php - New user registration form.
│   └── ...
├── /css/ - Contains stylesheets for the site.
├── /js/ - JavaScript functionality.
├── index.php - Home page.
├── connect.php - Database connection file.
└── ...
```

## Design Process
1. **Research**: I researched existing book eCommerce platforms such as Waterstones and World of Books to identify useful features.
2. **Screen Designs**: Developed wireframes for core pages like product display, shopping cart, and checkout.
3. **Flowcharts**: Created logical flowcharts for core features like user registration, login, and checkout.
4. **Entity Relationship Diagram (ERD)**: Designed an ERD to structure the database, ensuring efficient data retrieval and management.
   
## User Interface
The website features a minimalistic, user-friendly design targeted at users of all ages. Special focus is given to ease of navigation for users unfamiliar with online shopping. A filtering feature allows users to sort books by authors, enhancing the browsing experience.

## Future Enhancements
Although the current version of the project meets the basic requirements for an ecommerce website, there are several planned enhancements:
- **User Reviews**: Add the ability for users to leave reviews on books.
- **Wishlist**: Allow users to save items for future purchases.
- **Responsive Design**: Improve mobile responsiveness for better cross-device usability.

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/yourusername/ecommerce-website.git
    ```

2. **Set up a local server environment**:
    I used MAMP for local development, but XAMPP or similar alternatives work fine.

3. **Database setup**:
    Import the `ecom.sql` file into your MySQL database via phpMyAdmin or the command line:
    ```bash
    mysql -u username -p ecom < ecom.sql
    ```

4. **Configure database connection**:
    Modify the `connect.php` file to include your database credentials:
    ```php
    $con = mysqli_connect('localhost', 'root', 'password', 'ecom');
    ```

5. **Start the server**:
    Using MAMP, start the Apache and MySQL services, then open your browser and navigate to:
    ```http://localhost/index.php```

## Testing
The project includes various test cases to ensure the functionality of core features such as:
- User creation, login, and logout
- Product display and filtering
- Shopping cart functionality

## License
There is no license :)

---
