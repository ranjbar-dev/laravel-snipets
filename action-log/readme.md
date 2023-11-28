# Laravel Action Log Users

### How to Use

- Copy the `Events` folder into your project.

- Copy the `Listeners` folder into your project.

- Add the `shouldDiscoverEvents` function to your `/app/Providers/EventServiceProvider.php` file. This function should return `true` to automatically register all listeners in your project.

### Usage Explanation

- `app/Events/EventCore.php` contains the base implementation of an Event in Laravel.

- `/app/Events/User/UserEventCore.php` provides the Laravel base event. All user events should extend this. The `getUser` function in `/app/Listeners/User/UserListenerCore.php` utilizes this.

- `/app/Listeners/ListenerCore.php`: All necessary logging functions are implemented here. Additional logging functions can be added as needed.

- `/app/Listeners/User/UserListenerCore.php`: This overrides `ListenerCore`. All User listeners extend from this, customizing the actor, target, logging channels, etc.

- For an event example, see `/app/Events/User/Auth/LoginAttemptEvent.php`. This event is triggered every time a user attempts to log in.

- For a listener example, see `/app/Listeners/User/LoginAttemptListener.php`. This listener captures the `LoginAttemptEvent` event and stores the required logs.

### Example

- For a practical implementation, refer to `/app/Http/Controllers/AuthController.php`.
