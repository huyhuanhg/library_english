<?php


class HomeController extends Base
{
    private $categoriesModel;
    private $vocabularyModel;

    public function __construct()
    {
        $this->categoriesModel = $this->loadModel('CategoryModel');
    }

    public function index()
    {
        $categories = $this->categoriesModel->getAll();
        $this->view('master.index',
        [
           'categories' => $categories,
        ]);
    }
}