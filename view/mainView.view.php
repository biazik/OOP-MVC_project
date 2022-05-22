<?php
class MainView{
  private $view;
  public function __construct($viewType){
    $this->view = $viewType;
  }

  public function ShowMain(){
    switch ($this->view) {
      case 'NotLoggedView':
        include 'templates/login.tmplt.php';
        break;
      case 'AdminView':
        include 'templates/main.tmplt.php';
        break;
      case 'UserView':
        include 'templates/main.tmplt.php';
        break;
      case 'BlockedView':
        include 'templates/blocked.tmplt.php';
        break;

      default:
        ErrorView::CriticError();
        break;
    }
  }
  public function ShowContent(){
    switch ($this->view) {
      case 'AdminView':
        include 'templates/contents/admin_content.tmplt.php';
        break;
      case 'UserView':
        include 'templates/contents/user_content.tmplt.php';
        break;

      default:
        ErrorView::CriticError();
        break;
    }
  }
  public function ShowMenu(){
    switch ($this->view) {
      case 'AdminView':
        include 'templates/menus/admin_menu.tmplt.php';
        break;
      case 'UserView':
        include 'templates/menus/user_menu.tmplt.php';
        break;

      default:
        ErrorView::CriticError();
        break;
    }
  }
  public static function ShowPanel($panel){
    $file = "templates/panels/";
    $ext = ".tmplt.php";
    $fullPath = $file . $panel . $ext;
    if (!file_exists($fullPath)) {
      $_SESSION['ShowPanelName']=$panel;
      include 'templates/panels/errorPanel.tmplt.php';
    }else {
      include "$fullPath";
    }
  }

  public static function AjaxRequirePanel($panel){
    $file = "../templates/panels/";
    $ext = ".tmplt.php";
    $fullPath = $file . $panel . $ext;
    if (!file_exists($fullPath)) {
      $_SESSION['ShowPanelName']=$panel;
      include '../templates/panels/errorPanel.tmplt.php';
    }else {
      include "$fullPath";
    }
  }

  public function ShowFooter(){
    include 'templates/footer.tmplt.php';
  }

  public function RequestedContent($content){
    $file = "templates/pages/";
    $ext = ".tmplt.php";
    $fullPath = $file . $content . $ext;
    if (!file_exists($fullPath)) {
      $_SESSION['ShowPanelName']=$content;
      include 'templates/panels/errorPanel.tmplt.php';
    }else {
      include "$fullPath";
    }
}

  function __destruct() {
  }
}
