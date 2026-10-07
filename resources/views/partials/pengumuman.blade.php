{{-- Popup pengumuman (Admin Web > Pengumuman). Hanya tampil di beranda halaman pertama tanpa pencarian. --}}
@php
    $pengumumanPopup = ['kunci' => '', 'data' => []];

    if (function_exists('pengumuman') && in_array(request()->path(), ['/', ''], true) && empty($cari) && (int) request()->input('page', 1) <= 1) {
        $pengumumanPopup = pengumuman();
    }
@endphp

@if (count($pengumumanPopup['data']) > 0)
    <style>
        #pengumuman-popup {
            --pengumuman-aksen: var(--primary-base-color, #008BA9);
            --pengumuman-aksen-gelap: var(--primary-darken-color, #006A82);
            --pengumuman-kartu: #ffffff;
            --pengumuman-teks: #1f2937;
            --pengumuman-judul: #111827;
            --pengumuman-garis: #e5e7eb;
            --pengumuman-radius: 8px;
            position: fixed;
            inset: 0;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            font-family: inherit;
            line-height: 1.5;
        }

        #pengumuman-popup[hidden],
        #pengumuman-popup [hidden] {
            display: none !important;
        }

        #pengumuman-popup *,
        #pengumuman-popup *::before,
        #pengumuman-popup *::after {
            box-sizing: border-box;
        }

        #pengumuman-popup .pengumuman-latar {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .65);
        }

        #pengumuman-popup .pengumuman-kotak {
            position: relative;
            width: 100%;
            max-width: 640px;
            max-height: calc(100vh - 32px);
            overflow-y: auto;
            background: var(--pengumuman-kartu);
            color: var(--pengumuman-teks);
            border-top: 4px solid var(--pengumuman-aksen);
            border-radius: var(--pengumuman-radius);
            box-shadow: 0 20px 50px rgba(0, 0, 0, .35);
            animation: pengumuman-muncul .2s ease-out;
        }

        @keyframes pengumuman-muncul {
            from {
                opacity: 0;
                transform: scale(.96);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        #pengumuman-popup .pengumuman-tutup {
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 1;
            width: 34px;
            height: 34px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: rgba(0, 0, 0, .55);
            color: #fff;
            font-size: 22px;
            line-height: 34px;
            text-align: center;
            cursor: pointer;
        }

        #pengumuman-popup .pengumuman-tutup:hover,
        #pengumuman-popup .pengumuman-tutup:focus-visible {
            background: rgba(0, 0, 0, .8);
            outline: none;
        }

        #pengumuman-popup .pengumuman-gambar {
            display: block;
            width: 100%;
            height: auto;
            max-height: 70vh;
            object-fit: contain;
            background: rgba(0, 0, 0, .05);
        }

        #pengumuman-popup .pengumuman-isi {
            padding: 16px 20px 20px;
        }

        #pengumuman-popup .pengumuman-judul {
            margin: 0 0 8px;
            padding-right: 36px;
            color: var(--pengumuman-judul);
            font-size: 18px;
            font-weight: 700;
            line-height: 1.35;
        }

        #pengumuman-popup .pengumuman-slide.berisi-gambar .pengumuman-judul {
            padding-right: 0;
        }

        #pengumuman-popup .pengumuman-keterangan {
            margin: 0 0 12px;
            font-size: 15px;
            white-space: pre-line;
            overflow-wrap: anywhere;
        }

        #pengumuman-popup .pengumuman-tombol {
            display: inline-block;
            padding: 8px 16px;
            border-radius: var(--pengumuman-radius);
            background: var(--pengumuman-aksen);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        #pengumuman-popup .pengumuman-tombol:hover,
        #pengumuman-popup .pengumuman-tombol:focus-visible {
            background: var(--pengumuman-aksen-gelap);
            color: #fff;
        }

        #pengumuman-popup .pengumuman-navigasi {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            padding: 10px 20px;
            border-top: 1px solid var(--pengumuman-garis);
            font-size: 14px;
        }

        #pengumuman-popup .pengumuman-navigasi button {
            padding: 6px 12px;
            border: 1px solid var(--pengumuman-aksen);
            border-radius: var(--pengumuman-radius);
            background: transparent;
            color: var(--pengumuman-aksen);
            font-size: 14px;
            cursor: pointer;
        }

        #pengumuman-popup .pengumuman-navigasi button:hover,
        #pengumuman-popup .pengumuman-navigasi button:focus-visible {
            background: var(--pengumuman-aksen);
            color: #fff;
        }

        body.pengumuman-terbuka {
            overflow: hidden;
        }

        @media (prefers-reduced-motion: reduce) {
            #pengumuman-popup .pengumuman-kotak {
                animation: none;
            }
        }
    </style>

    <div id="pengumuman-popup" data-kunci="{{ $pengumumanPopup['kunci'] }}" role="dialog" aria-modal="true" aria-labelledby="pengumuman-judul-0" hidden>
        <div class="pengumuman-latar" data-tutup></div>
        <div class="pengumuman-kotak">
            <button type="button" class="pengumuman-tutup" data-tutup aria-label="Tutup pengumuman" title="Tutup">&times;</button>
            @foreach ($pengumumanPopup['data'] as $item)
                <div class="pengumuman-slide {{ $item['gambar'] ? 'berisi-gambar' : '' }}" data-slide @if (!$loop->first) hidden @endif>
                    @if ($item['gambar'])
                        @if ($item['tautan'])
                            <a href="{{ $item['tautan'] }}" target="_blank" rel="noopener noreferrer">
                                <img class="pengumuman-gambar" src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}">
                            </a>
                        @else
                            <img class="pengumuman-gambar" src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}">
                        @endif
                    @endif
                    <div class="pengumuman-isi">
                        <h2 class="pengumuman-judul" id="pengumuman-judul-{{ $loop->index }}">{{ $item['judul'] }}</h2>
                        @if ($item['keterangan'])
                            <p class="pengumuman-keterangan">{{ $item['keterangan'] }}</p>
                        @endif
                        @if ($item['tautan'] && $item['judul_tautan'])
                            <a class="pengumuman-tombol" href="{{ $item['tautan'] }}" target="_blank" rel="noopener noreferrer">{{ $item['judul_tautan'] }}</a>
                        @endif
                    </div>
                </div>
            @endforeach
            @if (count($pengumumanPopup['data']) > 1)
                <div class="pengumuman-navigasi">
                    <button type="button" data-sebelumnya aria-label="Pengumuman sebelumnya">&lsaquo; Sebelumnya</button>
                    <span data-posisi aria-live="polite">1 / {{ count($pengumumanPopup['data']) }}</span>
                    <button type="button" data-berikutnya aria-label="Pengumuman berikutnya">Berikutnya &rsaquo;</button>
                </div>
            @endif
        </div>
    </div>

    <script>
        (function() {
            'use strict';

            var popup = document.getElementById('pengumuman-popup');
            if (!popup) {
                return;
            }

            // Tampil sekali per sesi browser; muncul lagi jika isi pengumuman berubah.
            var kunci = 'pengumuman-popup-' + popup.getAttribute('data-kunci');

            function sudahDitutup() {
                try {
                    return window.sessionStorage.getItem(kunci) === '1';
                } catch (e) {
                    return false;
                }
            }

            function tandaiDitutup() {
                try {
                    window.sessionStorage.setItem(kunci, '1');
                } catch (e) {}
            }

            if (sudahDitutup()) {
                popup.parentNode.removeChild(popup);
                return;
            }

            var slides = popup.querySelectorAll('[data-slide]');
            var posisi = popup.querySelector('[data-posisi]');
            var aktif = 0;

            function tampilkan(index) {
                aktif = (index + slides.length) % slides.length;
                for (var i = 0; i < slides.length; i++) {
                    slides[i].hidden = i !== aktif;
                }
                popup.setAttribute('aria-labelledby', 'pengumuman-judul-' + aktif);
                if (posisi) {
                    posisi.textContent = (aktif + 1) + ' / ' + slides.length;
                }
            }

            function tekanTombol(event) {
                if (event.key === 'Escape' || event.key === 'Esc') {
                    tutup();
                } else if (slides.length > 1 && event.key === 'ArrowRight') {
                    tampilkan(aktif + 1);
                } else if (slides.length > 1 && event.key === 'ArrowLeft') {
                    tampilkan(aktif - 1);
                }
            }

            function tutup() {
                tandaiDitutup();
                popup.hidden = true;
                document.body.classList.remove('pengumuman-terbuka');
                document.removeEventListener('keydown', tekanTombol);
            }

            popup.addEventListener('click', function(event) {
                var target = event.target;
                if (target.closest('[data-tutup]')) {
                    tutup();
                } else if (target.closest('[data-sebelumnya]')) {
                    tampilkan(aktif - 1);
                } else if (target.closest('[data-berikutnya]')) {
                    tampilkan(aktif + 1);
                } else if (target.closest('a[href]')) {
                    tandaiDitutup();
                }
            });

            function buka() {
                document.addEventListener('keydown', tekanTombol);
                tampilkan(0);
                popup.hidden = false;
                document.body.classList.add('pengumuman-terbuka');
                popup.querySelector('.pengumuman-tutup').focus();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', buka);
            } else {
                buka();
            }
        })();
    </script>
@endif
