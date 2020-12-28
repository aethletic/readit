### Customization

The theme and links settings are in the file `/config/page.php`.

```php
return [
    'theme' => [
        'darkmode' => true,
        'default' => 'dark',
        'dark' => 'atom-one-dark',
        'light' => 'atom-one-light',
    ],
    'navbar' => [
        [
            'type' => 'link',
            'text' => 'Github',
            'color' => 'blue',
            'link' => '#',
        ],
        [
            'type' => 'link',
            'text' => '⭐ Become a sponsor',
            'color' => 'purple',
            'link' => '#',
        ],
    ],
];
```

##### Theme values
* **`theme.darkmode`** - set `false` for disable button. 
* **`theme.default`** - default theme for if site open first time. 
* **`theme.dark`** - dark theme. 
* **`theme.light`** - light theme. 
* **`theme.light`** - light theme. 

##### Navbar
* **`type`** - type of element.
* **`text`** - visible text.
* **`color`** - color of element.
* **`link`** - just link.

