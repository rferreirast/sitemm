<link rel="stylesheet" href="./minified/themes/default.min.css" id="theme-style" />
<script src="./minified/sceditor.min.js"></script>
<script src="./minified/icons/monocons.js"></script>
<script src="./minified/formats/bbcode.js"></script>

<form action="" method="post">

<div>

<textarea id="example" style="height:300px;width:600px;" name="descricaoProduto">

[center][size=3][b]BBCode SCEditor[/b][/size][/center]


</textarea>

</div>

</form>


<script>
var textarea = document.getElementById('example');
	sceditor.create(textarea, {
	format: 'bbcode',
	icons: 'monocons',
	style: '../minified/themes/content/default.min.css'
	});


			var themeInput = document.getElementById('theme');
			themeInput.onchange = function() {
				var theme = '../minified/themes/' + themeInput.value + '.min.css';

				document.getElementById('theme-style').href = theme;
			};
		</script>		
	</body>
</html>
