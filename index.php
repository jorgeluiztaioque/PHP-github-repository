<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="jquery-1.2.2.pack.js"></script>

<?php
  // for example your user
  $user = 'githubusername';

  // A token that you could generate from your own github 
  // go here https://github.com/settings/applications and create a token
  // then replace the next string
  $token = 'github-token';

  // We generate the url for curl
  $curl_url = 'https://api.github.com/users/' . $user . '/repos';

  // We generate the header part for the token
  $curl_token_auth = 'Authorization: token ' . $token;

  // We make the actuall curl initialization
  $ch = curl_init($curl_url);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // We set the right headers: any user agent type, and then the custom token header part that we generated
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('User-Agent: Awesome-Octocat-App', $curl_token_auth));

  // We execute the curl
  $output = curl_exec($ch);

  // And we make sure we close the curl       
  curl_close($ch);

  // Then we decode the output and we could do whatever we want with it
  $output = json_decode($output);
echo "<table class=\"table table-striped table-condensed table-hover\">";
  if (!empty($output)) {
    // now you could just foreach the repos and show them
    foreach ($output as $repo) {
	echo "<tr>";
	echo "<td>";
      echo "<a class=\"btn btn-link\" href=$repo->html_url target=_blank>$repo->name</a><h5> - $repo->description</h5>";
    echo "</td>";
    echo "</tr>";  
    }
}
echo "</table>";

?>
</head>
</html>
