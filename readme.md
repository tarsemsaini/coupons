## LaravelPackage for coupons

#### This Package is Under Development

This Package is used to add coupon functionality in Laravel , This will provide you a form to create coupons and List coupons and Edit coupons

#### Download the Package 

Step 1 composer require ashriya/coupon
####

Step 2 Need to add our new service provider in our root config/app.php inside the providers array
####

Ashriya\Coupon\CouponServiceProvider::class

####

Step 3  Run the migration php artisan migrate
####



To create a Add Coupon link   item in menu use  {{route('coupon.index')}}
#### 
To Create a List Coupon link  item in menu use  {{route('coupon.create')}}

####




### License

The Package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
