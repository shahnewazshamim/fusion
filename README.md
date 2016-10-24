# Fusion
Fusion is an simple and powerful MVC framework.

### Current Version
1.0.0 (on dev)

### Installation
Download the stable version from [here](https://github.com/shahnewazshamim/fusion/archive/master.zip). Then unzip and upload to your server root directory.
 
* For live server - go to `www.yourdomain.com`
* For lcal machine - go to `localhost/Fusion` or `localhost/your_project_name`

## Documentation
How to write your own controller, model, view? Please read the instruction below -

* `WelcomeController` is your default route.
* Change it to your, go to `sys/config` directory and open `routes.php` file.
* Find the `'default_controller' => 'welcome'` line and change to yours `'default_controller' => 'your_controller_name',`

### Controller
* Go to `app/controllers` directory and make a class file with **Controller** suffix. Ex - `AdminController.php`
* File name and Class name must have the same name [Case sensetive]
* Call a view by `$this->load->view('dashboard');` if file under a folder just do `$this->load->view('admin/dashboard');`
* Also you can pass data, just add an `array()` parameter `$this->load->view('dashboard', array('name' => 'Fusion Framework'));`

### Model
* Go to `app/models` directory and make a class file with **Model** suffix. Ex - `UserModel.php`
* File name and Class name must have the same name [Case sensetive]
* Call a model in your controller - `$user = $this->load->model('UserModel');`
* Access a method of your model by `$user->get_all_users();`

### View
* Go to `app/views` directory and make a php file. Ex - `app/views/dashboard.php`
* Also you can make folder to separate your views. Ex - `app/views/admin/dashboard.php`

### Information
This is under develop. Just on the stage of starting.