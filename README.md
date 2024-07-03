# SUSial Media

SUSial Media is an app to show and post a bunch of "sus" pictures. You can explore various suspicious posts and share your own.

## How to Run This App

Follow these steps to set up and run the application:

1. **Clone the Repository**:
```sh
   git clone https://github.com/AdluAghnia/SUSmed.git
   cd SUSmed
```
    Set Up Environment Variables:```

2. **Set Up Enviroment Variables**
```
sh cp .env.example .env
```

3. **Install PHP Dependencies:**
```sh
composer install
```

4. **Run Database Migrations:**
```sh
php artisan migrate
```

5. **Create Storage Symlink:**

```sh
php artisan storage:link
```

6. **Generate Application Key:**

```sh
php artisan key:generate
```

7. **Install Node.js Dependencies:**
```sh
npm install
```

8. **Build Frontend Assets:**

```sh
npm run build
```
Additional Information

Development Server: To start the development server, use the command:
```sh
php artisan serve
```
Running Vite in Development Mode: To start the Vite development server, use the command:
```sh
npm run dev
```
Accessing the Application: Once the development server is running, you can access the application in your browser at http://localhost:8000.

Contributing

Feel free to open issues or submit pull requests. For major changes, please open an issue first to discuss what you would like to change.
License

This project is licensed under the GPL-2.0 License.
