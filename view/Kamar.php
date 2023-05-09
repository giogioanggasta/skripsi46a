<!DOCTYPE html>

  <head>
  <title>Kamar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

  

  <style>
    * {
      box-sizing: border-box
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
      display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      margin-top: -22px;
      padding: 16px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
      background-color: #717171;
    }

    /* Fading animation */
    .fade {
      -webkit-animation-name: fade;
      -webkit-animation-duration: 1.5s;
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    @keyframes fade {
      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    h5 {
      text-align: center;

    }

    #alamat {
      float: right;
    }

    .imgTable {
      width: 50%;
      height: auto;
      text-align: center;
    }

    table {
      border: none;
    }

    @font-face {
      font-family: header;
      src: url("../fonts/Ailerons-Typeface.otf");
    }

    @font-face {
      font-family: texts;
      src: url("../fonts/Renner_ 400 Book.ttf");
    }

    @font-face {
      font-family: navBarFont;
      src: url("../fonts/Kiona-Regular.ttf");
      font-style: bold;
    }

    @font-face {
      font-family: lato;
      src: url("../fonts/Lato-Regular.ttf");
    }

    h1 {
      font-family: header;
      font-size: 70px;
      color: #373737;
    }

    a {
      font-family: navBarFont;
      font-size: 25px;
      color: #868B8E;
      font-style: bold;
    }


    h2 {
      font-family: navBarFont;
      font-size: 30px;
      color: white;
      margin-top: 40px;
      margin-bottom: 40px;
    }

    h5 {
      font-family: navBarFont;
      font-size: 20px;
      color: white;
    }

    .teks {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-85%, -100%);
    }

    .galeri {
      margin-left: 20%;
      margin-top: 10%;
    }

    .container {
      margin-top: 10%;
    }

    .footer {
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #fbeb63;
      color: black;
      text-align: center;
      margin-top: 10%;
    }

    p {
      font-family: lato;
    }

    .purchase-info input,
.purchase-info .btn{
    border: 1.5px solid #ddd;
    border-radius: 25px;
    text-align: center;
    padding: 0.45rem 0.8rem;
    outline: 0;
    margin-right: 0.2rem;
    margin-bottom: 1rem;
}
.purchase-info input{
    width: 60px;
}
.purchase-info .btn{
    cursor: pointer;
    color: #fff;
}
.purchase-info .btn:first-of-type{
    background: #256eff;
}
.purchase-info .btn:last-of-type{
    background: #110752;
}
.purchase-info .btn:hover{
    opacity: 0.9;
}
 
 

    
</style>
</head>
<body>


  <div class="w3-bar w3-white w3-border " id="menu" style="background-color: #11355b">
    <a href="Home.php" class="w3-bar-item"><img src="../images/logo46a.png" style="width:150px"></a>
    <a href="Login.php" class="w3-bar-item" style="float: right; margin-right: 2.5%; margin-top:4%; text-decoration: none; color: white">Login</a>
    <a href="Fasilitas.php" class="w3-bar-item" style="float: right; margin-top:4%; margin-right: 2.5%; text-decoration: none; color: white;">Fasilitas</a>
    <a href="Kamar.php" class="w3-bar-item" style="float: right; margin-top:4%; margin-right: 2.5%; text-decoration: none; color: white; ">Kamar</a>
  </div>
  <br><br>
  
<br><br>

<a style="color:black; float: center; margin-left: 47%; text-decoration: none;"><b>Kamar</b></a>

<div class="container">
    <div class="col" >
      <div class="col-4 col-md-6 col-lg-4">
        <div class="card" style="border-width:none">
          <img src="../images/kamarkos.png" style="width:100%"><br>
          <div class="card-body">
            <p class="card-title">Standard Room </p>
            <p class="card-text">keterangan kamar</p>
            <p class="card-text">Rp. 1.000.000 / bulan</p>
            <div class = "purchase-info">
               <a href="detail_kamar.php"><button type = "button" class = "btn"> 
                 Pesan Kamar Disini <i class = "fas fa-money-bill"></i></button>
               </a>
             </div>
          </div>
        </div>
     
   </div>

   

  


   <div class="footer">
    <img src="../images/logo46a.png" alt="logo46a" class="d-block" style="width:10%; margin-left: 45%; padding-top: 1.5%">
    <p style="font-size:150%">46A adalah penyedia jasa cuci maupun servis mobil terkemuka dari Indonesia. Pesan jasa, cek produk, baca </p>
    <p style="font-size:150%">berita otomotif terbaru dengan nyaman, cepat dan aman tanpa repot.</p>
    <br>
    <a href="Contact.php" class="w3-bar-item" style="float: center; text-decoration: none; font-family:texts ; font-size: 20px">- HUBUNGI KAMI - </a>
    <a href="About.php" class="w3-bar-item" style="float: center; text-decoration: none; font-family:texts ; font-size: 20px"> ABOUT US - </a>
  </div>


</body>

</html>