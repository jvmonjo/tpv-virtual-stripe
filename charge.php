<?php include('./header.php'); ?>




        <div style="background-color:#F3F3F3;" class=" mdl-typography--text-center">
          <?php
          if ($_POST['stripeToken']) {
            $token  = $_POST['stripeToken'];
            $transaction_id = $token.id;
            $amount = $_POST['amount'];
            $description = $_POST['description'];
            $customer = \Stripe\Customer::create(array(
                'email' => $_POST["stripeEmail"],
                'source'  => $token
            ));
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $amount,
                'description' => $description,
                'currency' => 'eur'
            ));
           $cuantia = $amount/100;
          }
          ?>
          <style media="screen">
            .result {
                position: relative;
                padding: 0px 0px 32px 0px;
                background-color: white;
                margin-top: 50px;
            }
            .mdl-card__title:before {
                background: linear-gradient(-45deg, #F3F3F3 16px, transparent 0), linear-gradient(45deg, #F3F3F3 16px, transparent 0);
                background-position: left-bottom;
                background-repeat: repeat-x;
                background-size: 32px 32px;
                content: " ";
                display: block;
                position: absolute;
                bottom: 0px;
                left: 0px;
                width: 100%;
                height: 32px;
            }

            .result:after {
                background: linear-gradient(-45deg, #F3F3F3 16px, transparent 0), linear-gradient(45deg, #F3F3F3 16px, transparent 0);
                background-position: left-bottom;
                background-repeat: repeat-x;
                background-size: 32px 32px;
                content: " ";
                display: block;
                position: absolute;
                bottom: 0px;
                left: 0px;
                width: 100%;
                height: 32px;
            }
          </style>
          <div style="padding-top:50px">

          </div>

          <div class="mdl-card result" style="margin-left:auto; margin-right:auto;">
            <div class="mdl-card__title">
              <h2 class="mdl-card__title-text" style="color: #FF4081;">Resultado de la transacción</h2>
            </div>
            <div class="mdl-card__media">
              <img src="images/rebut.png" width="220" height="140" border="0" alt="" style="padding:20px;">
            </div>
            <div class="mdl-card__supporting-text">
              <?php
              if ($_POST['stripeToken']) {
                echo "<p>La operación se ha realizado correctamente. Estos son los detalles de la operación:</p>";
                echo "<strong>-Id transacción:</strong> <em>".$transaction_id."</em><br>";
                echo "<strong>-Concepto:</strong> <em>".$description."€</em><br>";
                echo "<strong>-Cuantía:</strong> <em>".$cuantia."€</em><br><br>";
                echo "<p>En breve le enviaremos un recibo de esta transacción a su correo electrónico</p>";
              }else {
                echo "<p><strong>La operación no se ha podido realizar correctamente</strong>.</p><p>Recuerde que para efectuar un pago debe visitar el enlace que habrá recibido en su correo. Si sigue teniendo problemas, contacte con nosotros</p>";
              }

              ?>
            </div>
            <div class="mdl-card__actions">
                Volver a <a class="android-link mdl-typography--font-light" href="<?php echo $config['business_url']; ?>" target="_blank"><?php echo $config['business_name']; ?></a>
            </div>
          </div>
          <div style="padding-top:50px"></div>
        </div>







        <?php include('./footer.php'); ?>
