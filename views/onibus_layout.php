<?php

  $idViagem =$_POST['id_viagem'];
  $TotalPoltronas = $_POST['poltronas'];

  require_once('../models/registro_passagem_class.php');
  require_once('../controllers/registro_passagem_controller.php');

  $ocupadas = new RegistroPassagemController();
  $ocupadas = $ocupadas::buscarPoltronas($idViagem);
  // echo(sizeof($ocupadas));

 ?>
<form class="" action="index.html" method="post">
  <!-- <input type="checkbox" name="" value=""> -->
  <div class="legenda">
    <div class="leg_hold">
      <div class="leg_box" style="background-color:green;"></div><div class="leg_text">Disponivel</div>
    </div>
    <div class="leg_hold">
      <div class="leg_box" style="background-color:yellow;"></div><div class="leg_text">Selecionado</div>
    </div>
    <div class="leg_hold">
      <div class="leg_box" style="background-color:grey;"></div><div class="leg_text">Ocupado</div>
    </div>
  </div>

   <div class="onibus">
     <div class="fileira">
       <?php
        $a = 0;
        while($a < $TotalPoltronas){

          $a++;
          ?>
          <div class="fileira_corredor">

            <label for="polt" class="poltronas" data-active='0'><?php echo $a; ?></label>
            <input class="polt" type="checkbox" name="cbx1" value="<?php echo $a; ?>" style="display:none; opacity:0;">
          <?php
          $a ++;

          ?>
            <label for="polt" class="poltronas" data-active='0'><?php echo $a; ?></label>
            <input class="polt" type="checkbox" name="cbx1" value="" style="display:none; opacity:0;">
          </div>
          <?php
        }
        ?>

      </div>
      <!-- <div class="fileira"> -->

      <!-- </div> -->

       <!-- <div class ="poltronas" val=1>2</div> -->
       <!-- <div class ="poltronas" val=1>3</div>
       <div class ="poltronas" val=1>4</div>
       <div class ="poltronas" val=1>5</div>
       <div class ="poltronas" val=1>6</div>
       <div class ="poltronas" val=1>7</div>
       <div class ="poltronas" val=1>8</div>
       <div class ="poltronas" val=1>9</div>
       <div class ="poltronas" val=1>10</div> -->
     <!-- </div>
     <div class="fileira">
       <div class ="poltronas">11</div>
       <div class ="poltronas">12</div>
       <div class ="poltronas">13</div>
       <div class ="poltronas">14</div>
       <div class ="poltronas">15</div>
       <div class ="poltronas">16</div>
       <div class ="poltronas">17</div>
       <div class ="poltronas">18</div>
       <div class ="poltronas">19</div>
       <div class ="poltronas">20</div>
     </div>
     <br>
     <br>
     <div class="fileira">
       <div class ="poltronas">21</div>
       <div class ="poltronas">22</div>
       <div class ="poltronas">23</div>
       <div class ="poltronas">24</div>
       <div class ="poltronas">25</div>
       <div class ="poltronas">26</div>
       <div class ="poltronas">27</div>
       <div class ="poltronas">28</div>
       <div class ="poltronas">29</div>
       <div class ="poltronas">30</div>
     </div>
     <div class="fileira">
       <div class ="poltronas">31</div>
       <div class ="poltronas">32</div>
       <div class ="poltronas">33</div>
       <div class ="poltronas">34</div>
       <div class ="poltronas">35</div>
       <div class ="poltronas">36</div>
       <div class ="poltronas">37</div>
       <div class ="poltronas">38</div>
       <div class ="poltronas">39</div>
       <div class ="poltronas">40</div>
  --> </div>
</form>
