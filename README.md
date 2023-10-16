# Task Management Application

Web-based task management application developed using Laravel, Livewire, and Tailwind CSS. The application allows users to create, read, update and delete task


## Features

- **User Authentication:** Laravel Breeze Authentication Package.
- **Task Creation:** Users can create tasks with details such as title, description, and status.
- **Task List:** View and manage tasks

## Getting Started

Follow these instructions to set up and run the application on your local machine.

### Prerequisites

Before you begin, make sure you have the following installed:

- [PHP](https://www.php.net/) (>=8.1)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/l4christ/vivify-test.git
   ```

2. Navigate to the project directory:

   ```bash
   cd vivify-test
   ```

3. Install PHP dependencies using Composer:

   ```bash
   composer install
   ```

4. Install JavaScript dependencies using NPM:

   ```bash
   npm install
   ```

5. Create a `.env` file by copying `.env.example` and update it with your database configuration:

   ```bash
   cp .env.example .env
   ```

6. Generate a new application key:

   ```bash
   php artisan key:generate
   ```

7. Migrate the database:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

9. Asset Compilation:

   ```bash
   npm run dev
   ```

10. To run PHPUnit tests:

   ```bash
   php artisan test
   ```

11. Visit `http://127.0.0.1:8000` in your web browser to access the application.

## Usage

- Register for a new user account or log in if you already have one.
- Create tasks
- View, Edit, and Delete your tasks in the task list.



