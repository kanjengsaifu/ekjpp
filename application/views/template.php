<?php
$info_login  = "";
$_ci =& get_instance();
$controller_not_login = array("home", "berita", "kontak", "login");
if (!$_ci->auth->is_login())
{
   if (!in_array($this->controller, $controller_not_login))
      redirect(base_url()."/");
}
else
{
   $user          = $_ci->auth->get_data_login();
   $info_login  = " | ".$user["nama"]." | ".$user["nama_group"];
}

$_data=array("title"=>$title);
$_template  = $_ci->template->generate_template("user", $_data);

$_template['_user']      = $_ci->auth->get_data_login();

echo $_template["_head"];
?>

<div class="content-wrapper">
<?php

echo isset($content) ? $content : NULL;

?>
</div>
<?php
echo $_template["_footer"];
echo isset($_scripts) ? $_scripts : NULL;
echo $_template["_foot"];
?>