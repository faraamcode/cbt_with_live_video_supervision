<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icon.jpg">
    <link href="album.css" rel="stylesheet">

    <title>WELCOME TO ROEMICHS ONLINE ENTRANCE EXAM</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <style>
    

    }
#videos {
    position: relative;
    width: 100%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
}

#subscriber {
   
    width: 100%;
    height: 100%;
    float:left;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: auto; 
}

#publisher {
    position: fixed;
    width: 20%;
    height: 20%;
    float:right;
    border: 2px solid red;
    bottom:0;
    right:0;
   
   
}
        </style>
    </head>
  <body>
       <div id="videos">
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>
  	     
  	     
  	       

    <script type="text/javascript">
        // replace these values with those generated in your TokBox Account
var apiKey = "46802314";
var sessionId = "2_MX40NjgwMjMxNH5-MTU5MjY4ODMzNDg1N35NYlRsUVBNYnJhWW1kdW81M2UrQ3BrazN-fg";
var token = "T1==cGFydG5lcl9pZD00NjgwMjMxNCZzaWc9ZjVkY2E2N2ZmN2YwMWMzYmFiN2RiZTI5MDFmYmU0ODk4MGVkZDRiYzpzZXNzaW9uX2lkPTJfTVg0ME5qZ3dNak14Tkg1LU1UVTVNalk0T0RNek5EZzFOMzVOWWxSc1VWQk5ZbkpoV1cxa2RXODFNMlVyUTNCcmF6Ti1mZyZjcmVhdGVfdGltZT0xNTkyNjg4Mzk0Jm5vbmNlPTAuODkyMzk1NjQzODcwNDE1NyZyb2xlPXB1Ymxpc2hlciZleHBpcmVfdGltZT0xNTk1MjgwMzk3JmluaXRpYWxfbGF5b3V0X2NsYXNzX2xpc3Q9"
// Handling all of our errors here by alerting them
function handleError(error) {
  if (error) {
    alert(error.message);
  }
}

// (optional) add server code here
initializeSession();

function initializeSession() {
  var session = OT.initSession(apiKey, sessionId);

  // Subscribe to a newly created stream
  session.on('streamCreated', function(event) {
    session.subscribe(event.stream, 'subscriber', {
      insertMode: 'append',
      width: '100%',
      height: '100%'
    }, handleError);
  });

  // Create a publisher
  var publisher = OT.initPublisher('publisher', {
    insertMode: 'append',
    width: '100%',
    height: '100%'
  }, handleError);

  // Connect to the session
  session.connect(token, function(error) {
    // If the connection is successful, initialize a publisher and publish to the session
    if (error) {
      handleError(error);
    } else {
      session.publish(publisher, handleError);
    }
  });
}
    </script>
       

  	 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
  </body>
</html>
