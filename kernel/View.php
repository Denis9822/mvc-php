<?php

namespace Core;

class View
{
    public string $content = '';
    public function render($view, $data = [], $layout = 'default'): string
    {
        extract($data);
        $view_file = VIEW . "/{$view}.php";

        if (file_exists($view_file)) {
            ob_start();
            require $view_file;
            $this->content = ob_get_clean();
        } else {
            abort("View {$view_file} not found",500);
        }

        if ($layout === false) {
            return $this->content;
        }

        $layout_file = VIEW . "/layouts/{$layout}.php";

        if (file_exists($layout_file)) {
            require_once $layout_file;
        } else {
            abort("View layout {$layout_file} not found", 500);
        }

        return '';
    }
}
