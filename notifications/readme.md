# Laravel Notifications with Custom Channels

### How to Use

- Utilize the user model located at `/app/Models/User.php`, which extends `/app/Models/Base/BaseAuthModel.php` in your project.

- Copy the user and notifications migration files into your project, located at `/database/migrations`.

- Copy the `Notifications` folder from `/app/Notifications` into the `app` folder of your project.

### Usage Explanation

- The `/app/Notifications/NotificationCore` class is an abstract class that your notifications should extend. You can configure settings here.

- The `/app/Notifications/Channels` folder contains notification channels that you need. For example: `DatabaseChannel`, `SmsChannel`, or others.

- The `/app/Notifications/User` folder contains user notification classes. In these classes, there is a variable called `$channels` that you can configure to determine which notification channels your notification should use. For example, `/app/Notifications/User/TestNotification.php` uses `DatabaseChannel` (all notifications use `DatabaseChannel`, which is configured in `/app/Notifications/NotificationCore.php`), and `TelegramChannel`.

### How to Add a Notification Channel

- Add the required columns that you need to update for successful notification sending and error handling in the notification migration file located at `/database/migrations/`.

- Add a new channel in the `/app/Notifications/` folder, for example, `TelegramChannel.php`.

- Then, add the channel to your notification channels variable, like so: `$channels = [TelegramChannel::class]`.
