#!/usr/bin/php
<?php
if ($argc == 2)
{
	if (file_exists($argv[1]))
	{
		$file = @fopen($argv[1], "r") or die("Unable to open file, bitch!\n");
		$contents = fread($file, filesize($argv[1]));
		$dom = new DOMDocument;
		$dom->loadHTML($contents, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
		foreach ($dom->getElementsByTagName("a") as $link)
		{
			if ($link->hasAttribute("title"))
				$link->setAttribute("title", strtoupper($link->getAttribute("title")));
			foreach ($link->childNodes as $child)
			{
				if ($child->nodeType != 3)
					if ($child->hasAttribute("title"))
						$child->setAttribute("title", strtoupper($child->getAttribute("title")));
			
				$child->nodeValue = strtoupper($child->nodeValue);
			}
		}
		$html = $dom->saveHTML();
		echo $html;
		fclose($file);
	}
	else
		echo "Incorrect filename\n";
}
?>
