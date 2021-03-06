<?php
if ( ! defined('e107_INIT')) { exit(); }

define("VIEWPORT","width=device-width, initial-scale=1.0");

e107::lan('theme');
e107::js('core','bootstrap/js/bootstrap.min.js');
e107::css('core','bootstrap/css/bootstrap.min.css');
e107::css('core','bootstrap/css/bootstrap-responsive.min.css');
e107::css('core','bootstrap/css/jquery-ui.custom.css');

//$register_sc[]='FS_ADMIN_ALT_NAV';
$no_core_css = TRUE;

define("STANDARDS_MODE",TRUE);

// TODO - JS/CSS handling via JSManager
function theme_head() {

	$theme_pref = e107::getThemePref();

	$ret = '';
	$ret .= '
		<link rel="stylesheet" href="'.THEME_ABS.'menu/menu.css" type="text/css" media="all" />
		<!--[if IE]>
		<link rel="stylesheet" href="'.THEME_ABS.'ie_all.css" type="text/css" media="all" />
		<![endif]-->
		<!--[if lte IE 7]>
			<script type="text/javascript" src="'.THEME_ABS.'menu/menu.js"></script>
		<![endif]-->
	';



    if(THEME_LAYOUT == "alternate") // as matched by $HEADER['alternate'];
	{
        $ret .= "<!-- Include Something --> ";
	}

	if($theme_pref['_blank_example'] == 3)  // Pref from admin -> thememanager.
	{
        $ret .= "<!-- Include Something Else --> ";
	}


	return $ret;
}

function tablestyle($caption, $text, $mod) 
{
	global $style;
	
	$type = $style;
	if(empty($caption))
	{
		$type = 'box';
	}
	
	switch($type) 
	{
		//FIXME Use Bootstrap css. ie. span4 etc. 
		case 'menu' :
			echo '
				<div class="block">
					<h4 class="caption">'.$caption.'</h4>
					'.$text.'
				</div>
			';
		break;
		
		case 'box':
			echo '
				<div class="block">
					<div class="block-text">
						'.$text.'
					</div>
				</div>
			';
		break;
	
		default:
			echo '
				<div class="block">
					<h1 class="caption">'.$caption.'</h1>
					<div class="block-text">
						'.$text.'
					</div>
				</div>
			';
		break;
	}
}

$HEADER['default'] = '
<div class="container-fluid">
	<div class="row-fluid">
		<div class="navbar navbar-inverse navbar-fixed-top site-header">
			<div class="navbar-inner">
				<div class="span9">
					<div class="site-logo pull-left thumbnails"><a class="logolink" href="'.SITEURL.' title="">{LOGO}</a></div><div class="dropdown nav navbar-text pull-left">{SITELINKS}</div>
				</div>
				<div class="span3">
					<div class="pull-right">'.$c_login.'</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
		{SETSTYLE=site_info}
		
		{MENU=2}
		
		</div>
		<div class="span10">
';
$FOOTER['default'] = '
		</div><!--/span-->
	</div><!--/row-->

<hr>

<footer class="center"> 
	Copyright &copy; 2008-2012 e107 Inc (e107.org)<br />
</footer>

</div><!--/.fluid-container-->';

// HERO http://twitter.github.com/bootstrap/examples/hero.html
//FIXME insert shortcodes while maintaing classes. 

$HEADER['hero'] = '

	 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form pull-right">
              <input class="span2" type="text" placeholder="Email">
              <input class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">';
	  
	  /*
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>
     */
     
     
//FIXME insert shortcodes while maintaing classes. 
$FOOTER['hero'] = '
 </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->';


// Marketing Narrow - http://twitter.github.com/bootstrap/examples/marketing-narrow.html
//FIXME insert shortcodes while maintaing classes. 

$HEADER['marketing-narrow'] = '
 <div class="container-narrow">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="muted">Project name</h3>
      </div>

      <hr>

      <div class="jumbotron">
        <h1>Super awesome marketing speak!</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <a class="btn btn-large btn-success" href="#">Sign up today</a>   
';


//FIXME insert shortcodes while maintaing classes. 

$FOOTER['marketing-narrow'] = '
</div>

      <hr>

      <div class="row-fluid marketing">
        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>

      <hr>

      <div class="footer">
        <p>&copy; Company 2012</p>
      </div>

    </div> <!-- /container -->
    
';







/*

	$CUSTOMHEADER, CUSTOMFOOTER and $CUSTOMPAGES are deprecated.
	Default custom-pages can be assigned in theme.xml

 */



?>