# Read It!

Simple way for deployment documentation pages.

### Features

* Markdown pages ([Github](https://github.com) flavored)
* Easy customization
* Darkmode
* Themes

### Installation

The installation is very hard and not every Jedi can handle it.

First, let's copy the repository:

```bash
git clone https://github.com/aethletic/readit.git as readit
```

Let's go to the folder we just downloaded:

```bash
cd readit
```

Install the required packages using [Composer](https://getcomposer.org/):

```bash
composer install
```

Now let's go to the public folder of the project:

```bash
cd public
```

And let's start the test server:

```bash
php -S localhost:1337
```

You can now open our test site [`localhost:1337`](http://localhost:1337) in a browser and see this page 🥳

Uff, it was really hard!

... 

What? Nothing works..? Um... Then you better take the alternatives.

### Dark theme
![Dark](https://github.com/aethletic/readit/blob/master/.github/readit-dark.png)

### Light theme
![Light](https://github.com/aethletic/readit/blob/master/.github/readit-light.png)

### Quick start

Place your markdown files in `/resources/docs` folder.

For example, there is one file called `getting-started.md`.

Now, let's edit the file `/config/docs.php`, specify the desired text, route and the file itself.

```php
return [
    [
        'text' => 'Getting started',
        'file' => 'getting-started.md',
        'link' => '/',
    ],
];
```
##### Values
* **`text`** - this is what we see in the sidebar.
* **`file`** - this is the file from which the content for the page will be taken.
* **`link`** - this is a route or external link.

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

### Themes

All themes files placed in `/resources/themes/`

This an example of `atom-one-dark.json` theme:

```json
{
    "name": "atom-one-dark",
    "code_highlight_theme": "atom-one-dark",
    "see_available_code_themes_here": "https://highlightjs.org/static/demo/",
    "elements": {
        "primary": "#E06C75",
        "secondary": "#282c34",
        "text": "#898f99",
        "menu_item": "#898f99",
        "menu_btn_text": "#ABB2BF",
        "menu_btn_bg": "#1E2127",
        "link": "#61afef",
        "qoute": "#898f99",
        "clipboard": "#fff",
        "heading": "#ABB2BF",
        "heading_hover": "#ABB2BF",
        "background": "#23272e",
        "border": "rgba(0, 0, 0, .225)",
        "navbar": "rgb(35, 39, 46, 0.4)"
    },
    "colors": {
        "black": "#1E2127",
        "deep_black": "#1E2127",
        "white": "#ABB2BF",
        "deep_white": "#ABB2BF",
        "gray": "#5C6370",
        "deep_gray": "#5C6370",
        "dark_gray": "#282c34",
        "deep_dark_gray": "#282c34",
        "red": "#E06C75",
        "deep_red": "#E06C75",
        "yellow": "#D19A66",
        "deep_yellow": "#D19A66",
        "green": "#98C379",
        "deep_green": "#98C379",
        "cyan": "#56B6C2",
        "deep_cyan": "#56B6C2",
        "blue": "#61afef",
        "deep_blue": "#61afef",
        "purple": "#c678dd",
        "deep_purple": "#c678dd"
    }
}
```
