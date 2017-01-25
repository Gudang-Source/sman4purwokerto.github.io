<?php 
if(!isset($_SESSION)){session_start();}   error_reporting(0);
if (!isset($_SESSION['adminsh']))
{
	gogo('../../../../index.php');
	exit;
}
else{ 

function insertdata(){
global $DB_KODE;
		$namasekolah=mysql_query("SELECT * FROM ".$DB_KODE."_pengaturan WHERE id_pengaturan='8'");
		$ns=mysql_fetch_array($namasekolah);
							$judul=$ns['isi_pengaturan'];
						    $judul = strtolower(preg_replace("/\s/","-",$judul));
							$link='al-quran-on-line-'.$judul.'.html';
mysql_query ("INSERT INTO ".$DB_KODE."_menu (id_menu, menu_id, judul, url, urutan, status) VALUES
('', 0, 'Al-Quran', 'al-quran-on-line-.html', 10, 1);");
	mysql_query('SET collation_connection=utf8_unicode_ci');
mysql_query ("INSERT INTO ".$DB_KODE."_blok (id_blok, nama_blok, deskripsi_blok, link_blok, folder, posisi, isi_blok, menu_blok, status, urutan) VALUES
('', 'Al Qur`an', '', 0, 'kontenweb/blok/quran.php', 3, '', 0, 1, 100);");
mysql_query ("INSERT INTO  ".$DB_KODE."_case (id_case, nama_case, file_case, blok_case) VALUES
('', 'quran', 'eksternal/modul/quran.php', 1),
('', 'quran_surah', 'eksternal/modul/quran_surah.php', 1),
('', 'quran_cari', 'eksternal/modul/quran_cari.php', 1);");	

mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_quran (
  surano int(11) NOT NULL DEFAULT '0',
  sura varchar(250) NOT NULL,
  sura_ar varchar(50) NOT NULL,
  jml_ayat int(11) NOT NULL,
  juz int(11) NOT NULL,
  PRIMARY KEY (surano)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
mysql_query ("INSERT INTO  ".$DB_KODE."_quran (surano, sura, sura_ar, jml_ayat, juz) VALUES
(1, 'Al Fatihah', ' الفاتحة', 7, 1),
(2, 'Al Baqarah', ' البقرة', 286, 1),
(3, 'Ali Imran', ' آل عمران', 200, 2),
(4, 'An Nisaa', ' النساء', 176, 2),
(5, 'Al Maidah', ' المائدة', 120, 2),
(6, 'Al Anam', ' الأنعام', 165, 3),
(7, 'Al Araf', ' الأعراف', 206, 3),
(8, 'Al Anfaal', ' الأنفال', 75, 3),
(9, 'At Taubah', ' التوبة', 129, 3),
(10, 'Yunus', ' يونس', 109, 4),
(11, 'Huud', ' هود', 123, 4),
(12, 'Yusuf', ' يوسف', 111, 4),
(13, 'Ar Rad', ' الرعد', 43, 5),
(14, 'Ibrahim', ' إبراهيم', 52, 5),
(15, 'Al Hijr', ' الحجر', 99, 5),
(16, 'An Nahl', ' النحل', 128, 6),
(17, 'Al Israa', ' الإسراء', 111, 6),
(18, 'Al Kahfi', ' الكهف', 110, 6),
(19, 'Maryam', ' مريم', 98, 6),
(20, 'Thaahaa', ' طه', 135, 7),
(21, 'Al Anbiyaa', ' الأنبياء', 112, 7),
(22, 'Al Hajj', ' الحج', 78, 7),
(23, 'Al Muminuun', ' المؤمنون', 118, 8),
(24, 'An Nuur', ' النور', 64, 8),
(25, 'Al Furqaan', ' الفرقان', 77, 8),
(26, 'Asy Syuaraa', ' الشعراء', 227, 9),
(27, 'An Naml', ' النمل', 93, 9),
(28, 'Al Qashash', ' القصص', 88, 9),
(29, 'Al Ankabuut', ' العنكبوت', 69, 9),
(30, 'Ar Ruum', ' الروم', 60, 10),
(31, 'Luqman', ' لقمان', 34, 10),
(32, 'As Sajdah', ' السجدة', 30, 10),
(33, 'Al Ahzab', ' الأحزاب', 73, 11),
(34, 'Saba', ' سبأ', 54, 11),
(35, 'Faathir', ' فاطر', 45, 11),
(36, 'Yaa Siin', ' يس', 83, 12),
(37, 'Ash-Shaaffat', ' الصافات', 182, 12),
(38, 'Shaad', ' ص', 88, 12),
(39, 'Az-Zumar', ' الزمر', 75, 12),
(40, 'Al Mumin', ' غافر', 85, 13),
(41, 'Fush Shilat', ' فصلت', 54, 13),
(42, 'Asy Syuura', ' الشورى', 53, 13),
(43, 'Az Zukhruf', ' الزخرف', 89, 14),
(44, 'Ad Dukhaan', ' الدخان', 59, 14),
(45, 'Al Jaatsiyah', ' الجاثية', 37, 14),
(46, 'Al Ahqaaf', ' الأحقاف', 35, 15),
(47, 'Muhammad', ' محمد', 38, 15),
(48, 'Al Fat-h', ' الفتح', 29, 15),
(49, 'Al Hujuraat', ' الحجرات', 18, 15),
(50, 'Qaaf', ' ق', 45, 16),
(51, 'Adz-Dzaariya', ' الذاريات', 60, 16),
(52, 'Ath-Thuur', ' الطور', 49, 16),
(53, 'An-Najm', ' النجم', 62, 17),
(54, 'Al-Qamar', ' القمر', 55, 17),
(55, 'Ar Rahmaan', ' الرحمن', 78, 17),
(56, 'Al Waaqiah', ' الواقعة', 96, 18),
(57, 'Al Hadiid', ' الحديد', 29, 18),
(58, 'Al Mujaadila', ' المجادلة', 22, 18),
(59, 'Al Hasyr', ' الحشر', 24, 18),
(60, 'Al Mumtahana', ' الممتحنة', 13, 19),
(61, 'Ash-Shaff', ' الصف', 14, 19),
(62, 'Al Jumuah', ' الجمعة', 11, 19),
(63, 'Al Munaafiqu', ' المنافقون', 11, 20),
(64, 'At Taghaabun', ' التغابن', 18, 20),
(65, 'Ath Thalaaq', ' الطلاق', 12, 20),
(66, 'At Tahriim', ' التحريم', 12, 21),
(67, 'Al Mulk', ' الملك', 30, 21),
(68, 'Al Qalam', ' القلم', 52, 21),
(69, 'Al Haaqqah', ' الحاقة', 52, 21),
(70, 'Al Maaarij', ' المعارج', 44, 22),
(71, 'Nuh', ' نوح', 28, 22),
(72, 'Al Jin', ' الجن', 28, 22),
(73, 'Al Muzzammil', ' المزّمِّل', 20, 23),
(74, 'Al Muddatsts', ' المدّثر', 56, 23),
(75, 'Al Qiyaamah', ' القيامة', 40, 23),
(76, 'Al Insaan', ' الإنسان', 31, 24),
(77, 'Al Mursalaat', ' المرسلات', 50, 24),
(78, 'An-Naba', ' النبأ', 40, 24),
(79, 'An-Naaziaat', ' النازعات', 46, 24),
(80, 'Abasa', ' عبس', 42, 25),
(81, 'At-Takwiir', ' التكوير', 29, 25),
(82, 'Al Infithaar', ' الانفطار', 19, 25),
(83, 'Al Muthaffif', ' المطففين', 36, 26),
(84, 'Al Insyiqaaq', 'الانشقاق', 25, 26),
(85, 'Al Buruuj', ' البروج', 22, 26),
(86, 'Ath-Thaariq', ' الطارق', 17, 27),
(87, 'Al Alaa', ' الأعلى', 19, 27),
(88, 'Al Ghaasyiya', ' الغاشية', 26, 27),
(89, 'Al Fajr', ' الفجر', 30, 27),
(90, 'Al Balad', ' البلد', 20, 28),
(91, 'Asy-Syams', ' الشمس', 15, 28),
(92, 'Al Lail', ' الليل', 21, 28),
(93, 'Adh Dhuhaa', ' الضحى', 11, 29),
(94, 'Alam Nasyrah', ' الشرح', 8, 29),
(95, 'At Tiin', ' التين', 8, 29),
(96, 'Al Alaq', ' العلق', 19, 30),
(97, 'Al Qadr', ' القدر', 5, 30),
(98, 'Al Bayyinah', ' البينة', 8, 30),
(99, 'Az Zalzalah', ' الزلزلة', 8, 30),
(100, 'Al Aadiyaat', ' العاديات', 11, 30),
(101, 'Al Qaariah', ' القارعة', 11, 30),
(102, 'At-Takaatsur', ' التكاثر', 8, 30),
(103, 'Al Ashr', ' العصر', 3, 30),
(104, 'Al Humazah', ' الهُمَزَة', 9, 30),
(105, 'Al Fiil', ' الفيل', 5, 30),
(106, 'Quraisy', ' قريش', 4, 30),
(107, 'Al Maauun', ' الماعون', 7, 30),
(108, 'Al Kautsar', ' الكوثر', 3, 30),
(109, 'Al Kaafiruun', ' الكافرون', 6, 30),
(110, 'An-Nashr', ' النصر', 3, 30),
(111, 'Al-Lahab', ' المسد', 5, 30),
(112, 'Al Ikhlash', ' الإخلاص', 4, 30),
(113, 'Al Falaq', ' الفلق', 5, 30),
(114, 'An-Naas', ' الناس', 6, 30);");
mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_quran_ar (
  id_quran int(11) NOT NULL AUTO_INCREMENT,
  surano int(11) NOT NULL DEFAULT '0',
  ayatno int(3) NOT NULL DEFAULT '0',
  ayat_ar text NOT NULL,
  PRIMARY KEY (id_quran)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6237 ;");
mysql_query ("INSERT INTO  ".$DB_KODE."_quran_ar (id_quran, surano, ayatno, ayat_ar) VALUES
(1, 1, 1, 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيمِ '),
(2, 1, 2, '\r\nالْحَمْدُ للّهِ رَبِّ الْعَالَمِينَ '),
(3, 1, 3, '\r\nالرَّحْمـنِ الرَّحِيمِ '),
(4, 1, 4, ' مَالِكِ يَوْمِ الدِّينِ '),
(5, 1, 5, '\r\nإِيَّاكَ نَعْبُدُ وإِيَّاكَ نَسْتَعِينُ '),
(6, 1, 6, ' اهدِنَــــا\r\nالصِّرَاطَ المُستَقِيمَ '),
(7, 1, 7, ' صِرَاطَ الَّذِينَ أَنعَمتَ\r\nعَلَيهِمْ غَيرِ المَغضُوبِ عَلَيهِمْ\r\nوَلاَ الضَّالِّينَ ')");


mysql_query ("CREATE TABLE IF NOT EXISTS ".$DB_KODE."_quran_id (
  id_quran int(11) NOT NULL AUTO_INCREMENT,
  sura varchar(12) DEFAULT NULL,
  ayatno int(11) NOT NULL DEFAULT '0',
  surano int(3) NOT NULL DEFAULT '0',
  ayat_id text NOT NULL,
  PRIMARY KEY (id_quran)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6237 ;");



mysql_query ("INSERT INTO  ".$DB_KODE."_quran_id (id_quran, sura, ayatno, surano, ayat_id) VALUES
(1, 'Al Fatihah', 1, 1, '  \n1. Dengan menyebut nama Allah Yang Maha Pemurah lagi\nMaha Penyayang. [1]\n\n[1] Maksudnya: saya memulai membaca al-Fatihah ini dengan menyebut\nnama Allah. Setiap pekerjaan yang baik, hendaknya dimulai dengan\nmenyebut asma Allah, seperti makan, minum, menyembelih hewan dan\nsebagainya. Allah ialah nama zat yang Maha Suci, yang berhak\ndisembah dengan sebenar-benarnya, yang tidak membutuhkan makhluk-Nya,\ntapi makhluk yang membutuhkan-Nya. Ar Rahmaan (Maha Pemurah): salah\nsatu nama Allah yang memberi pengertian bahwa Allah melimpahkan\nkarunia-Nya kepada makhluk-Nya, sedang ar Rahiim (Maha Penyayang)\nmemberi pengertian bahwa Allah senantiasa bersifat rahmah yang\nmenyebabkan Dia selalu melimpahkan rahmat-Nya kepada makhluk-Nya.\n\n'),
(2, 'Al Fatihah', 2, 1, '  \r\n2. Segala puji [2] bagi Allah, Tuhan semesta alam. [3]\r\n\r\n[2] Alhamdu (segala puji). Memuji orang adalah karena perbuatan-\r\nnya yang baik yang dikerjakannya dengan kemauan sendiri. Maka\r\nmemuji Allah berrati: menyanjung-Nya karena perbuatanNya yang baik.\r\nLain halnya dengan syukur yang berarti: mengakui keutamaan\r\nseseorang terhadap ni''mat yang diberikannya. Kita menghadapkan\r\nsegala puji bagi Allah ialah karena Allah sumber dari segala\r\nkebaikan yang patut dipuji.\r\n\r\n[3] Rabb (Tuhan) berarti: Tuhan yang ditaati Yang Memiliki,\r\nMendidik dan Memelihara. Lafadz ”rabb” tidak dapat dipakai\r\nselain untuk Tuhan, kecuali kalau ada sambungannya, seperti\r\nrabbul bait (tuan rumah).\r\n''Alamiin (semesta alam): semua yang diciptakan Tuhan yang terdiri\r\ndari berbagai jenis dan macam, seperti: alam manusia,alam hewan, \r\nalam tumbuh-tumbuhan, benda-benda mati dan sebagainya. \r\nALlah pencipta semua alam-alam itu.\r\n\r\n'),
(3, 'Al Fatihah', 3, 1, '  \r\n3. Maha Pemurah lagi Maha Penyayang.\r\n\r\n'),
(4, 'Al Fatihah', 4, 1, '  \r\n4. Yang menguasai [4] di Hari Pembalasan [5]\r\n\r\n[4] Maalik (Yang Menguasai) dengan memanjangkan ”mim”,ia berarti:\r\npemilik. Dapat pula dibaca dengan ”Malik” (dengan memendekkan\r\nmim), artinya: Raja.\r\n\r\n[5] Yaumiddin (Hari Pembalasan): hari yang diwaktu itu\r\nmasing-masing manusia menerima pembalasan amalannya yang baik\r\nmaupun yang buruk. Yaumiddin disebut juga yaumulqiyaamah, yaumul-\r\nhisaab, yaumuljazaa'' dan sebagainya.\r\n\r\n'),
(5, 'Al Fatihah', 5, 1, '  \r\n5. Hanya Engkaulah yang kami sembah [6], dan hanya kepada\r\nEngkaulah kami meminta pertolongan. [7]\r\n\r\n[6] Na''budu diambil dari kata ''ibaadat: kepatuhan dan\r\nketundukkan yang ditimbulkan oleh perasaan terhadap kebesaran\r\nALlah, sebagai Tuhan yang disembah, karena berkeyakinan bahwa\r\nAllah mempunyai kekuasaan yang mutlak terhadapnya.\r\n\r\n[7] Nasta''iin (minta pertolongan), terambil dari kata\r\nisti''aanah: mengharapkan bantuan untuk dapat menyelesaikan\r\nsuatu pekerjaan yang tidak sanggup dikerjakan dengan tenaga sendiri.\r\n\r\n'),
(6, 'Al Fatihah', 6, 1, '  \r\n6. Tunjukilah [8] kami jalan yang lurus,\r\n\r\n[8] Ihdina (tunjukilah kami), dari kata ”hidayaat”: memberi\r\npetunjuk ke suatu jalan yang benar. Yang dimaksud dengan ayat ini\r\nbukan sekedar memberi hidayah saja, tetapi juga memberi taufik.\r\n\r\n'),
(7, 'Al Fatihah', 7, 1, '  \r\n7. (yaitu) Jalan orang-orang yang telah Engkau beri ni''mat kepada\r\nmereka; bukan (jalan) mereka yang dimurkai dan bukan \r\n(pula jalan) mereka yang sesat. [9]\r\n\r\n[9] Yang dimaksud dengan ”mereka yang dimurkai” dan ”mereka\r\nyang sesat” ialah semua golongan yang menyimpang dari ajaran\r\nIslam.\r\n\r\n')");
}

function insertcontoh(){
global $DB_KODE;
mysql_query ("");
mysql_query ("");
}

function deletedata(){
global $DB_KODE;
mysql_query ("TRUNCATE TABLE ".$DB_KODE."_quran");
mysql_query ("TRUNCATE TABLE ".$DB_KODE."_quran_ar");
mysql_query ("TRUNCATE TABLE ".$DB_KODE."_quran_id");
mysql_query ("DELETE FROM ".$DB_KODE."_menu WHERE judul ='Al-Quran'");
mysql_query ("DELETE FROM ".$DB_KODE."_blok WHERE nama_blok ='Al Qur`an'");
mysql_query ("DELETE FROM ".$DB_KODE."_case WHERE nama_case ='quran'");
mysql_query ("DELETE FROM ".$DB_KODE."_case WHERE nama_case ='quran_surah'");
mysql_query ("DELETE FROM ".$DB_KODE."_case WHERE nama_case ='quran_cari'");
}


}


?>