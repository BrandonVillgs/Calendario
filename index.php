<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exam</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>

  <section class="text-gray-600 body-font relative pb-10">
    <form action="/calendario/" method="get">
      <div class="container px-5 py-10 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Generador de Calendarios</h1>
          <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Rellena los datos con información valida.</p>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
          <div class="flex flex-wrap -m-2">
            <div class="p-2 w-1/2">
              <div class="relative">
                <label for="" class="leading-7 text-sm text-gray-600">Fecha Inicial</label>
                <input type="text" id="fechaInicial" required maxlength="7" minlength="7" placeholder="MM-YYYY" name="inicial" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 w-1/2">
              <div class="relative">
                <label for="" class="leading-7 text-sm text-gray-600">Fecha Final</label>
                <input type="text" id="fechaFinal" required maxlength="7" minlength="7" placeholder="MM-YYYY" name="final" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
            </div>
            <div class="p-2 w-full">
              <div class="relative">
                <label for="" class="leading-7 text-sm text-gray-600">Columnas</label>
                <select id="" required name="column" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-10 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
            </div>
            <div class="p-2 w-full">
              <button id="boton" type="submit" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">Button</button>

            </div>
          </div>
        </div>
      </div>
    </form>
  </section>


  <?php

  include("calendario.php");
  if (isset($_GET["column"]) && isset($_GET["inicial"]) && isset($_GET["final"])) {
    $fecha = $_GET["inicial"];
    $mes = intval(substr($fecha, 0, 2));
    $año = intval(substr($fecha, 3, 6));

    $fechaf = $_GET["final"];
    $mesf = intval(substr($fechaf, 0, 2));
    $añof = intval(substr($fechaf, 3, 6));
    echo
    '<section class="px-10 text-center">
      <div class="grid overflow-hidden grid-cols-' . $_GET["column"] . ' grid-rows-1 gap-2">' .
      Rango($mes, $año, $mesf, $añof) .
      '</div>
    </section>';
  }
  ?>

  <script src="app.js"></script>

</body>

</html>