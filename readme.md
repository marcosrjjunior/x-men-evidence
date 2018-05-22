### X-men evidence

#### Setup
First, run the install commands to fetch the dependencies
```
composer install
npm install
```

Database connection
```
cp .env.example .env
```
> Fill the DB informations on .env DB_*.

Then, run the migration and following commands to start the project
```
php artisan key:generate
php artisan migrate && php artisan db:seed
composer dump
```

Admin User /admin
```
wolverine@xmen.com
wolverine
```
> When a submission is approved the new user can access the admin using email and a temporary password `abc123`

<a href="https://github.com/marcosrjjunior/x-men-evidence"><img src="https://raw.githubusercontent.com/marcosrjjunior/x-men-evidence/master/x-men-home.png" alt="x-men evidence"></a>

<a href="https://github.com/marcosrjjunior/x-men-evidence"><img src="https://raw.githubusercontent.com/marcosrjjunior/x-men-evidence/master/x-men-submission.png" alt="x-men evidence"></a>

<a href="https://github.com/marcosrjjunior/x-men-evidence"><img src="https://raw.githubusercontent.com/marcosrjjunior/x-men-evidence/master/x-men-admin.png" alt="x-men evidence"></a>
