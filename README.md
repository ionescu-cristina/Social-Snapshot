# SocialSnapshot Project

## Description
SocialStream is an advanced platform that enables users to view and filter social media posts.
Built with Laravel and Vue.js, this application offers a user-friendly interface for exploring content from social networks like Facebook and Twitter.

![Screenshot of SocialStream](public/images/screenshot-social-snapshot.png)

## Technologies Used
- Laravel
- Vue.js
- Tailwind CSS

## Installation and Setup
To install and set up the project, follow these steps:

- git clone https://github.com/ionescu-cristina/Social-Snapshot.git
- cd Social-Snapshot


## Database Configuration
- After renaming .env.example to .env, open the .env file and update the database settings to match your created database (in this case, socialsnapshot).
- The standard settings for a MySQL database would look like this:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=socialsnapshot
DB_USERNAME=root
DB_PASSWORD=

- Adjust DB_USERNAME and DB_PASSWORD according to your database configuration.

## Run in cmd
- composer install
- npm install
- npm run dev

## Running Migrations

php artisan migrate

## Generating Application Key

php artisan key:generate

## Usage
To run the application, use:

php artisan serve

Access the application in your browser at the given address, usually `http://127.0.0.1:8000/`.

## Key Features
- View social media posts in a unified interface.
- Advanced filtering of posts based on name, date range, social network, and text content.
- Support for Facebook and Twitter, with easy extensibility to other social networks.

## Contributions
To contribute to the project, please follow these steps:
1. Fork the project
2. Create a new branch (`git checkout -b feature/NewFeature`)
3. Commit your changes (`git commit -m 'Added a new feature'`)
4. Push to the branch (`git push origin feature/NewFeature`)
5. Open a Pull Request

## Testing
Run unit and integration tests with:

php artisan test


## License
This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Contact and Support
For questions and support, contact me at webdesign@itdeveloper.ro.
