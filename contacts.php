<!doctype html>
<html lang="en">

<head>
    <title>Contacts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Posts</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<?php    session_start();
if (isset($_SESSION['username'])) {
  include_once 'headerses.php';
} else
  include_once 'header.php'; 
 ?>

<body>
    <div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        E-mails
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <h3> aliquam.in@loremipsum.com </h3>
                    <h3> congue.in@loremipsum.com </h3>
                    <h3> suspendisse.nam@loremipsum.com</h3>
                    <h3> magna.vitae@loremipsum.com</h3>
                    <h3> libero.maximus@.com </h3>
                    <h3> lacinia.rutrum@.com </h3>
                    <h3> odio.quis@.com </h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        You can find us here
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <h3> Anim pariatur at enim eiusmod high life n°123.</h3>
                    <h3> Food truck accusamus terry richardson ad squid n°145.</h3>
                    <h3> Cupidatat skateboard wolf moon officia n°57.</h3>
                    <h3> Farm-to-tabler nesciunt laborum eiusmod n°189.</h3>
                    <h3> Pariatur cliche quinoa nesciunt laborum high life n°64.</h3>
                    <h3> Bird on it sunt aliqua put n°1.</h3>
                    <h3> Coffee nulla synth nesciunt n°12.</h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Support phone numbers
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                <h3>+679-955-5181-224 Fiji </h3>
                <h3>+61-455-5712-43 Australia</h3>
                <h3>+39-705-5534-6 Italy </h3>
                <h3>+213-655-5564-97 Algeria</h3>
                <h3>+374-915-551 Armenia </h3>
                <h3>+376-355-5989-278 Andorra</h3>
                <h3>+43-676-5557-0628 Austria</h3>
                </div>
            </div>
        </div>
    </div>

</body>

</html>