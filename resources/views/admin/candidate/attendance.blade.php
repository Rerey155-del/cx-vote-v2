<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kehadiran</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-admin-layout title="Candidate">
  <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <!-- Tabs -->
    <div class="flex space-x-4 border-b mb-6">
      <button class="tab-button text-blue-600 border-b-2 border-blue-600 pb-2" onclick="openTab(event, 'aktif')">Anggota Aktif</button>
      <button class="tab-button text-gray-600 hover:text-blue-600 pb-2" onclick="openTab(event, 'luar_biasa')">Anggota Luar Biasa</button>
      <button class="tab-button text-gray-600 hover:text-blue-600 pb-2" onclick="openTab(event, 'muda')">Anggota Muda</button>
      <button class="tab-button text-gray-600 hover:text-blue-600 pb-2" onclick="openTab(event, 'lembaga')">Lembaga Lain</button>
    </div>

    <!-- Tab Contents -->
    <div id="aktif" class="tab-content">
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border">
          <thead class="bg-gray-100">
            <tr>
              <th class="px-4 py-2 border">Kode CX</th>
              <th class="px-4 py-2 border">Nama</th>
              <th class="px-4 py-2 border text-center">Sudah Memilih</th>
              <th class="px-4 py-2 border">Waktu</th>
            </tr>
          </thead>
          <tbody class="bg-white">
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-2 border">015-027</td>
              <td class="px-4 py-2 border">Keyfa Salsa Aulia</td>
              <td class="px-4 py-2 border text-center text-green-600 text-xl">✔</td>
              <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-2 border">015-027</td>
              <td class="px-4 py-2 border">Keyfa Salsa Aulia</td>
              <td class="px-4 py-2 border text-center text-green-600 text-xl">✔</td>
              <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-2 border">015-024</td>
              <td class="px-4 py-2 border">Jimmy Wira Arba'a</td>
              <td class="px-4 py-2 border text-center text-red-600 text-xl">✘</td>
              <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
            </tr>
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-2 border">015-024</td>
              <td class="px-4 py-2 border">Jimmy Wira Arba'a</td>
              <td class="px-4 py-2 border text-center text-red-600 text-xl">✘</td>
              <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div id="luar_biasa" class="tab-content hidden">
      <p>Belum ada data.</p>
    </div>

    <div id="muda" class="tab-content hidden">
      <p>Belum ada data.</p>
    </div>

    <div id="lembaga" class="tab-content hidden">
      <p>Belum ada data.</p>
    </div>

  </div>

  <!-- Script untuk Tab -->
  <script>
    function openTab(evt, tabName) {
      var i, tabcontent, tabbuttons;
      tabcontent = document.getElementsByClassName("tab-content");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.add("hidden");
      }
      tabbuttons = document.getElementsByClassName("tab-button");
      for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].classList.remove("text-blue-600", "border-b-2", "border-blue-600");
        tabbuttons[i].classList.add("text-gray-600");
      }
      document.getElementById(tabName).classList.remove("hidden");
      evt.currentTarget.classList.remove("text-gray-600");
      evt.currentTarget.classList.add("text-blue-600", "border-b-2", "border-blue-600");
    }
  </script>

</x-admin-layout>

