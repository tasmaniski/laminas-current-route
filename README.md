![Licence](https://img.shields.io/github/license/tasmaniski/laminas-current-route) 
![PHP version](https://img.shields.io/packagist/php-v/tasmaniski/laminas-current-route)
![StarsCount](https://img.shields.io/github/stars/tasmaniski/laminas-current-route)
![Downloads](https://img.shields.io/packagist/dt/tasmaniski/laminas-current-route)

```json
IMPORTANT NOTE: 
If you find this package useful, 
please click on a star button and let me know, 
so I will gladly continue with the updates.
```

# Laminas MVC - Current Route Helper
View Helper for reading **Controller, Module, Action and Route name** in any view(.phtml) file including layout.phtml

# Install

Add in you **composer.json** file:

```json
{
    "require": {
        "tasmaniski/laminas-current-route": "^3.0"
    }
}
```
After running: *composer update* 

You need to register new module. Add in file **config/application.config.php**: 

```
'modules' => array(
    '...',
    'CurrentRoute'
),
```

# Use
Use this view helper in your view files(.html) including layout.phtml
```
// get current route info
$this->currentRoute()->getController();               // return current controller name
$this->currentRoute()->getAction();                   // return current action name
$this->currentRoute()->getModule();                   // return current module name
$this->currentRoute()->getRoute();                    // return current route name

// or simply check with current info
$this->currentRoute()->matchController('index');      // match "index" with current controller name
$this->currentRoute()->matchAction('index');          // match "index" with current action name
$this->currentRoute()->matchModule('application');    // match "application" with current module name
$this->currentRoute()->matchRoute('home');            // match "home" with current route name
```

### Real world example
```
<?php $css_class = $this->currentRoute()->matchModule('admin') ? 'selected' : ''; ?>
<a href="/admin" class="<?php echo $css_class;?>">
    Admin link
</a>
```


