
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Image Roulette</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">

      .search-wrapper {
        -webkit-box-shadow: inset 0px -5px 18px 0px rgba(0, 0, 0, 0.03);
        box-shadow: inset 0px -5px 18px 0px rgba(0, 0, 0, 0.03);
        background: rgba(0, 0, 0, 0.07);
        margin: 0 auto;
        width: 100%;
        padding-top: 10px;
      }
      #content {
        padding-top:180px;
      }
      

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }


    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>

    $(window).load(function(){
        $('#siteCaution').modal('show');
       });
    
      var imgObject = new Image();

      function randomString(string_length) {
        var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghiklmnopqrstuvwxyz";
        var output = "";
        var index;

        for (var i = 0; i < string_length; i++)
        {
          var index = Math.floor(Math.random() * chars.length);
          output += chars.substring(index, index + 1);
        }

        return output;
      }

      function getImages() {
        var puushSeed = document.getElementById('randomSeed').value;
        if(puushSeed!="") {
          var randomID = puushSeed.split("puu.sh/");
          if(randomID[1]) {
            console.log("ID is " + randomID[1]);
            var newID = randomID[1].substring(0,3);
            console.log("New ID is" + newID + randomString(2));
            var completeID = newID + randomString(2);

            imgObject.src = "http://puu.sh/" + completeID + "";
            IsValidImageUrl(imgObject.src, myCallback);
          }
        } else {
          imgObject.src = "http://puu.sh/" + randomString(5) + "";
          IsValidImageUrl(imgObject.src, myCallback);
        }


        return true;
      }

      function myCallback(url, answer) {
        //  alert(url + ': ' + answer);
        if(answer) {
          document.getElementById("searchbar").innerHTML = '<button class="btn btn-large btn-primary" type="button" onclick="getImages();return false;">Random Puush Image</button>';
          document.getElementById('textID').value = imgObject.src;
          document.getElementById("imgID").src = imgObject.src;
          document.getElementById("infoRes").innerHTML = imgObject.width+'x'+imgObject.height;
          var id= imgObject.src.substring(19,24);
          document.getElementById('imgurLink').innerHTML = '<a href="http://puu.sh/' + id + '">http://puu.sh/' + id + '</a>';
        } else {
          document.getElementById("searchbar").innerHTML = "<img src=\"assets/img/287.gif\" style=\"padding-top:8px\"/>";
          getImages();
        }
      }

      function IsValidImageUrl(url, callback) {
          var img = new Image();
          img.onerror = function() { callback(url, false); }
          img.onload =  function() { callback(url, true); }
          img.src = url
      }
    </script>                               
  </head>

  <body onload="getImages();">
    <div id="wrap">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">Image Roulette</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="#">Play</a></li>
                <li><a href="index.php">Play Imgur Roulette</a></li>
                <li><a href="#siteInfo" data-toggle="modal">About</a></li>
              </ul>
              <ul class="nav pull-right">
                <form class="navbar-search pull-left">
                  <input type="text" id="randomSeed" class="span4" placeholder="Input Recent Puush URL (Faster Searches)">
                </form>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
        <div class="search-wrapper">
        <div class="container search-field" id="searchbar" style="text-align:center;height:65px;">

            <button class="btn btn-large btn-primary" type="button" onclick="getImages();return false;">Random Puush Image</button>
          
        </div>
        </div>
      </div>

      <div class="container">
        
        <!-- Example row of columns -->
        <div class="row">
          <div class="span12" id="content">
            <a href="javascript:getImages();"><div id="info" style="text-align:center;"></div><img src="" id="imgID" onerror="getImages;" style="max-height:700px;display:block;margin:0 auto;"></a>
          </div>

        </div>
      </div> <!-- /container -->
      <div id="push"></div>
    </div>
    

    <!-- Modal -->
<div id="imageInfo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="ImageInfo" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Image Information</h3>
  </div>
  <div class="modal-body">
    <p>Resolution: <span id="infoRes"></span></p>
    <p>Imgur Link: <span id="imgurLink"></span></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

    <!-- Modal -->
<div id="siteInfo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="SiteInfo" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">About Image Roulette</h3>
  </div>
  <div class="modal-body">
    <p>Image Roulette does not take any responsibility for the content found on its website.</p>
    <ul><li>Some content is NSFW</li>
    <li>All content is hosted by <a href="http://puu.sh/">Imgur</a></li></ul>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>


    <!-- Modal -->
<div id="siteCaution" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="SiteInfo" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Caution</h3>
  </div>
  <div class="modal-body">
    <p>Image Roulette is likely to display some images of a vulgar, pornographic and (definitely) not safe for work nature.</p>
    <ul><li>Image Roulette does not take any responsibility for the content shown on its website. All content is hosted by either Imgur.com or Puu.sh.</li>
    </ul>
    <p>If you have any issues with viewing possibly vulgar or pornographic images, this website is not recommended for you.</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>

<!-- Button to trigger modal -->



   <div id="footer">
      <div class="container pagination-centered" style="padding-top:15px">
        <div class="input-append input-prepend">
          <input class="span4" id="textID" type="text" style="margin:auto;text-align:center;">
        </div>

      </div>
    </div>   



    
   <!-- <script src="assets/js/bootstrap-modal.js"></script>-->


    
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>

    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24996262-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  </body>
</html>
