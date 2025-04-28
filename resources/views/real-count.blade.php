<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Real Count</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">

  <div class="flex flex-col items-center justify-center min-h-screen p-8">

    <!-- Title -->
    <div class="text-center mb-10">
      <h1 class="text-2xl font-bold">Real Count</h1>
      <p class="text-sm text-gray-600 mt-2">Ini adalah perhitungan yang sebenarnya, bijaklah dalam menerima informasi ini.</p>
    </div>

    <!-- Kandidat -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
      
      <!-- Card 1 -->
      <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center w-64">
          <img src="./img/Jimmy.jpg" alt="Kandidat 1" class="w-40 h-40 object-contain">
        <h2 class="text-lg font-bold mb-2">Lorem - Ipsum</h2>
        <p class="text-2xl font-bold">0</p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center w-64">
          <img src="./img/Jimmy.jpg" alt="Kandidat 2" class="w-40 h-40 object-contain">
        <h2 class="text-lg font-bold mb-2">Lorem - Ipsum</h2>
        <p class="text-2xl font-bold">0</p>
      </div>

    </div>

    <!-- Jumlah Suara -->
    <div class="bg-white rounded-2xl shadow-md px-10 py-6">
      <p class="text-lg font-bold">Jumlah Suara: 100</p>
    </div>

  </div>

</body>
</html>
