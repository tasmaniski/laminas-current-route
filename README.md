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
// get names of current route info
$this->currentRoute()->getController();
$this->currentRoute()->getAction();
$this->currentRoute()->getModule();
$this->currentRoute()->getRoute();

// or simply check with current info
$this->currentRoute()->matchController('index');
$this->currentRoute()->matchAction('index');
$this->currentRoute()->matchModule('application');
$this->currentRoute()->matchRoute('home');
```

### Real world example
```
<?php $css_class = $this->currentRoute()->matchModule('admin') ? 'selected' : ''; ?>
<a href="/admin" class="<?php echo $css_class;?>">
    Admin link
</a>
```


