<?php

// Start collecting the output html
ob_start();

if (isset($_GET['demo'])){
	include 'demo.php';
} elseif (isset($_GET['demos'])) {
	include 'demos.php';
}

// Output is collected
$content = ob_get_clean();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>MooTools Demos<?php if (!empty($descriptor['name'])): echo ' - ' . $descriptor['name']; endif; ?></title>
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
<?php if (isset($demo)): ?>
	<link href="assets/css/demos.css" rel="stylesheet" type="text/css" />
<?php

endif;
if (isset($demo) && !empty($css)): ?>
	<style>
	<?php echo $css; ?>
	</style>
<?php endif; ?>
</head>

<body>

	<div id="header">
		<div>
			<h1>MooTools</h1>
		</div>
	</div>

	<div id="wrapper">

		<div id="content">
			<div id="leftcolumn">
				<ul>
					<li><h4><a href="?">Demos</a></h4></li>
					<li><a href="?demo=Chaining">Chaining</a></li>
					<li><a href="?demo=Native">Native</a></li>
					<li><a href="?demo=Periodical">Periodical</a></li>
					<li><h4>Element</h4></li>
					<li><a href="?demo=Element.Pin">Element.Pin</a></li>
					<li><h4>Slick</h4></li>
					<li><a href="?demo=Slick.Finder">Slick.Finder</a></li>
					<li><h4>Drag and Drop</h4></li>
					<li><a href="?demo=Drag.Cart">Drag.Cart</a></li>
					<li><a href="?demo=Drag.Drop">Drag.Drop</a></li>
					<li><a href="?demo=Drag.Move">Drag.Move</a></li>
					<li><h4>Effects</h4></li>
					<li><a href="?demo=Effects">Effects</a></li>
					<li><a href="?demo=Fx.Morph">Fx.Morph</a></li>
					<li><a href="?demo=Fx.Slide">Fx.Slide</a></li>
					<li><a href="?demo=Fx.Sort">Fx.Sort</a></li>
					<li><a href="?demo=Transitions">Transitions</a></li>
					<li><h4>Events</h4></li>
					<li><a href="?demo=Element.Event">Element.Event</a></li>
					<li><a href="?demo=MouseEnter">MouseEnter</a></li>
					<li><a href="?demo=MouseWheel">MouseWheel</a></li>
					<li><a href="?demo=Element.Delegation">Element.Delegation</a></li>
					<li><a href="?demo=Element.Event.Pseudos">Element.Event.Pseudos</a></li>
					<li><h4>Request</h4></li>
					<li><a href="?demo=Request">Request</a></li>
					<li><a href="?demo=Request.HTML">Request.HTML</a></li>
					<li><a href="?demo=Request.JSON">Request.JSON</a></li>
					<li><h4>Interface</h4></li>
					<li><a href="?demo=HtmlTable">HtmlTable</a></li>
					<li><h4>Plugins</h4></li>
					<li><a href="?demo=Accordion">Accordion</a></li>
					<li><a href="?demo=Slider">Slider</a></li>
					<li><a href="?demo=Sortables">Sortables</a></li>
					<li><a href="?demo=Enhanced-Form">Enhanced Forms</a></li>
					<li><h4><a href="?demos">More Demos</a></h4></li>
				</ul>
			</div>
			<div id="rightcolumn">
				<?php
				if ($content):
					echo $content;
				else: ?>
				<h2>MooTools Demos</h2>

				<p>The demos are here to give you some examples of how MooTools works. Demos can be opened in <a href="http://jsfiddle.net">jsFiddle</a> for editing, and you can <a href="https://github.com/mootools/mootools-demos">download the entire demo runner here</a>.</p>

				<p>We hope you enjoy our demos.</p>
				<p>The MooTools Development Team.</p>
				<?php endif; ?>
			</div>
		</div>

	</div>

</body>
</html>
