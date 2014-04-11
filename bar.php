<?php 
include "allpages.php";
?>
<html>
<head>
<script type="text/javascript">// <![CDATA[
        function preloader(){
            document.getElementById("loading").style.display = "none";
            document.getElementById("content").style.display = "block";
        }//preloader
        window.onload = preloader;
// ]]></script>
<style>
	#loading {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
  display: block;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}
	#loading {
  width: 100%;
  height: 100%;
  top: 0px;
  left: 0px;
  position: fixed;
  display: none;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
  text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}
</style>

	
</head>
<body>
  <div id="loading">
  <img id="loading-image" src="./pics/indicator-2.gif" alt="Loading..." />
  <pre id="loading-image" >PLEASE WAIT. . DATA IS BEING EXPORTED </pre>
</div>
<div id="content">
  
  <pre >DATA EXPORTED</pre>
</div>


</body>
</html>