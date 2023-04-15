# PHARMACY MANAGMENT SYSTEM
<p align="center" style="margin-top:6%;margin-bottom:6%;">
  <img  src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExYzZhYjRjN2M3ZGIyOWIwM2VlOTFjNmIwMWU1NGVlOWE4NjAyMzU2MiZjdD1n/1hMk9kzfH3rPrmzVkp/giphy.gif" />
</p>

## INTRODUCTION
The Pharmacy Managment System is a Laravel web Application that used Most of Laravel Technologies for Pharmacies and Medical prescription purposes. 
The pharmacy Managment System Consists of Four Main Roles Like `admin`, `pharmacy`, `doctor` and `client`.</br>
The `admin` has a Full Access to the whole Parts of the system. The `pharmacy owner` has access on his Doctors and Orders. The `doctor` has access the orders. 
The `client` is the end user who can make any Order.</br>

## FEATURES
- Authuntication
- Email Verification
- Roles and Perimissions
- Auto Assign Order to the Closest Pharmacy Area
- Ban and UnBan Doctor
- Email Notification
- Stripe Payment

## INSTALLATION
<pre>
- git clone 
- Composer install
- npm install
- cp .env-example .env
- php artisan migrate
- php artisan db:seed
- php artisan storage:link
- php artisan serve
</pre>
 
## CLIENT APIs
<div align="center" style="width:100%">
    
|  METHODS      |         URI              | ACTIONS | 
| :---:         |         :---:            | :---: |   
| POST          | `/api/register`          | `Register` |
| POST          | `/api/login`             | `Login`  | 
| GET           | `/api/client/{id}`       | `Get Client By ID` | 
| PUT           | `/api/client/{id}`       | `Update Client` | 
| POST          | `/api/address`           | `Add New Address` | 
| GET           | `/api/address`           | `Get All Addresses` | 
| GET           | `/api/address/{id}`      | `Get Address By ID` | 
| PUT           | `/api/address/{id}`      | `Update Address` | 
| DELETE        | `/api/address/{id}`      | `Delete Address` | 
| POST          | `/api/orders`            | `Create New Order` | 
| GET           | `/api/orders/{id}`       | `Get Order By ID` | 
| PUT           | `/api/orders/{id}`       | `Update Order` |     
</div>    
   

## TECHNOLOGIES
- Laravel Framework
- MYSQL
- JavaSript
- Bootstrap
- HTML
- CSS


## AUTHORS
  - [Sara Hossam](https://github.com/Sarahussam77)
  - [Mariam Saad](https://github.com/MariamSMoustafa)
  - [Mariam Bakry](https://github.com/MariamBakry)
  - [Esraa Elsayed](https://github.com/Esraamohamed0)
  - [Ahmed Abdelrahem](https://github.com/ahmedabdelrahim123)

<div align="center">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
    <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white"/>
    <img src="https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=Postman&logoColor=white"/>
    <img src="https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E"/>
    <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white"/>
    <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white"/>
</div>
  


