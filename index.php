<?php include('header.php'); ?>




        <div class="android-be-together-section mdl-typography--text-center">
          <div class="logo-font android-slogan">TPV Virtual</div>

          <?php
          if ($_GET['concepto']) {
            $concepto = $_GET['concepto'];
          }else {
            $concepto = "Pedido";
          }
          if ($_GET['cuantia']) {
            $cuantia = $_GET['cuantia'];
          }else {
            $cuantia = "0";
          }

          $cuantiaEnCentimos = str_replace(',', '.', $cuantia)*100;

          $amount = $cuantiaEnCentimos;
          ?>
          <div style="margin-left:auto; margin-right:auto;" class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-desktop">
            <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
              <h2 class="mdl-card__title-text">Información de la operación</h2>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
              <div class="logo-font android-sub-slogan">
              <?php echo "<strong>Concepto: </strong>" .$concepto."<br>"; ?>
              <?php echo "<strong>Cuantia:</strong> " .$cuantia."€"; ?>
              </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <form action="charge.php" method="POST">
               <script src="https://checkout.stripe.com/checkout.js"
               class="stripe-button"
               data-key="<?php echo $stripe['publishable_key']; ?>"
               data-label="<?php echo $config['button_text']; ?>"
               data-amount="<?php echo $amount; ?>"
               data-name="<?php echo $config['business_name']; ?>"
               data-description="<?php echo $description; ?>"
               data-image="<?php echo $config['business_square_logo']; ?>"
               data-locale="<?php echo $config['locale']; ?>"
               data-currency="eur">
               </script>
               <input type="hidden" name="amount" value="<?php echo $amount ?>" />
              <input type="hidden" name="description" value="<?php echo $concepto ?>" />
             </form>

          </div>
        </div>
        </div>





        <?php include('footer.php'); ?>
