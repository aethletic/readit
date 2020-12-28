<?php

$app->router()->get('/darkmode', function () use ($app) {
    if ($_SESSION['theme'] == 'light') {
        $_SESSION['theme'] = 'dark';
    } else {
        $_SESSION['theme'] = 'light';
    }
});

$app->router()->get('/{route}', function ($route) use ($app) {
    $theme = $app->get('theme');

    $list = $app->get('list', []);
    $current = $route ? recursiveArraySearch('/' . $route, $list) : reset($list);

    $markdown = '# 404 Not Found';
    $file = DOCS_DIR . '/' . ltrim($current['file'], '/');
    if (file_exists($file)) {
        $filemtime = 'Last modified: ' . date('d.m.Y H:i', filemtime($file)) . ' (UTC ' . date('P') . ')';
        $markdown = file_get_contents($file);
    }
    $content = $app->parse()->text($markdown);
    

    $page = $app->get('config.page', []);

    $app->render('pages/index.html', [
        'list' => $list,
        'content' => $content,
        'navbar' => $page['navbar'],
        'current' => $current,
        'theme' => $theme,
        'darkmode' => $_SESSION['theme'] == 'dark',
        'darkmode_enbaled' => $page['theme']['darkmode'],
        'filemtime' => $filemtime,
    ]);
});

function recursiveArraySearch($needle, $haystack)
{
    foreach ($haystack as $key => $value) {
        if (is_array($value) && in_array($needle, $value)) {
            return $value;
        } elseif (is_array($value)) {
            $result = recursiveArraySearch($needle, $value);
            if ($result !== false) {
                return $result;
            }
        }
    }

    return false;
}
