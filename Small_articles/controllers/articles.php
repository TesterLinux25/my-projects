<?php
class Articles extends Controller{
    protected function Index(){
        $viewmodel= new ArticlesModel();
        $this->returnView($viewmodel->Index(), true);
    }
}

?>