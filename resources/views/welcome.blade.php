<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
        body {font-size:16px;}
        .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
        .w3-half img:hover{opacity:1}
    </style>
</head>
<body>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
        <div class="w3-container">
            <h3 class="w3-padding-64"><b>Hotel<br>Booking</b></h3>
        </div>
        <div class="w3-bar-block">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
                    <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ url('employee') }}">Funcionários</a>
            </div>

            <P></p>

            <div class="hidden fixed top-0 left-0 px-6 py-4 sm:block">
                    <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ url('expenses') }}">Expenses</a>
            </div>

            <P></p>

                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Company Name</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

  <!-- Header -->
  <div class="w3-container" style="margin-top:80px" id="showcase">
    <h1 class="w3-jumbo"><b>Hotel Booking</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Projeto em Laravel</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>

  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xxlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

  <!-- Designers -->
  <div class="w3-container" id="designers" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b>Members</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>The best team in the world:</p>
    <p>
    </p>
    <p><b></b></p>
  </div>

  <!-- The Team -->
    <div class="w3-row-padding w3-grayscale">
        <div class="w3-col m4 w3-margin-bottom">
            <div class="w3-light-grey">
                <img src="/images/chapeuMario.png" width="100%" height="500">
                    <div class="w3-container">
                        <h3>Mário Rodrigues</h3>
                        <p class="w3-opacity"></p>
                        <p></p>
                    </div>
                </div>
            </div>
        <div class="w3-col m4 w3-margin-bottom">
            <div class="w3-light-grey">
                <img src="/images/Guitarra.png" width="100%" height="500">
                    <div class="w3-container">
                        <h3>Mariana Pereira</h3>
          <p class="w3-opacity"></p>
          <p></p>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="/images/cao.png" width="100%" height="500">
        <div class="w3-container">
          <h3>Ana Azevedo</h3>
          <p class="w3-opacity"></p>
          <p></p>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
        <div class="w3-light-grey">
        <img src="/images/charmandash.png" width="100%" height="500">
        <div class="w3-container">
          <h3>Rodrigo Moreira</h3>
          <p class="w3-opacity"></p>
          <p></p>
        </div>
      </div>
    </div>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <img src="/images/charmandash.png" width="100%" height="500">
        <div class="w3-container">
          <h3>Eduardo Lopes</h3>
          <p class="w3-opacity"></p>
          <p></p>
        </div>
      </div>
    </div>
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>

</body>
</html>
