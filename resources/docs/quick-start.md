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
