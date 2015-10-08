# ZF2 Current Route Helper
View Helper for reading **Controller, Module, Action and Route name** in any view(.phtml) file including layout.phtml

# Install

Add in you **composer.json** file:

```json
{
    "require": {
        "tasmaniski/zf2-current-route": "1.0.*"
    }
}
```
After running: *sudo composer update* 

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


