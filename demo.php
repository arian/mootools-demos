<?php if (substr($_SERVER['SCRIPT_NAME'], -9) == 'demo.php') die();

$demo = $_GET['demo'];
$dir = dirname(__FILE__);

// check if the demo is valid, if not, do nothing!
if (strpos($demo, '/') !== false || !is_dir($dir . '/demos/' . $demo)) die();


// Get all our data/html/css/js
include $dir . '/libs/yaml.php';

$path = $dir . '/demos/' . $_GET['demo'] . '/';
$details = file_get_contents($path . 'demo.details');

preg_match('/\/\*\s*^---(.*?)^\.\.\.\s*\*\/(.*)/ms', $details, $matches);

$descriptor = array();

if (!empty($matches)){
	$descriptor = YAML::decode($matches[1]);
	$description = $matches[2];
}

$html = file_get_contents($path . 'demo.html');
$css = file_get_contents($path . 'demo.css');
$js = file_get_contents($path . 'demo.js');


// Fix links for Request, so they both work here and on jsfiddle
$html_demo = preg_replace('/\/echo\/(html|json)\//', 'Request.php', $html);
$js_demo = preg_replace('/\/echo\/(html|json)\//', 'Request.php', $js);


// Our HTML!
?>

<div id="description">
	<?php if (!empty($descriptor['name'])): echo '<h2>' . $descriptor['name'] . '</h2>'; endif; ?>
	<?php if (!empty($description)): echo $description; endif; ?>
</div>


<?php /* Post to jsFiddle Form */ ?>
<form action="http://jsfiddle.net/api/post/mootools/1.3/dependencies/more,art/" method="post">

	<div id="jsfiddle_data">
		<textarea id="css" name="css"><?php echo $css; ?></textarea>
		<textarea id="html" name="html"><?php echo htmlspecialchars($html); ?></textarea>
		<textarea id="js" name="js"><?php echo $js; ?></textarea>
	</div>

	<ul class="tabs">
		<li class="selected first tab">Demo</li>
		<li class="jsfiddle"><button type="submit">Edit with jsFiddle</button></li>
		<?php if (!empty($descriptor['docs'])): ?><li class="tab">Docs</li><?php endif; ?>
		<li class="code tab">CSS</li>
		<li class="code tab">HTML</li>
		<li class="code tab">JavaScript</li>
	</ul>

</form>

<div class="tabcontent selected">
	<?php echo $html_demo; ?>
</div>

<?php if (!empty($descriptor['docs'])): ?>
<div class="tabcontent">
	<h3>Documentation References:</h3>
	<ul class="doc_references">
	<?php foreach ($descriptor['docs'] as $doc): ?>
		<li><a href="<?php echo $doc['url']; ?>"><?php echo $doc['name']; ?></a></li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>

<div class="tabcontent">
	<textarea id="css_tab" name="css_tab"><?php echo $css; ?></textarea>
</div>

<div class="tabcontent">
	<textarea id="html_tab" name="html_tab"><?php echo htmlspecialchars($html); ?></textarea>
</div>

<div class="tabcontent">
	<textarea id="js_tab" name="js_tab"><?php echo $js; ?></textarea>
</div>

<script src="assets/codemirror/js/codemirror.js" type="text/javascript"></script>
<script src="Source/mootools-core-1.3-full.js" type="text/javascript"></script>
<script src="Source/mootools-more-1.3-full.js" type="text/javascript"></script>
<script src="Source/mootools-art-0.87.js" type="text/javascript"></script>
<script src="assets/js/demos.js" type="text/javascript"></script>

<script type="text/javascript">
	<?php echo $js_demo; ?>
</script>

