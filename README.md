# LMSdb - Library Management System Database

LMSdb is a database structure developed for managing a Library Management System. It focuses on organizing, managing, and tracking resources such as books, users, borrowing history, and other critical library functions. This project aims to create a scalable and efficient database to support library operations effectively.

## Features

- **Book Management**: Handles information about books, including titles, authors, genres, publication details, and availability status.
- **User Management**: Stores user details (library members and staff), including personal information, registration status, and user roles (admin, librarian, member).
- **Borrowing and Returning**: Tracks borrowing activities, return due dates, and fine calculations for late returns.
- **Categories and Tags**: Organizes books by categories and allows tagging for easier discovery and classification.
- **Reservations**: Allows users to reserve books that are currently checked out by other members.
- **Fines and Penalties**: Automatically tracks late return penalties and keeps records of fine payments.
- **Reports and Logs**: Generates reports on user activity, popular books, and borrowing trends.

## Database Design

The database is designed using PostgreSQL, ensuring proper normalization and referential integrity. It features relationships between tables like `Books`, `Users`, `Borrowings`, and `Categories` to optimize library workflows and maintain accuracy in data management.

## Technologies Used

- **PostgreSQL**: The relational database used to manage library data.
- **PDO (PHP Data Objects)**: Used for efficient and secure database interactions.

## How to Use

1. Clone the repository:

```bash
git clone https://github.com/4l0ne4ever/LMSdb.git
```

2. Set up a PostgreSQL database and update the connection details in your project’s environment configuration.
3. Run the database migrations to create the required tables.
4. Populate the database with sample data for testing and development.

## Contribution

Contributions are welcome! Feel free to submit pull requests or issues to suggest improvements, additional features, or bug fixes. Your feedback helps make LMSdb better for everyone!


## Issues (DM me if you know how to fix this):
In the detailsbook.blade.php file, my css style is gone, I even try to use the same as the other files but still doesn't work.


### Support me: 
More product to reach in: https://buymeacoffee.com/christopherxzyx
