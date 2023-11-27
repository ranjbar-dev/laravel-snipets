# Laravel Custom HttpLogs 

### How to Use

- Utilize the http log model located at `/app/Models/HttpLog.php`, which extends `/app/Models/Base/BaseModel.php` in your project.

- Copy the http log migration file into your project, located at `/database/migrations`.

- Copy the `app/Http/Middleware/HttpLogMiddleware.php` middleware into middlewares folder of your project and register in `kernel`.

- Utilize the store http log job model located at `"app/Jobs/System/StoreHttpLogJob.php"`, which extends `/aapp/Jobs/JobCore.php` in your project.


### Usage Explanation

- Run `php artisan migrate` to migrate http log table 

- Set `HttpLogMiddleware` on any route you want to store logs ( you can add it `Kernel.php -> protected $middleware = []` to catch all routes )

- In the `HttpLogMiddleware` you can add routes you want to exclude from logging, with adding the route to $except variable 
