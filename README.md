# StudentMove - Bus Route Management System

A comprehensive bus route management system built with Laravel and Bootstrap, designed for students to manage their daily commute.

## 🚀 Features

- **User Authentication** - Sign up, sign in, password reset
- **Dashboard** - Personalized user dashboard
- **Route Management** - Bus route suggestions and tracking
- **Profile Management** - Complete user profile with image upload
- **Subscription Plans** - Monthly, 6-month, and yearly plans
- **Notifications** - Real-time bus notifications
- **Contact System** - User feedback and support
- **Offers** - Special promotions and discounts

## 🛠️ Technology Stack

- **Backend:** PHP 8.1+, Laravel 10
- **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5
- **Database:** MySQL
- **Icons:** Bootstrap Icons
- **Animations:** Animate.css

## 📦 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL
- XAMPP (recommended for Windows)

### Step 1: Clone Repository
```bash
git clone https://github.com/YOUR_USERNAME/StudentMove.git
cd StudentMove
```

### Step 2: Install Dependencies
```bash
composer install
```

### Step 3: Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Step 4: Database Configuration
Update `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=studentmove_db
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5: Run Migrations
```bash
php artisan migrate
```

### Step 6: Create Storage Link
```bash
php artisan storage:link
```

### Step 7: Start Development Server
```bash
php artisan serve
```

Visit: http://127.0.0.1:8000

## 🎯 Usage

### For Students:
1. **Register** - Create account with university details
2. **Login** - Access your dashboard
3. **Profile** - Complete your profile information
4. **Routes** - Get personalized route suggestions
5. **Subscribe** - Choose subscription plan
6. **Track** - Monitor bus arrivals and delays

### For Administrators:
- User management
- Route management
- Subscription management
- Analytics dashboard

## 📱 Pages

- **Home** - Landing page with features
- **Dashboard** - User dashboard with quick actions
- **Sign In/Up** - Authentication pages
- **Profile** - User profile management
- **Subscription** - Plan selection and payment
- **Notifications** - Bus alerts and updates
- **Contact** - Support and feedback
- **Offers** - Promotions and discounts
- **Route Suggestion** - Personalized routes

## 🔧 Configuration

### Email Configuration (Optional)
For production, update `.env` with real email settings:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

### File Uploads
Profile images are stored in `storage/app/public/profile_images/`

## 🚀 Deployment

### Using XAMPP:
1. Copy project to `htdocs` folder
2. Start Apache and MySQL
3. Create database `studentmove_db`
4. Run migrations: `php artisan migrate`
5. Access via: `http://localhost/StudentMove/public`

### Using Laravel Forge/Heroku:
1. Follow Laravel deployment guides
2. Set environment variables
3. Run migrations on production

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

## 📞 Support

For support, email support@studentmove.com or create an issue on GitHub.

## 🎉 Acknowledgments

- Laravel Framework
- Bootstrap Team
- Bootstrap Icons
- Animate.css
- All contributors

---

**Made with ❤️ for Students**