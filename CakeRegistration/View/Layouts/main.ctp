<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <style>
            .error-message{
                color: red;    
            }
            label{
                margin-top: 8px;    
            }

        </style>
<?php
echo $this->Html->css(array('bootstrap.min.css'));
echo $this->Html->script('jquery-1.10.2.min.js');
?>

        <script>
            $(document).ready(function () {
                //$('#img').hide();
                function readImage(input) {



                    var avatar = $("#ProfileImage").val();
                    var extension = avatar.split('.').pop().toUpperCase();
                    if (avatar.length < 1) {
                        avatarok = 0;
                    }
                    else if (extension != "PNG" && extension != "JPG" && extension != "GIF" && extension != "JPEG") {

                        $('#ProfileImage').val('');
                        alert("invalid extension " + extension);
                        return false;
                    }
                    else {
                        avatarok = 1;
                    }

                    var file_size = $('#ProfileImage')[0].files[0].size;
                    if (file_size > 1024000) {
                        $('#ProfileImage').val('');
                        alert('File size is greater than 1MB');
                        return false;
                    }


                    if (input.files && input.files[0]) {
                        var FR = new FileReader();
                        FR.onload = function (e) {
                            $('#img').show();
                            $('#img').attr("src", e.target.result);

                            // $('#base').text(e.target.result);
                        };
                        FR.readAsDataURL(input.files[0]);
                    }
                }

                $("#ProfileImage").change(function () {

                    readImage(this);
                });
            });
        </script>

    </head>
    <body>

        <div class="container">

            <div class="page-header">
                <h1 style="text-align:center"><?php echo $title; ?> <small></small>
                </h1>

         <?php
         if($this->Session->read('Auth.User.id')){
         echo $this->Html->link('Logout',array('controller' => 'profiles', 'action' => 'logout'));           
         }
         $act=$this->params['action'];
         if($act=='login'){
          echo $this->Html->link('Register',array('controller' => 'profiles', 'action' => 'index'));              
         }elseif ($act=='index') {echo $this->Html->link('Login',array('controller' => 'profiles', 'action' => 'login'));           }
         ?>
            </div>

            <!-- Registration form - START -->
            <?php
            echo $this->fetch('content');
            ?>
            <!-- Registration form - END -->

        </div>

    </body>
</html>
