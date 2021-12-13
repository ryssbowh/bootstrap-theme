# Bootstrap Theme for Craft 3.5

This theme requires [Craft Theme](https://plugins.craftcms.com/themes) in Pro edition.

It is based on Boostrap 5 (5.1.3).

## Regions

![Regions](images/regions.png)

## displayers

**New displayers :**  
- [Carousel](https://getbootstrap.com/docs/5.0/components/carousel/), for Assets fields.  
- [Accordion](https://getbootstrap.com/docs/5.0/components/accordion/) for Categories, Entries, Assets, Matrix and Users fields.  
- [Card](https://getbootstrap.com/docs/5.0/components/card/) for Categories, Entries, Assets, Matrix and Users fields.  

The field displayers EntryLink, AssetLink, UrlLink and the file displayer Link now have [buttons](https://getbootstrap.com/docs/5.0/components/buttons/) options :  
- Display as button
- Color
- Size
- Outlined

The TagLabel displayer now have [badge](https://getbootstrap.com/docs/5.0/components/badge/) options :  
- Display as badge
- Background color
- Pill (rounded)

## Bootstrap components

Several templates are available to include or extend from in the [components folder](src/templates/front/_components) :
- [alert](https://getbootstrap.com/docs/5.0/components/alerts/)
- [badge](https://getbootstrap.com/docs/5.0/components/badge/)
- [button](https://getbootstrap.com/docs/5.0/components/buttons/)
- [modal](https://getbootstrap.com/docs/5.0/components/modal/)
- [nav](https://getbootstrap.com/docs/5.0/components/navs-tabs/)
- nav-item
- [offcanvas](https://getbootstrap.com/docs/5.0/components/offcanvas/)
- [pagination](https://getbootstrap.com/docs/5.0/components/pagination/)
- pagination-item
- [progressbar](https://getbootstrap.com/docs/5.0/components/progress/)
- [spinner](https://getbootstrap.com/docs/5.0/components/spinners/)
- [toast](https://getbootstrap.com/docs/5.0/components/toasts/)

[Tooltips](https://getbootstrap.com/docs/5.0/components/tooltips/) and [Popovers](https://getbootstrap.com/docs/5.0/components/popovers/) can be achieved with the [button component](src/templates/front/_components/button.twig). They will be automatically initiated on page load.

Example :
```
{% include "_components/progressbar" with {
    min: 0,
    max: 20,
    current: 5
} only %}
```

## Custom settings
Custom css :root variables can be registered to be editable in the settings :

```
use Ryssbowh\BootstrapTheme\models\Settings;
use Ryssbowh\BootstrapTheme\events\SettingsEvent;

Event::on(Settings::class, Settings::EVENT_SETTINGS, function (SettingsEvent $event) {
    //name, type, section, value, fieldOptions
    $event->addRoot('my-color-rgb', 'color', 'Custom colors', '#ffffff', [
        'label' => 'My color',
        'instructions' => 'this is another color',
    ]);
});
```

Colors will be saved as hex format in the settings, if the name of your color (`my-color-rgb`) finishes by `rgb`, `hsv` or `hsl` it will be converted when written into actual css. Note that the function won't be added so you will need to call it in your css :
```
.my-div {
    color: rgb(--var(my-color-rgb));
}
```
You can also register new fonts to select from in the settings :
```
use Ryssbowh\BootstrapTheme\models\Settings;
use Ryssbowh\BootstrapTheme\events\SettingsEvent;

Event::on(Settings::class, Settings::EVENT_SETTINGS, function (SettingsEvent $event) {
    $event->addFont(['Roboto', 'Ubuntu'], 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
});
```

## Assets

The `VendorAssets` bundle will include bootstrap and [Font awesome 5](https://fontawesome.com/v5.0/icons)  
The `FrontAssets` bundle will include some basic css/js  
The `HighlightAssets` will include [Highlight 11.3.1](https://highlightjs.org/)  
The `RootsAssets` will include the custom css roots

In a theme that extends this theme, you may wish to recompile your js/css to include your own bootstrap colors/variables or other libraries, you would need to disable the asset bundle inheritance and add your own bundles.  
If doing so, don't forget to register the `RootsAssets` bundle, to make sure configurable root css are included on the page.