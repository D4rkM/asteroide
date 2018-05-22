<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style_teste.css">
    <title>Lucares do onibus</title>
    <script src="../js/jquery-3.3.1.js"></script>
    <script>
    function Selecionar(){
    var selecionado = document.getElementById("poltronas");

    // Se estiver amarelo, troca pra verde
    if(selecionado.style.background === "green") {
        selecionado.style.background = "yellow";

    // Senão, troca pra amarelo
    } else {
        selecionado.style.background = "green";
    }
}
</script>
  </head>
  <body>
    <div class="container_onibus">
      <div class="legenda">
        <div class="leg_box" style="background-color:green;"></div><div class="leg_text">Disponivel</div>
        <div class="leg_box" style="background-color:yellow;"></div><div class="leg_text">Selecionado</div>
        <div class="leg_box" style=""></div><div class="leg_text">Ocupado</div>
      </div>
      <div class="onibus">
        <div class="fileira">
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">1</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">2</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">3</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">4</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">5</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">6</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">7</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">8</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">9</div></a>
          <a href="#" onclick="Selecionar()"><div id="poltronas" style="background: green;">10</div></a>
        </div>
        <div class="fileira">
          <div id="poltronas">11</div>
          <div id="poltronas">12</div>
          <div id="poltronas">13</div>
          <div id="poltronas">14</div>
          <div id="poltronas">15</div>
          <div id="poltronas">16</div>
          <div id="poltronas">17</div>
          <div id="poltronas">18</div>
          <div id="poltronas">19</div>
          <div id="poltronas">20</div>
        </div>
        <br>
        <br>
        <div class="fileira">
          <div id="poltronas">21</div>
          <div id="poltronas">22</div>
          <div id="poltronas">23</div>
          <div id="poltronas">24</div>
          <div id="poltronas">25</div>
          <div id="poltronas">26</div>
          <div id="poltronas">27</div>
          <div id="poltronas">28</div>
          <div id="poltronas">29</div>
          <div id="poltronas">30</div>
        </div>
        <div class="fileira">
          <div id="poltronas">31</div>
          <div id="poltronas">32</div>
          <div id="poltronas">33</div>
          <div id="poltronas">34</div>
          <div id="poltronas">35</div>
          <div id="poltronas">36</div>
          <div id="poltronas">37</div>
          <div id="poltronas">38</div>
          <div id="poltronas">39</div>
          <div id="poltronas">40</div>
        </div>
      </div>
    </div>
  </body>
</html>
