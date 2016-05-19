<?php

namespace App\Controllers;

use Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        $posts = Post::getAll();
        View::renderTemplate('Posts/index.html', [
                'posts' => $posts
            ]);
    }

    public function addNewAction()
    {
        echo "Im from Posts addNew()";
    }

    public function editAction()
    {
        echo "From Posts edit()";
        echo "<p>Route Params<pre>".
             htmlspecialchars(print_r($this->route_params, true))."</pre></p>";
    }
}
