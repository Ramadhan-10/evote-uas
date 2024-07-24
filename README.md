# Voting System

This is a web-based voting system built using Laravel. The application allows users to vote for candidates (Paslons) in various categories (Kategoris). It ensures that a user can vote only once per category and displays the voting results.

## Features

- User authentication (login/register)
- Vote for candidates in different categories
- View voting results with a pie chart
- Prevent multiple votes in the same category
- Responsive design using Tailwind CSS and Flowbite

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/voting-system.git
    cd voting-system
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. Set up the environment file:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure your `.env` file with your database and other necessary settings.

5. Run migrations the database:
    ```bash
    php artisan migrate 
    ```
6. Run migrations the database:
    ```bash
    php artisan db:seed --class=CreateUsersSeeder
    php artisan db:seed --class=KategoriPaslonSeeder 
    ```

7. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

1. Login:
    ```bash
    for admin:
    email: admin@gmail.com
    password: 123456
    for admin 2:
    email: admin2@gmail.com
    password: <PASSWORD>123456
    for user:
    email: user@gmail.com
    password: 123456
    ```

2. Register a new user or log in with an existing user.
3. Navigate to the voting page to vote for candidates in different categories.
4. After voting, you can view the voting results, which include a table and a pie chart for each category.

## Folder Structure

- `app/Models`: Contains the Eloquent models for User, Vote, Paslon, and Kategori.
- `app/Http/Controllers`: Contains the controllers for handling voting logic.
- `resources/views`: Contains the Blade templates for rendering the UI.
- `routes/web.php`: Defines the web routes for the application.
- `database/migrations`: Contains the database migration files.

## Code Overview

### Models

- **User**: Represents the users of the application.
- **Vote**: Represents the votes cast by users.
- **Paslon**: Represents the candidates in the voting system.
- **Kategori**: Represents the categories of the candidates.

### Controllers

- **VoteController**: Handles voting logic and displays voting results.
- **PaslonController**: Manages the candidates.
- **KategoriController**: Manages the categories.

### Views

- **voter/vote.blade.php**: Displays the voting page where users can vote for candidates.
- **voter/results.blade.php**: Displays the voting results with tables and pie charts.
- **voter/history.blade.php**: Displays the voting history for each user.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -am 'Add new feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Create a new Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

## Acknowledgments

- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Flowbite](https://flowbite.com/)
- [Chart.js](https://www.chartjs.org/)

