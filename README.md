
# Delicacy Food - Healthy Food Restaurant Management System

Aims to provide information systems for some kinda features and user's roles of any small business that focus on food sales and support SDGs by encouraging certain small business in around indonesia to have a decent work and economic growth


## Requirements

- PHP 8.0 or higher
- Database (e.g., MySQL)
- Web Server (e.g., Apache, Nginx, IIS)


## Installation

* Install [Composer](https://getcomposer.org/download) and [Npm](https://nodejs.org/en/download)
* Clone the repository: `git clone https://github.com/DelicacyFood/delicacyfood_mysql.git`
* Install dependencies: `composer install ; npm install ; npm run dev`
* Run `cp .env.example .env` for create .env file
* Run `php artisan migrate --seed` for migration database
* Run `php artisan storage:link` for create folder storage
* Detail login, Username : `admin` Password `123456`
* Run `php artisan queue:listen` for run queue
    

## Features

### 1. Customer
- Login/logout and register
- See all of the food menus
- Order the menus
- Confirm the order
- Top up saldo
- Purchase the products
- Download CSV invoice files
- Check all of the own sales
- Edit user's profile
- Update password
- Make a chat with WhatsApp bot

### 2. Waiter
- Login/logout and register 
- Confirm users's payment
- Confirm users's top up
- Check all of sales and orders from the all users
- See the details orders of any users
- Update password

### 3. Manager
- Login/logout and register 
- Check all of sales and orders from the all users
- See the details orders of any users
- Download sales record as an CSV files format
- Update password
- Analyze order records in certain times

### 4. Driver
- Login/logout and register 
- Confirm to deliver any 'payment completed' sales
- Update password
  
## Menus
- Avocado Salad
- Fettucini
- Fusilli
- Linguine
- Drained Grain
- Protein Grain
- Oat
- Cocktail
- Mint Squash
- Milked Iced Coffee
- Bread Soup 
- Carrot Soup
- Curry Soup
- Barbeque Salad
- Home Salad
- Salad Bowl
- Fish Salad
- Spinach Salad
- Ice Cream
- Yoghurt
- Smoothies
- Fruit Salad

## Flow Application
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/data-flow.png" />

## Relational Data Model 
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/relational-data-model.png" />

## Demo

Here's the quick demo of the app :
https://youtu.be/yUGmpEjEkdk


## License

[MIT](https://choosealicense.com/licenses/mit/)


## Cart Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/cart-page.png" />

## Dashboard Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/dashboard-page.png" />

## Driver Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/driver-page.png" />

## Home Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/home-page.png" />

## Invoice Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/invoice-page.png" />

## Restaurant Sales Record Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/manager-1.png" />

## Analyze Order Records Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/manager-2.png" />

## Menu Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/menu-page.png" />

## User Profile Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/profile-page.png" />

## Top up Page
<img src="https://github.com/DelicacyFood/delicacyfood_mysql/tree/master/public/image-readme/top-up-page.png" />