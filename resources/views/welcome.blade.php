<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Styles -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            @if(isset($p))
                <br>
                <div class="row controls">
                    <div class="col-lg-12 row">
                        <center>

     <!--  Lighten -->      <div class="col-lg-1 col-lg-offset-2 control">
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="lighten">
                                    <input type="submit" value="lighten">
                                </form>
                            </div>

     <!--  Darken -->       <div class="col-lg-1 control">
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="darken">
                                    <input type="submit" value="darken">
                                </form>
                            </div>

     <!--  flipx -->        <div class="col-lg-1 control"> 
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="flipx">
                                    <input type="submit" value="flip X">
                                </form>
                            </div>

     <!--  flipy -->        <div class="col-lg-1 control"> 
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="flipy">
                                    <input type="submit" value="Flip Y">
                                </form>
                            </div>

    <!--  doubleflip -->    <div class="col-lg-1 control">
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="doubleflip">
                                    <input type="submit" value="Double Flip">
                                </form>                       
                            </div>

    <!--  rotateright -->   <div class="col-lg-1 control">                            
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="rotateright">
                                    <input type="submit" value="Rotate =>">
                                </form>                       
                            </div>

    <!--  rotateleft -->    <div class="col-lg-1 control">                      
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="rotateleft">
                                    <input type="submit" value="Rotate <=">
                                </form>
                            </div>


    <!--  invert -->        <div class="col-lg-1 control">     
                                <form action="/edit" method="POST">
                                    <input type="hidden" name="imagepath" value="{{$imagepath}}">
                                    <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                    <input type="hidden" name="action" value="invert">
                                    <input type="submit" value="invert">
                                </form>                     
                            </div>

                        </center>
                    </div>
                </div><br>

                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2"><br>
                            <img width="100%" src="{{$imagepath}}" alt=""><br><br>
                            <center><p>To download the image simply right-click and choose "save image as"</p></center><br>
                        </div>
                    </div>
                   
        </div>
            @else
                <div class="row"><br><br><br><br><br><br><br><br><br><br>
                    <div class="col-lg-3 col-lg-offset-4 controls">
                        <center>
                            <h1>Image Upload</h1><br>
                            <form action="{{ URL::to('/') }}" method="post" enctype="multipart/form-data">
                                <label>Select image to upload:</label>
                                <input type="file" name="file" id="file"><br>
                                <input type="submit" value="Upload" name="submit">
                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                            </form>
                        </center>
                    </div>
                </div>
                
            @endif
        </div>
    </body>
</html>
