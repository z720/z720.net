<?php
	/**
	 * GIT DEPLOYMENT SCRIPT
	 *
	 * Used for automatically deploying websites via github or bitbucket, more deets here:
	 *
	 *		https://gist.github.com/1809044
	 */

  // Include env
  @include('server-admin.php');

	// The commands
	$commands = array(
        'echo $PWD',
		'../deploy.sh'
	);

	// Run the commands for output
	$output = '';
	$txtoutput = '';
$tmp = '';
	foreach($commands AS $command){
		// Run it
		exec($command, $tmp, $result);
        $tmp = join($tmp, "\n");
		// Output
        $output .= "<span class=\"prompt\">\$({$result})</span> <kbd>{$command}\n</kbd>";
		$output .= "<code>" . htmlentities(trim($tmp)) . "</code>\n";
		$txtoutput .= "\n\$>" . $command;
		$txtoutput .= "\n" . htmlentities(trim($tmp)) . "\n";
	}

	// Make it pretty for manual user access (and why not?)
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>DEPLOYMENT SCRIPT</title>
  <style>
    body {
      background-color: #000000;
      color: #FFFFFF;
      font-weight: bold;
      padding: 0 10px;
    }
    .prompt {
      color: #6BE234;
    }
    kbd {
      color: #729FCF;
    }
    em {
      color: #FF0000;
    }
  </style>
</head>
<body>
<pre>
 .  ____  .    ____________________________
 |/      \|   |                            |
[| <em>&hearts;    &hearts;</em> |]  | Git Deployment Script v0.1 |
 |___==___|  /              &copy; oodavid 2012 |
              |____________________________|

<?php 
echo $output; 
$em = @mail($_SERVER["SERVER_ADMIN"], "Deployment: ".$_SERVER["SERVER_NAME"], $txtoutput);
if ($em) {
  echo "\n\n Email sent to server admin";
} else {
  echo "\n\n Impossible to send email";
}
    
?>
</pre>
</body>
</html>
