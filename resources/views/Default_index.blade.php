<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>FAQ</title>

    <style>
        .container{
            /* border: 1px solid black; */
      
        }
        .box{
            width: 300px;
            height: 300px;
            /* border: 1px black solid; */
            margin: auto;
           margin-top: 150px;
        }
    </style>
</head>
<body class="container bg-dark">
    
<div class=" box bg-primary d-flex flex-column  text-center justify-content-center " style="border-radius: 10px; box-shadow:5px 5px white ">

<a href="{{url('user/all_faq')}}"><button class="btn btn-primary btn-large btn-outline-light m-4">FAQ</button></a>
<a  href="{{url('user/admin_faq')}}"><button class="btn btn-primary btn-large btn-outline-light">FAQ MANAGEMENT SYSTEM</button></a>
   
</div>
 
</body>
</html>