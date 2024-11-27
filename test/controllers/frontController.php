<?php

class FrontController {
    public function page()
    {
        $title = 'Frontpage';
        include './views/layout/front.view.php';
    }
}
