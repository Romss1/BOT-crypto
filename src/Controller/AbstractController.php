<?php


namespace App\Controller;


abstract class AbstractController
{
    public function render(string $view, array $params = []) {
        extract($params);
        $content = '../Templates/' . $view;
        include "../Templates/base.html.php";
    }
}