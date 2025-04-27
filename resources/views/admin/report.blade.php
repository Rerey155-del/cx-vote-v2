<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voters</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<x-admin-layout title="Report">
    <div class="flex flex-col-2 mb-4">
        <button type="button"
            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <img src="../img/print.svg" alt="" class="me-2">
            Print Report
        </button>

        <button type="button"
            class="text-white bg-[#00E217] hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 mb-2 dark:bg-[#00E217] dark:hover:bg-green-600 dark:focus:ring-green-800">
            <img src="../img/view.svg" alt="" class="me-2">
            View Report
        </button>

    </div>
    <div class=" mx-auto bg-white p-6 rounded-xl shadow-md">
        <!-- Tab Contents -->
        <div class="tab-content">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Status/Lembaga</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">015-027</td>
                            <td class="px-4 py-2 border">Keyfa Salsa Aulia</td>

                            <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">015-027</td>
                            <td class="px-4 py-2 border">Keyfa Salsa Aulia</td>

                            <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">015-024</td>
                            <td class="px-4 py-2 border">Jimmy Wira Arba'a</td>

                            <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">015-024</td>
                            <td class="px-4 py-2 border">Jimmy Wira Arba'a</td>

                            <td class="px-4 py-2 border">Kamis, 29 April 2024 08:00:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
