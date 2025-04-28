<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 p-6 space-y-4">
        <div class="text-center">
            <h1 class="text-2xl font-bold">Real Count</h1>
            <p class="text-gray-500 mt-6">Ini adalah perhitungan yang sebenarnya, bijaklah dalam menerima informasi ini.
            </p>
        </div>

        <div id="candidates" class="flex flex-wrap justify-center gap-10 opacity-50 pointer-events-none">
            @foreach ($candidates as $candidate)
                <div class="bg-white rounded-3xl shadow-lg p-8 w-96 flex flex-col items-center">
                    <div class="w-full h-80 rounded-xl overflow-hidden flex items-center justify-center">
                        <img src="{{ url('storage/' . $candidate->image) }}" alt="Calon {{ $candidate->nomor_urut }}"
                            class="object-cover object-center" />
                    </div>
                    <h2 class="text-2xl font-semibold mt-4">{{ strtok($candidate->ketua_name, ' ') }} -
                        {{ strtok($candidate->wakil_name, ' ') }}</h2>
                    <p class="mt-2">Candidate {{ $candidate->nomor_urut }}</p>
                    <p id="count-{{ $candidate->id }}" class="text-5xl font-bold mt-2">0</p>
                </div>
            @endforeach

            <div id="total-suara"
                class="bg-white rounded-3xl shadow-lg py-8 w-full text-center mt-6 mb-2 opacity-50 pointer-events-none">
                <p class="font-semibold text-2xl">Jumlah Suara:
                    <span id="total-count" class="text-red-600">0</span> suara
                </p>
            </div>
        </div>



        <div id="start-button"
            class="justify-center items-center px-10 py-4 bg-orange-500 rounded-3xl cursor-pointer mt-6">
            <span class="text-white font-bold">Mulai</span>
        </div>
    </div>

    <audio id="drum-sound" src="{{ asset('sound/Drum roll sound effect .mp3') }}"></audio>
    <audio id="champion-sound" src="{{ asset('sound/Queen - We Are The Champions.mp3') }}"></audio>
    <audio id="confetti-sound" src="{{ asset('sound/Confetti.mp3') }}"></audio>

    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const drumSound = document.getElementById('drum-sound');
                const championSound = document.getElementById('champion-sound');
                const confettiSound = document.getElementById('confetti-sound');
                const startButton = document.getElementById('start-button');

                const waktu_jeda = 5;

                // Debugging: Tampilkan data sebelum diproses
                const rawCandidates = @json($candidates);
                console.log('Data kandidat dari server:', rawCandidates);

                // Pastikan data terformat dengan benar
                const candidates = rawCandidates.map(candidate => {
                    if (!candidate.pencoblosans) {
                        candidate.pencoblosans = [];
                    }
                    return candidate;
                });

                startButton.addEventListener('click', () => {
                    if (!candidates || candidates.length === 0) {
                        alert('Tidak ada data kandidat.');
                        return;
                    }

                    // Mainkan drum sound saat mulai
                    drumSound.play();

                    // Hapus opacity dari elemen
                    document.getElementById('candidates').classList.remove('opacity-50', 'pointer-events-none');
                    document.getElementById('total-suara').classList.remove('opacity-50',
                        'pointer-events-none');

                    // Hitung total suara dengan aman
                    let totalVotes = 0;

                    candidates.forEach(candidate => {
                        if (candidate && candidate.id) {
                            const voteCount = parseInt(candidate.pencoblosans.length || 0);
                            console.log(`Kandidat ID ${candidate.id}: ${voteCount} suara`);
                            totalVotes += voteCount;

                            // Animasi hitung naik
                            try {
                                const countUp = new CountUp(`count-${candidate.id}`, 0, voteCount, 0,
                                    1);

                                if (!countUp.error) {
                                    countUp.start();
                                } else {
                                    console.error(`Error CountUp untuk kandidat ${candidate.id}:`,
                                        countUp.error);
                                    document.getElementById(`count-${candidate.id}`).textContent =
                                        voteCount;
                                }
                            } catch (e) {
                                console.error(`Error saat memproses kandidat ${candidate.id}:`, e);
                                document.getElementById(`count-${candidate.id}`).textContent =
                                    voteCount;
                            }
                        }
                    });

                    console.log(`Total suara: ${totalVotes}`);

                    // Animasi total suara
                    try {
                        const totalCountUp = new CountUp('total-count', 0, totalVotes, 0, 2);
                        if (!totalCountUp.error) {
                            totalCountUp.start();
                        } else {
                            console.error('Error CountUp untuk total:', totalCountUp.error);
                            document.getElementById('total-count').textContent = totalVotes;
                        }
                    } catch (e) {
                        console.error('Error saat memproses total:', e);
                        document.getElementById('total-count').textContent = totalVotes;
                    }

                    setTimeout(() => {
                        // Cari pemenang dengan aman
                        let isDraw = false;
                        let winner = candidates[0];
                        let maxVotes = winner.pencoblosans.length || 0;

                        candidates.forEach(candidate => {
                            const votes = candidate.pencoblosans.length || 0;
                            if (votes > maxVotes) {
                                maxVotes = votes;
                                winner = candidate;
                                isDraw = false; // Reset jika ada pemenang baru
                            } else if (votes === maxVotes) {
                                isDraw = true; // Tandai jika ada hasil imbang
                            }
                        });

                        if (isDraw) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                html: `Hasil Suara Seimbang`,
                                confirmButtonText: 'Oke'
                            });
                            return; // Hentikan proses jika ada hasil imbang
                        }

                        // Hentikan drum sound setelah beberapa detik
                        setTimeout(() => {
                            drumSound.pause();
                            drumSound.currentTime = 0; // Reset drum sound
                            championSound.play();
                            confettiSound.play();

                            // Efek confetti
                            let confettiCanvas = document.createElement('canvas');
                            confettiCanvas.id = 'my-confetti-canvas';
                            confettiCanvas.style.position = 'fixed';
                            confettiCanvas.style.top = '0';
                            confettiCanvas.style.left = '0';
                            confettiCanvas.style.width = '100%';
                            confettiCanvas.style.height = '100%';
                            confettiCanvas.style.pointerEvents = 'none';
                            confettiCanvas.style.zIndex = '9999';
                            document.body.appendChild(confettiCanvas);

                            const myConfetti = confetti.create(confettiCanvas, {
                                resize: true,
                                useWorker: true
                            });

                            myConfetti({
                                particleCount: 300,
                                spread: 100,
                                origin: {
                                    y: 0.6
                                }
                            });

                            setTimeout(() => {
                                confettiCanvas.remove();
                            }, 3000);

                            // Tampilkan hasil
                            Swal.fire({
                                title: 'Pemenang!',
                                html: `<b>Candidat ${winner.nomor_urut}</b><br><br><strong>${winner.ketua_name} & ${winner.wakil_name}</strong><br> dengan total ${maxVotes} suara.`,
                                imageUrl: '/storage/' + winner
                                    .image, // URL gambar pemenang
                                imageHeight: 200,
                                confirmButtonText: 'Oke'
                            });

                        }, 1000); // Tunggu 1 detik setelah drum berhenti

                    }, 5000); // Tunggu 5 detik sebelum berhenti drum dan memainkan suara lainnya

                    startButton.classList.add('hidden');
                });
            });
        </script>
    @endsection
</x-app-layout>
