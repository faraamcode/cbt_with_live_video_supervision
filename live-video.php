

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roemichs Live Video Class</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
          body, html {
    background-color: gray;
    height: 100%;
} 
            .msg span{
                font-size: 0.7rem;
                margin-left: 15px;
            }
          .msg{
            background-color: #dcf8c6;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 8px;
            width: fit-content
          } 
        #messages{
            height: 88vh;
            overflow-x: hidden;
            padding: 10px;
            background-image: url(fal1.jpg)      
        }
        form{
            display: flex;
        }
        input{
            font-size: 1.2rem;
            padding: 10px;
            margin: 10px 5px;
            appearence:none;
            -webkit-appearance:none;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #message{
            flex: 2
        }
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
/*small screen*/
#videos {
   margin: 1rem 0;
    background: var(--clr-white: #fff);
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: 1fr 1fr;
    width: 100vw;
    height:100vh;
    /*grid-template-areas: */
    /*    "a a a b"*/
    /*    "a a a c"*/
    /*    ;*/
    /*    gap:2rem;*/
        grid-template-areas: 
        "a a  a"
        "c b  b"
        ;
        gap:1rem;
    align-items : center;
    justify-content: center;
}

#subscriber {
     grid-area: a;
   
     height: 100%;
    width: 100%;
    display:grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: repeat(auto-fit, minmax(200px, 1fr));
 border: 5px solid var(--clr-primary-1);
    box-shadow: var(--light-shadow);
     border-radius: 10px;

}

#publisher {
     grid-area: b;
    height: 100%;
    width: 100%;
    background:red;
    border: 5px solid var(--clr-primary-1);
    box-shadow: var(--light-shadow);
    border-radius: 10px;
    overflow:hidden;

}
#details {
     border-radius: 10px;
     grid-area: c;
     background:white;
     height: 100%;
    width: 100%;
  
}
/* big screen */
@media screen and (min-width:762px){
    #videos {
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: 1fr 1fr;

    grid-template-areas: 
        "a a a b"
        "a a a c"
        ;
        gap:2rem;
    align-items : center;
    justify-content: center;
}
 #subscriber {
     grid-area: a;
     background: #646c64;
     height: 100%;
    width: 100%;
    display:grid;
    justify-items:center;
    align-items: center;
    place-items:center;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    grid-template-rows: repeat(auto-fit, minmax(300px, 1fr));
    transition: var(--transition: all 0.3s linear);
    

}

#publisher {
     grid-area: b;
    height: 100%;
    width: 100%;
    background: white;
     transition: var(--transition: all 0.3s linear);

}
#details {
    display:grid;
    place-items: center;
     grid-area: c;
     background:white;
     height: 100%;
    width: 100%;
  
} 
#subscriber:hover{
    transform: scale(1.02);
}
#publisher:hover{
    transform: scale(1.02);
}
    
}
        </style>
        <script src="jquery.js"></script>
            <link href="css/app.css" rel="stylesheet" type="text/css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    </head>
        <!--// getting button  for board-->
    

  
    
    
    <!--// end of getting board-->
    <body class="top-navbar-fixed">

   
         <div id="videos">
             <div id="details">
                 <img src="icon.jpg" style="width:200px; height:200px;">
                 <a href="index.php" target="_blank"><button class="btn btn-info">Online CBT</button></a>
             </div>
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>

    <script type="text/javascript">
   
        // replace these values with those generated in your TokBox Account
const clickVideo = document.querySelectorAll(".OT_video_element");

var apiKey = "47055674";
var sessionId = "1_MX40NzA1NTY3NH5-MTYwODYzODY1OTAyOX5CUTltZ0JZQW96QzBuTkM1VmNITXkwT1p-fg";
var token = "T1==cGFydG5lcl9pZD00NzA1NTY3NCZzaWc9NDlkZWMxMmE0YzI1Yzc5ZTQ3NmZmNzQ5Y2Q2M2Q2Y2ExMzA1YjUyMDpzZXNzaW9uX2lkPTFfTVg0ME56QTFOVFkzTkg1LU1UWXdPRFl6T0RZMU9UQXlPWDVDVVRsdFowSlpRVzk2UXpCdVRrTTFWbU5JVFhrd1QxcC1mZyZjcmVhdGVfdGltZT0xNjA4NjM4Njc1Jm5vbmNlPTAuMjg1MTk2NTgyMzY5OTk2NDUmcm9sZT1wdWJsaXNoZXImZXhwaXJlX3RpbWU9MTYxMTIzMDY3NSZpbml0aWFsX2xheW91dF9jbGFzc19saXN0PQ=="
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
clickVideo.forEach(function(btn){
    alert(btn);
});
    </script>



                     
                    


       
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>
        <script src="js/main.js"></script>
        <script src="my_script.js"></script>

    </body>
</html>

