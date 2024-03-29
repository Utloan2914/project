<?php
require_once("models/UsersModel.php");
require_once("models/CategoryModel.php");

class CategoryController extends Controller{
    public function getView()
    {
        session_start();
        if (!isset($_SESSION['userLogin'])) {
            $this->redirect("/admin/login");
        } else if ($_SESSION["userRole"] == "ADMIN" || $_SESSION["userRole"] == "MANAGER") {
            $this->processData();
            $this->processEventOnView();
            $this->renderView("admin/CategoryPage");
        } else {
            include("views/NotFoundPage.php");
        }
    }

    public function processEventOnView(){
        if (isset($_POST["addCategory"])) {
            $this->addCategoryEvent();
        }

        if (isset($_POST["deleteCategory"])) {
           $this->deleteCategoryEvent();
        }

        if (isset($_POST["updateCategory"])) {
           $this->editCategoryEvent();
        }

        if (isset($_GET["search"])) {
            $this->searchCategoryEvent($_GET["search"]);
         }
    }

    public function processData(){
        $userModel = new UsersModel();
        $categoryModel = new CategoryModel();
        $this->setData("title", "Category");
        $this->setData("avatar", $userModel->getAvatarFromId($_SESSION["userLogin"]));
        $this->setData("categories", $categoryModel -> readAll());
        
    }

    public function addCategoryEvent() {
        $categoryModel = new CategoryModel();
        if ($categoryModel -> isExistName($_POST["name"])){
            $this->setData("errorMessage", "Category name already exist.");
        } else if ($_POST["name"] == "" || $_POST["name"] == " ") {
            $this->setData("errorMessage", "Category name is blank.");
        }
        else {
            $categoryModel->create(["name" => $_POST["name"]]);
            $this->setData("successMessage", "Add successfully!");

        }
        
    }

    public function editCategoryEvent() {
        $categoryModel = new CategoryModel();
        $category = $categoryModel->readOne($_POST["id"]);
        echo print_r($category);
        $categoryName = $category["name"];
        if ($_POST["name"] == "" || $_POST["name"] == " ") {
            $this->setData("errorMessage", "Category name is blank.");
        } else if ($_POST["name"] != $categoryName && $categoryModel->isExistName($_POST["name"])) {
            $this->setData("errorMessage", "Category name already exist.");
        } else {
            $categoryModel->update(["name" => $_POST["name"]], $_POST["id"]);
            $this->setData("successMessage", "Update successfully!");
        }        
    }

    public function deleteCategoryEvent() {
        $categoryModel = new CategoryModel();
        $categoryModel->delete($_POST["id"]);
        $this->setData("successMessage", "Delete successfully!");
    }

    public function searchCategoryEvent($key) {
        $categoryModel = new CategoryModel();
        $this->setData("categories", $categoryModel -> searchBy($key));
    }
}
