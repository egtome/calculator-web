<!DOCTYPE html>
<html>
<head>
    <title>Calculator Web - Page not found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700');

        body{
        height: 100vh;
        font-family: "Poppins", sans-serif;
        background: black !important;
        color: white !important;
        font-weight: 900 !important;
        }

        .height-vh{
        height: 100vh;
        }

        .main-heading{
        font-size: 220px;
        font-weight: 700;
        }

        .fa{
        font-size: 20px !important;
        padding: 5px;
        }

        .btn{
        color: white !important;
        font-weight: 600 !important;
        border: 1px solid white !important;
        background: transparent !important;
        border-radius: 0px !important;
        }

        .btn:hover{
        color: black !important;
        background: #fff !important;
        }
    </style>
</head>

<body>
   <div class="container-fluid">
      <div class="row d-flex justify-content-center align-items-center height-vh">
         <div class="col-lg-6 col-12">
            <div class="col-12 d-flex flex-column justify-content-center align-items-center">
               <h1 class="main-heading">404</h1>
               <h2>we couldn't find this page.</h2>
               <div class="text-center mt-4 mb-5">
                  <button class="btn btn-success px-3 mr-2" onclick="redirect()"><i class="fa fa-home"></i> Home</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
<script>
        function redirect() {
            window.location.href = '/';
        }
</script>

</html>
