// 1. VARIABEL PENYIMPAN SKOR
let skorPemain = 0;
let skorKomputer = 0;

let GameOver = false;

// Kamus Emoji agar teks pilihan otomatis berubah jadi bentuk emoji
const daftarEmoji = {
  batu: '✊',
  gunting: '✌️',
  kertas: '🖐️',
}


function main(pilihanPemain) {

  if (GameOver) {
    return; // Jika permainan sudah selesai, hentikan fungsi main 
  }

  
  // A. Komputer Memilih Secara Acak
  const daftarOpsi = ['batu', 'gunting', 'kertas'];
  const indeksAcak = Math.floor(Math.random() * 3);
  const pilihanKomputer = daftarOpsi[indeksAcak];

  // B. Tampilkan Emoji Pilihan di Layar (DOM)
  document.getElementById('pilihan-pemain').innerText = daftarEmoji[pilihanPemain];
  document.getElementById('pilihan-komputer').innerText = daftarEmoji[pilihanKomputer];

// C. Menentukan Pemenang
  let hasil = '';


  if (pilihanPemain === pilihanKomputer) {
    hasil = 'SERI! 🤝';

  } else if (
    (pilihanPemain === 'batu' && pilihanKomputer === 'gunting') ||
    (pilihanPemain === 'gunting' && pilihanKomputer === 'kertas') ||
    (pilihanPemain === 'kertas' && pilihanKomputer === 'batu') 
  ) {

    hasil = 'KAMU MENANG! 🎉';
    skorPemain++; // Tambah skor pemain sebesar 1
    }
  
    else {
    hasil = 'KOMPUTER MENANG! 🤖';
    skorKomputer++; // Tambah skor komputer sebesar 1
  }

  if (skorPemain >= 5) {
    hasil = 'KAMU JUARA! 🎉🏆';
    GameOver = true;
  }


  else if (skorKomputer >= 5) {
     hasil = 'KOMPUTER JUARA! 🤖🏆';
     GameOver = true;
  }

  // D. Update Tampilan Hasil dan Skor di Layar
  document.getElementById('teks-hasil').innerText = hasil;
  document.getElementById('skor-pemain').innerText = skorPemain;
  document.getElementById('skor-komputer').innerText = skorKomputer;
}

// Tombol reset skor
function resetSkor() {
  skorPemain = 0;
  skorKomputer = 0;

  GameOver = false;

  document.getElementById('skor-pemain').innerText = skorPemain;
  document.getElementById('skor-komputer').innerText = skorKomputer;
  document.getElementById('pilihan-pemain').innerText = '❓';
  document.getElementById('pilihan-komputer').innerText = '❓';
  document.getElementById('teks-hasil').innerText = 'SKOR TELAH DI-RESET! 🔄';
}