<?php
   function ValidateEmail($email)
   {
      $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
      return preg_match($pattern, $email);
   }

   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $mailto = 'infosondemar@gmail.com';
      $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
      $subject = 'Consulta';
      $message = 'Values submitted from web site form:';
      $success_url = './exito.html';
      $error_url = './fail_lulz.html';
      $error = '';
      $eol = "\n";
      $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
      $boundary = md5(uniqid(time()));

      $header  = 'From: '.$mailfrom.$eol;
      $header .= 'Reply-To: '.$mailfrom.$eol;
      $header .= 'MIME-Version: 1.0'.$eol;
      $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
      $header .= 'X-Mailer: PHP v'.phpversion().$eol;
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address is invalid!\n<br>";
      }

      if (!empty($error))
      {
         $errorcode = file_get_contents($error_url);
         $replace = "##error##";
         $errorcode = str_replace($replace, $error, $errorcode);
         echo $errorcode;
         exit;
      }

      $internalfields = array ("submit", "reset", "send", "captcha_code");
      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (!is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
         }
      }

      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
          foreach ($_FILES as $key => $value)
          {
             if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      if ($mailto != '')
      {
         mail($mailto, $subject, $body, $header);
      }
      header('Location: '.$success_url);
      exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Page</title>
<meta name="generator" content="WYSIWYG Web Builder 9 - http://www.wysiwygwebbuilder.com">
<style type="text/css">
div#container
{
   width: 800px;
   position: relative;
   margin-top: 0px;
   margin-left: auto;
   margin-right: auto;
   text-align: left;
}
body
{
   background-color: #F1F1F1;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
   margin: 0;
   text-align: center;
}
</style>
<style type="text/css">
a
{
   color: #0000FF;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
</style>
<style type="text/css">
#Shape7
{
   width: 896px;
   height: 578px;
   background-color: #FFFFFF;
   border: 1px #E1E1E1 solid;
}
#Shape4
{
   width: 899px;
   height: 45px;
   background-color: #424242;
   border: 0px #E1E1E1 solid;
}
#wb_Text11 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text11 div
{
   text-align: left;
}
#Shape3
{
   width: 898px;
   height: 80px;
   background-color: #4C4C4C;
   border: 0px #E1E1E1 solid;
}
#wb_Text8 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: right;
}
#wb_Text8 div
{
   text-align: right;
}
#wb_Text9 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text9 div
{
   text-align: left;
}
#wb_Text10 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text10 div
{
   text-align: left;
}
#wb_Form1
{
   background-color: #FAFAFA;
   border: 0px #000000 solid;
}
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text1 div
{
   text-align: left;
}
#Editbox1
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text2 div
{
   text-align: left;
}
#Editbox2
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text3 div
{
   text-align: left;
}
#Editbox3
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text4 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text4 div
{
   text-align: left;
}
#Editbox4
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text5 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text5 div
{
   text-align: left;
}
#Editbox5
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text6 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text6 div
{
   text-align: left;
}
#Editbox6
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   vertical-align: middle;
}
#wb_Text7 
{
   background-color: transparent;
   border: 0px #000000 solid;
   padding: 0;
   text-align: left;
}
#wb_Text7 div
{
   text-align: left;
}
#TextArea1
{
   border: 1px #A9A9A9 solid;
   background-color: #FFFFFF;
   color :#000000;
   font-family: Arial;
   font-size: 13px;
   text-align: left;
   resize: none;
}
#Button1
{
   border: 1px #A9A9A9 solid;
   background-color: #F0F0F0;
   color: #000000;
   font-family: Arial;
   font-size: 13px;
}
#Image1
{
   border: 0px #000000 solid;
}
#Shape10
{
   width: 900px;
   height: 50px;
   background-color: #4C4C4C;
   border: 0px #A0A0A0 solid;
}
#Shape1
{
   width: 900px;
   height: 50px;
   background-color: #4C4C4C;
   border: 0px #A0A0A0 solid;
}
#wb_CssMenu2
{
   border: 0px #DCDCDC solid;
   background-color: transparent;
}
#wb_CssMenu2 ul
{
   list-style-type: none;
   margin: 0;
   padding: 0;
   position: relative;
   display: inline-block;
}
#wb_CssMenu2 li
{
   float: left;
   margin: 0;
   padding: 0px 0px 0px 0px;
}
#wb_CssMenu2 a
{
   display: block;
   float: left;
   color: #FFFFFF;
   border: 0px #000000 solid;
   background-color: #4C4C4C;
   background-image: none;
   font-family: Arial;
   font-size: 15px;
   font-weight: normal;
   font-style: normal;
   text-decoration: none;
   height: 50px;
   line-height: 50px;
   padding: 0px 14px 0px 14px;
   vertical-align: middle;
   text-align: center;
}
#wb_CssMenu2 li:hover a, #wb_CssMenu2 a:hover, #wb_CssMenu2 .active
{
   color: #FFFFFF;
   background-color: #169FE6;
   background-image: none;
   border: 0px #000000 solid;
}
#wb_CssMenu2 li.firstmain
{
   padding-left: 0px;
}
#wb_CssMenu2 li.lastmain
{
   padding-right: 0px;
}
#wb_CssMenu2 li:hover, #wb_CssMenu2 li a:hover
{
   position: relative;
}
#wb_CssMenu2 a.withsubmenu
{
   padding: 0 5px 0 5px;
   background-image: none;
}
#wb_CssMenu2 li:hover a.withsubmenu, #wb_CssMenu2 a.withsubmenu:hover
{
   background-image: none;
}
#wb_CssMenu2 ul ul
{
   position: absolute;
   left: -9999px;
   top: -9999px;
   width: 100px;
   height: auto;
   border: none;
   background-color: transparent;
}
#wb_CssMenu2 ul :hover ul
{
   left: 0px;
   top: 50px;
   padding-top: 0px;
}
#wb_CssMenu2 .firstmain:hover ul
{
   left: 0px;
}
#wb_CssMenu2 li li
{
   width: 100px;
   padding: 0px 0px 0px 0px;
   border: 0px #C0C0C0 solid;
   border-width: 0 0px;
}
#wb_CssMenu2 li li.firstitem
{
   border-top: 0px #C0C0C0 solid;
}
#wb_CssMenu2 li li.lastitem
{
   border-bottom: 0px #C0C0C0 solid;
}
#wb_CssMenu2 ul ul a, #wb_CssMenu2 ul :hover ul a
{
   float: none;
   margin: 0;
   width: 86px;
   height: auto;
   white-space: normal;
   padding: 7px 6px 6px 6px;
   background-color: #EEEEEE;
   background-image: none;
   border: 1px #C0C0C0 solid;
   color: #666666;
   font-family: Arial;
   font-size: 13px;
   font-weight: normal;
   font-style: normal;
   line-height: 13px;
   text-align: left;
   text-decoration: none;
}
#wb_CssMenu2 ul :hover ul .firstitem a
{
   margin-top: 0px;
}
#wb_CssMenu2 ul ul :hover a, #wb_CssMenu2 ul ul a:hover, #wb_CssMenu2 ul ul :hover ul :hover a, #wb_CssMenu2 ul ul :hover ul a:hover
{
   background-color: #C0C0C0;
   background-image: none;
   border: 1px #C0C0C0 solid;
   color: #666666;
}
#wb_CssMenu2 br
{
   clear: both;
   font-size: 1px;
   height: 0;
   line-height: 0px;
}
</style>
</head>
<body>
<div id="container">
<div id="wb_Shape7" style="position:absolute;left:0px;top:236px;width:898px;height:580px;z-index:15;">
<a href="sondemar@redpower.com.ar"><div id="Shape7"></div></a></div>
<div id="wb_Shape4" style="position:absolute;left:0px;top:910px;width:899px;height:45px;z-index:16;">
<div id="Shape4"></div></div>
<div id="wb_Text11" style="position:absolute;left:55px;top:924px;width:537px;height:16px;z-index:17;text-align:left;">
<span style="color:#FFFFFF;font-family:'Trebuchet MS';font-size:11px;">Cabañas Son de Mar</span></div>
<div id="wb_Shape3" style="position:absolute;left:0px;top:825px;width:898px;height:80px;z-index:18;">
<div id="Shape3"></div></div>
<div id="wb_Text8" style="position:absolute;left:644px;top:924px;width:198px;height:16px;text-align:right;z-index:19;">
<span style="color:#FFFFFF;font-family:Arial;font-size:13px;">Tel: 236154597613</span></div>
<div id="wb_Text9" style="position:absolute;left:1px;top:680px;width:362px;height:34px;z-index:20;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:15px;">Email: infosondemar@gmail.com<br>Consultas telefónicas: 236154597613</span></div>
<div id="wb_Text10" style="position:absolute;left:8px;top:257px;width:357px;height:18px;z-index:21;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:16px;">Formulario de contacto:</span></div>
<div id="wb_Form1" style="position:absolute;left:12px;top:278px;width:415px;height:405px;z-index:22;">
<form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="Form1">
<div id="wb_Text1" style="position:absolute;left:10px;top:15px;width:141px;height:16px;z-index:0;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Nombre y apellido:</span></div>
<input type="text" id="Editbox1" style="position:absolute;left:161px;top:15px;width:198px;height:23px;line-height:23px;z-index:1;" name="Nombre" value="">
<div id="wb_Text2" style="position:absolute;left:10px;top:45px;width:141px;height:16px;z-index:2;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">E-mail:</span></div>
<input type="text" id="Editbox2" style="position:absolute;left:161px;top:45px;width:198px;height:23px;line-height:23px;z-index:3;" name="E-mail" value="">
<div id="wb_Text3" style="position:absolute;left:10px;top:75px;width:141px;height:16px;z-index:4;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Teléfono:</span></div>
<input type="text" id="Editbox3" style="position:absolute;left:161px;top:75px;width:198px;height:23px;line-height:23px;z-index:5;" name="Téfono" value="">
<div id="wb_Text4" style="position:absolute;left:10px;top:105px;width:141px;height:16px;z-index:6;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Localidad:</span></div>
<input type="text" id="Editbox4" style="position:absolute;left:161px;top:105px;width:198px;height:23px;line-height:23px;z-index:7;" name="Localidad" value="">
<div id="wb_Text5" style="position:absolute;left:10px;top:135px;width:141px;height:16px;z-index:8;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Check-In DD/MM/AA:</span></div>
<input type="text" id="Editbox5" style="position:absolute;left:161px;top:135px;width:198px;height:23px;line-height:23px;z-index:9;" name="Check-In" value="">
<div id="wb_Text6" style="position:absolute;left:10px;top:165px;width:141px;height:16px;z-index:10;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Check-Out DD/MM/AA:</span></div>
<input type="text" id="Editbox6" style="position:absolute;left:161px;top:165px;width:198px;height:23px;line-height:23px;z-index:11;" name="Check-Out" value="">
<div id="wb_Text7" style="position:absolute;left:10px;top:195px;width:141px;height:16px;z-index:12;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Mensaje:</span></div>
<textarea name="Mensaje" id="TextArea1" style="position:absolute;left:161px;top:195px;width:198px;height:98px;z-index:13;" rows="5" cols="27"></textarea>
<input type="submit" id="Button1" name="" value="Submit" style="position:absolute;left:161px;top:300px;width:96px;height:25px;z-index:14;">
</form>
</div>
<div id="wb_Image1" style="position:absolute;left:0px;top:0px;width:900px;height:200px;z-index:23;">
<img src="images/Logo.png" id="Image1" alt="" style="width:900px;height:200px;"></div>
<div id="wb_Shape10" style="position:absolute;left:0px;top:199px;width:900px;height:50px;z-index:24;">
<div id="Shape10"></div></div>
<div id="wb_Shape1" style="position:absolute;left:0px;top:200px;width:900px;height:50px;z-index:25;">
<div id="Shape1"></div></div>
<div id="wb_CssMenu2" style="position:absolute;left:0px;top:200px;width:900px;height:50px;text-align:center;z-index:26;">
<ul>
<li class="firstmain"><a href="./index.html" target="_self">Home</a>
</li>
<li><a href="./Galeria.html" target="_self">Galer&#237;a&nbsp;de&nbsp;fotos</a>
</li>
<li><a class="withsubmenu" href="./Pesca.html" target="_self">&#191;Qu&#233;&nbsp;hacer&nbsp;en&nbsp;Playas&nbsp;Doradas?</a>

<ul>
<li class="firstitem"><a href="./Pesca.html" target="_self">Pesca</a>
</li>
<li><a href="./Buceo.html" target="_self">Buceo</a>
</li>
</ul>
</li>
<li><a href="./La_playa.html" target="_self">La&nbsp;Playa</a>
</li>
<li><a href="./Como_llegar.html" target="_self">C&#243;mo&nbsp;llegar</a>
</li>
<li><a class="active" href="./Contacto.php" target="_self">Contacto</a>
</li>
</ul>
<br>
</div>
</div>
</body>
</html>
