<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>

<form action="action_switch.php" method="post" class='form'>
  <div class='control'>

    <h1>
     lernplattform autologservice: 
    </h1> 
  </div>
  <div class='control block-cube block-input'>
    <input name='username' placeholder='Username' type='text'>
    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
  </div>
  <div class='control block-cube block-input'>
    <input name='password' placeholder='Password' type='password'>
    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
  </div>
  <button class='btn block-cube block-cube-hover' name="action" value="start" type='submit'>
    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
    <div class='text'>
      subscribe
    </div>
  </button>
  <button class='btn block-cube block-cube-hover' name="action" value="stop" type='submit'>
    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
    <div class='text'>
      unsubscribe
    </div>
  </button>
    <h3>mo-fr:</h3>
    <p>start: 08.00 uhr + random(15min)</p>
    <p>stop: 16.35 uhr + random(5min)</p>
    <a href="contact.html">contact</a>
    <hr>
</form>
    <h2>Werbung</h2>
    <a href="https://postcashcash.com">freies bargeld</a>
    <a href="https://bitcoin-kleinanzeigen.cc">bitcoin-kleinanzeigen.cc</a>
    <a href="https://sichere-notebooks.com">kaufe notebooks</a>
    <a href="https://blumberg.bitcoin-kleinanzeigen.cc">shop aus blumberg</a>
    <hr>

<form method="post" action="post_comment.php">
    <p>oeffentlicher chat<p>
	<textarea name="comment" cols="30" rows="5"></textarea><br>
	<input type="submit" value="Submit">
</form>

<?php
include_once 'connect_to_database.php';
include_once 'functions.php';
print_comments_reverse($conn);
?>
</body>
</html>
