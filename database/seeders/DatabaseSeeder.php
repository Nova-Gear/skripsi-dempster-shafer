<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // insert dummy user data
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'gambar' => null,
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'user',
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('user'),
                'gambar' => null,
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'test',
                'name' => 'Jane Doe',
                'email' => 'janedoe@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('user'),
                'gambar' => null,
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $sql = "
        INSERT INTO `gejala` (`id`, `kode_gejala`, `gejala`, `created_at`, `updated_at`) VALUES
        (4, 'G1', 'Demam', '2023-05-15 13:06:46', '2023-05-15 16:09:50'),
        (5, 'G2', 'Menggigil', '2023-05-15 13:07:00', '2023-05-15 13:07:00'),
        (6, 'G3', 'Nyeri perut bagian bawah', '2023-05-15 13:07:16', '2023-05-15 13:07:16'),
        (7, 'G4', 'Nyeri saat buang air kecil', '2023-05-15 13:07:27', '2023-05-15 13:07:27'),
        (8, 'G5', 'Urin keruh dan berdarah', '2023-05-15 13:07:37', '2023-05-15 13:07:37'),
        (9, 'G6', 'Sembelit', '2023-05-15 13:07:50', '2023-05-15 13:07:50'),
        (10, 'G7', 'Mual', '2023-05-15 13:08:03', '2023-05-15 13:08:03'),
        (11, 'G8', 'Muntah', '2023-05-15 13:08:17', '2023-05-15 13:08:17'),
        (12, 'G9', 'Diare', '2023-05-15 13:08:26', '2023-05-15 13:08:26'),
        (13, 'G10', 'Lochia berbau', '2023-05-15 13:08:37', '2023-05-15 13:08:37'),
        (14, 'G11', 'Payudara membengkaK', '2023-05-15 13:08:54', '2023-05-15 13:08:54'),
        (15, 'G12', 'Muncul benjolan pada payudara', '2023-05-15 13:09:09', '2023-05-15 13:09:09'),
        (16, 'G13', 'Payudara memera', '2023-05-15 13:09:19', '2023-05-15 13:09:19'),
        (17, 'G14', 'Payudara gatal', '2023-05-15 13:09:29', '2023-05-15 13:09:29'),
        (18, 'G15', 'Keluar nanah pada payudara', '2023-05-15 13:09:42', '2023-05-15 13:09:42'),
        (19, 'G16', 'Nyeri payudara', '2023-05-15 13:09:57', '2023-05-15 13:09:57'),
        (20, 'G17', 'Mudah lelah', '2023-05-15 13:10:09', '2023-05-15 13:10:09'),
        (21, 'G18', 'Air seni berbau tak sedap', '2023-05-15 13:10:20', '2023-05-15 13:10:20'),
        (22, 'G19', 'Sakit punggung', '2023-05-15 13:10:32', '2023-05-15 13:10:32'),
        (23, 'G20', 'Sering buang air kecil', '2023-05-15 13:10:43', '2023-05-15 13:10:43'),
        (24, 'G21', 'Keputihan berbau', '2023-05-15 13:10:53', '2023-05-15 13:10:53'),
        (25, 'G22', 'Pembengkakan pada kaki', '2023-05-15 13:11:02', '2023-05-15 13:11:02'),
        (26, 'G23', 'Penonjolan pembuluh darah di  permukaan kulit', '2023-05-15 13:11:15', '2023-05-15 13:11:15'),
        (27, 'G24', 'Nyeri dada', '2023-05-15 13:11:26', '2023-05-15 13:11:26'),
        (28, 'G25', 'Sesak napas', '2023-05-15 13:11:36', '2023-05-15 13:11:36'),
        (29, 'G26', 'Batuk berdarah', '2023-05-15 13:11:48', '2023-05-15 13:16:47'),
        (30, 'G27', 'Pusing', '2023-05-15 13:12:00', '2023-05-15 13:12:00'),
        (31, 'G28', 'Penglihatan kabur', '2023-05-15 13:12:11', '2023-05-15 13:12:11'),
        (32, 'G29', 'Detak jantung cepat', '2023-05-15 13:12:21', '2023-05-15 13:12:21'),
        (33, 'G30', 'Kulit terlihat pucat', '2023-05-15 13:12:33', '2023-05-15 13:12:33'),
        (34, 'G31', 'Lemas', '2023-05-15 13:12:44', '2023-05-15 13:12:44'),
        (35, 'G32', 'Keluarnya darah yang berlebihan dari  vagina', '2023-05-15 13:12:54', '2023-05-15 13:12:54'),
        (36, 'G33', 'Keringat dingin', '2023-05-15 13:13:02', '2023-05-15 13:13:02'),
        (37, 'G34', 'Menangis tanpa alasan', '2023-05-15 13:13:13', '2023-05-15 13:13:13'),
        (38, 'G35', 'Mudah marah', '2023-05-15 13:13:22', '2023-05-15 13:13:22'),
        (39, 'G36', 'Gelisah', '2023-05-15 13:13:33', '2023-05-15 13:13:33'),
        (40, 'G37', 'Insomnia', '2023-05-15 13:13:48', '2023-05-15 13:13:48'),
        (41, 'G38', 'Kesedihan', '2023-05-15 13:13:58', '2023-05-15 13:13:58'),
        (42, 'G39', 'Sulit konsentrasi', '2023-05-15 13:14:10', '2023-05-15 13:14:10'),
        (43, 'G40', 'Mimpi buruk', '2023-05-15 13:14:19', '2023-05-15 13:14:19'),
        (44, 'G41', 'Fobia', '2023-05-15 13:14:29', '2023-05-15 13:14:29'),
        (45, 'G42', 'Kecemasan', '2023-05-15 13:14:39', '2023-05-15 13:14:39'),
        (46, 'G43', 'Meningkatnya sensitivitas', '2023-05-15 13:14:57', '2023-05-15 13:14:57'),
        (47, 'G44', 'Perubahan mood', '2023-05-15 13:15:06', '2023-05-15 13:15:06'),
        (48, 'G45', 'Euforia', '2023-05-15 13:15:17', '2023-05-15 13:15:17'),
        (49, 'G46', 'Overaktif', '2023-05-15 13:15:27', '2023-05-15 13:15:27'),
        (50, 'G47', 'Mudah tersinggung', '2023-05-15 13:15:37', '2023-05-15 13:15:37'),
        (51, 'G48', 'Melakukan kekerasan', '2023-05-15 13:15:50', '2023-05-15 13:16:34'),
        (52, 'G49', 'Delusi', '2023-05-15 13:16:01', '2023-05-15 13:16:01'),
        (53, 'G50', 'Halusinasi', '2023-05-15 13:16:11', '2023-05-15 13:16:11');
        ";
        DB::statement($sql);
        
        $sql = "
        INSERT INTO `penyakit` (`id`, `kode_penyakit`, `penyakit`, `solusi`, `deskripsi`, `created_at`, `updated_at`) VALUES
        (3, 'P1', 'Endometritis', 'Minum antibiotik', 'Endometritis didefinisikan sebagai infeksi pada lapisan endometrium uterus. Infeksi ini dapat meluas hingga melibatkan miometrium dan parametrium.', '2023-05-15 13:17:45', '2023-05-16 07:38:18'),
        (4, 'P2', 'Metritis', 'Silahkan datang ke tempat praktik untuk penanganan lebih lanjut', 'Metritis adalah infeksi uterus setelah persalinan. Penyakit ini tidak berdiri sendiri dan merupakan bagian dari infeksi yang lebih luas.', '2023-05-15 13:18:13', '2023-05-16 07:41:14'),
        (5, 'P3', 'Mastitis', 'Berikan kompres hangat pada area payudara yang mengalami infeksi untuk meredakan nyeri. Lakukan selama 15 menit, sebanyak 4 kali sehari. Konsumsi obat pereda nyeri, seperti iburofen dan paracetamol, untuk membantu meredakan nyeri. Perbanyak istirahat dan minum cairan. Konsumsi makanan sehat dan mengandung nutrisi yang seimbang.', 'Mastitis atau infeksi payudara adalah peradangan di jaringan payudara. Kondisi ini umumnya terjadi pada ibu menyusui, terutama pada 6–12 minggu pertama setelah persalinan.', '2023-05-15 13:18:31', '2023-05-16 07:42:25'),
        (6, 'P4', 'Abses Payudara', 'Selalu mencuci tangan sebelum menyusui, untuk menghindari kemungkinan penyebaran bakteri. Memastikan puting dan bagian kecoklatan di sekitarnya (areola) menempel sempurna dengan mulut anak saat menyusui. Menyusui dengan kedua payudara secara bergantian dan tidak dalam posisi menyusui yang sama terus-menerus', 'benjolan di payudara yang berisi nanah. Kondisi yang disebut juga dengan bisul payudara ini biasanya disebabkan oleh infeksi, dan sering dialami oleh ibu menyusui.', '2023-05-15 13:19:08', '2023-05-16 07:43:32'),
        (7, 'P5', 'ISK', 'Infeksi saluran kemih awal dapat diobati dengan ampisillin (250 mg empat kali sehari) atau nitrofurantoin (100 mg per oral empat kali sehari). Gantilah dengan obat lain sesuai dengan hasil pemeriksaan laboratorium tetapi obati selama 2 minggu.', 'Infeksi saluran kemih (ISK) adalah infeksi bakteri yang terjadi pada saluran kemih.', '2023-05-15 13:19:31', '2023-05-16 07:45:11'),
        (8, 'P6', 'Thromboplebitis', 'Aktif bergerak. Berjalan setidaknya 1 jam sekali jika memiliki pekerjaan yang mengharuskan duduk lama. Menghindari penggunaan pakaian ketat. Mengonsumsi air putih yang cukup agar terhindar dari dehidrasi', 'Tromboflebitis adalah peradangan pada pembuluh darah balik (vena) yang memicu terbentuknya gumpalan darah pada satu vena atau lebih. Umumnya, tromboflebitis terjadi pada vena di kaki, tetapi tidak menutup kemungkinan kondisi ini juga bisa terjadi pada vena di lengan.', '2023-05-15 13:19:52', '2023-05-16 07:47:07'),
        (9, 'P7', 'Perdarahan postpartum', 'Minum suplemen zat besi dapat mengurangi kemungkinan perlunya tranfusi darah jika Anda memiliki perdarahan postpartum atau setelah melahirkan.', 'Perdarahan postpartum atau postpartum hemoragik adalah perdarahan berlebihan yang terjadi pascapersalinan. Selain menandakan ada yang tidak normal pada tubuh, perdarahan setelah melahirkan ini juga berisiko fatal hingga mengancam nyawa ibu.', '2023-05-15 13:20:13', '2023-05-16 07:49:12'),
        (10, 'P8', 'Baby blues', 'Bicarakan kekhawatiran Anda. Lepas stres. Ikut tidur saat bayi Anda tidur. Sempatkan olahraga', 'Baby blues syndrome atau sindrom baby blues adalah perubahan suasana hati setelah kelahiran yang bisa membuat ibu merasa terharu, cemas, hingga mudah tersinggung. Sindrom blues disebut juga sebagai postpartum blues yang biasanya dialami oleh sekitar 80 persen atau 4-5 ibu baru. Kondisi ini dapat membuat ibu jadi tidak sabaran, mudah marah, khawatir dengan masalah ibu menyusui, hingga khawatir dengan kesehatan bayi.', '2023-05-15 13:20:41', '2023-05-16 07:51:42'),
        (11, 'P9', 'Postpartum depression', 'Penanganan terhadap postpartum depression dapat dilakukan melalui konseling.', 'Postpartum depression adalah bentuk depresi yang dapat muncul dalam rentang waktu sejak masa kehamilan hingga setahun setelah kelahiran anak. Istilah ini biasanya digunakan untuk menggambarkan keluhan pada wanita atau ibu yang bersalin. Namun ternyata kondisi bisa terjadi pada setiap orang tua, baik ibu maupun ayah, bahkan pada orang tua adopsi.', '2023-05-15 13:20:58', '2023-05-16 07:52:56'),
        (12, 'P10', 'Puerperal psychosis', 'Terapi psikologis', 'Psikosis postpartum adalah penyakit mental serius yang kerap dialami ibu dalam beberapa hari atau minggu usai persalinan. Masalah mental yang satu ini dapat berkembang secara tiba-tiba bahkan hanya dalam beberapa jam sekali pun ibu belum pernah mengalami penyakit mental. Biasanya, ibu dengan masalah mental ini dapat mengalami gejala selama beberapa minggu atau lebih sehingga perlu penanganan segera.', '2023-05-15 13:21:14', '2023-05-16 07:55:47');
        ";
        DB::statement($sql);

        // Fetch all records from the 'penyakit' table
        $records = DB::table('penyakit')->select('id', 'solusi')->get();

        // Iterate over each record and convert the 'solusi' column to JSON
        foreach ($records as $record) {
            $solusi = $record->solusi;
            $solusiJson = json_encode([$solusi]);

            // Update the 'solusi' column with the JSON value
            DB::table('penyakit')->where('id', $record->id)->update(['solusi' => $solusiJson]);
        }

        
        $sql = "
        INSERT INTO `basis_pengetahuan` (`id`, `kode_penyakit`, `kode_gejala`, `densitas`, `created_at`, `updated_at`) VALUES
        (5, 'P1', 'G1', '0.80', '2023-05-15 06:21:55', '2023-05-15 06:21:55'),
        (6, 'P1', 'G3', '0.70', '2023-05-15 06:23:50', '2023-05-15 06:23:50'),
        (7, 'P1', 'G5', '0.50', '2023-05-15 06:24:09', '2023-05-15 06:24:09'),
        (8, 'P1', 'G10', '0.40', '2023-05-15 06:24:23', '2023-05-15 06:24:23'),
        (9, 'P2', 'G1', '0.70', '2023-05-15 06:24:39', '2023-05-15 06:24:39'),
        (10, 'P2', 'G2', '0.60', '2023-05-15 06:24:53', '2023-05-15 06:24:53'),
        (11, 'P2', 'G3', '0.40', '2023-05-15 06:25:09', '2023-05-15 06:25:09'),
        (12, 'P2', 'G10', '0.70', '2023-05-15 06:25:28', '2023-05-15 06:25:28'),
        (13, 'P3', 'G1', '0.80', '2023-05-15 06:26:33', '2023-05-15 06:26:33'),
        (14, 'P3', 'G2', '0.40', '2023-05-15 06:26:49', '2023-05-15 06:26:49'),
        (15, 'P3', 'G7', '0.40', '2023-05-15 06:27:15', '2023-05-15 06:27:15'),
        (16, 'P3', 'G12', '0.60', '2023-05-15 06:27:34', '2023-05-15 06:27:34'),
        (17, 'P3', 'G14', '0.70', '2023-05-15 06:27:57', '2023-05-15 06:27:57'),
        (18, 'P3', 'G15', '0.70', '2023-05-15 06:28:11', '2023-05-15 06:28:11'),
        (19, 'P3', 'G17', '0.60', '2023-05-15 06:28:28', '2023-05-15 06:28:28'),
        (20, 'P3', 'G42', '0.20', '2023-05-15 06:28:46', '2023-05-15 06:28:46'),
        (21, 'P4', 'G1', '0.60', '2023-05-15 06:29:14', '2023-05-15 06:29:14'),
        (22, 'P4', 'G12', '0.80', '2023-05-15 06:29:31', '2023-05-15 06:29:31'),
        (23, 'P4', 'G13', '0.60', '2023-05-15 06:29:46', '2023-05-15 06:29:46'),
        (24, 'P4', 'G14', '0.90', '2023-05-15 06:30:05', '2023-05-15 06:30:05'),
        (25, 'P4', 'G15', '0.60', '2023-05-15 06:30:22', '2023-05-15 06:30:22'),
        (26, 'P4', 'G16', '0.60', '2023-05-15 06:30:41', '2023-05-15 06:30:41'),
        (27, 'P5', 'G1', '0.50', '2023-05-15 06:31:04', '2023-05-15 06:31:04'),
        (28, 'P5', 'G4', '0.90', '2023-05-15 06:31:19', '2023-05-15 06:31:19'),
        (29, 'P5', 'G5', '0.80', '2023-05-15 06:31:37', '2023-05-15 06:31:37'),
        (30, 'P6', 'G22', '0.60', '2023-05-16 07:28:12', '2023-05-16 07:28:12'),
        (31, 'P6', 'G23', '0.70', '2023-05-16 07:28:29', '2023-05-16 07:28:29'),
        (32, 'P6', 'G24', '0.60', '2023-05-16 07:28:44', '2023-05-16 07:28:44'),
        (33, 'P6', 'G25', '0.70', '2023-05-16 07:29:01', '2023-05-16 07:29:01'),
        (34, 'P6', 'G26', '0.40', '2023-05-16 07:29:15', '2023-05-16 07:29:15'),
        (35, 'P7', 'G1', '0.90', '2023-05-16 07:29:32', '2023-05-16 07:29:32'),
        (36, 'P7', 'G3', '0.80', '2023-05-16 07:29:49', '2023-05-16 07:29:49'),
        (37, 'P7', 'G27', '0.90', '2023-05-16 07:30:04', '2023-05-16 07:30:04'),
        (38, 'P7', 'G28', '0.80', '2023-05-16 07:30:18', '2023-05-16 07:30:18'),
        (39, 'P7', 'G29', '0.70', '2023-05-16 07:30:41', '2023-05-16 07:30:41'),
        (40, 'P7', 'G32', '0.90', '2023-05-16 07:30:56', '2023-05-16 07:30:56'),
        (41, 'P7', 'G33', '0.70', '2023-05-16 07:31:16', '2023-05-16 07:31:16');
        ";
        $sql = "INSERT INTO `basis_pengetahuan` (`kode_penyakit`, `kode_gejala`, `densitas`, `created_at`, `updated_at`) VALUES 
        ('P1', 'G1', 0.8, NOW(), NOW()),
        ('P1', 'G3', 0.7, NOW(), NOW()),
        ('P1', 'G5', 0.5, NOW(), NOW()),
        ('P1', 'G10', 0.4, NOW(), NOW()),
        ('P2', 'G1', 0.7, NOW(), NOW()),
        ('P2', 'G2', 0.6, NOW(), NOW()),
        ('P2', 'G3', 0.4, NOW(), NOW()),
        ('P2', 'G10', 0.7, NOW(), NOW()),
        ('P3', 'G1', 0.8, NOW(), NOW()),
        ('P3', 'G2', 0.4, NOW(), NOW()),
        ('P3', 'G7', 0.4, NOW(), NOW()),
        ('P3', 'G12', 0.6, NOW(), NOW()),
        ('P3', 'G14', 0.7, NOW(), NOW()),
        ('P3', 'G15', 0.7, NOW(), NOW()),
        ('P3', 'G17', 0.6, NOW(), NOW()),
        ('P3', 'G42', 0.2, NOW(), NOW()),
        ('P4', 'G1', 0.6, NOW(), NOW()),
        ('P4', 'G12', 0.8, NOW(), NOW()),
        ('P4', 'G13', 0.6, NOW(), NOW()),
        ('P4', 'G14', 0.9, NOW(), NOW()),
        ('P4', 'G15', 0.6, NOW(), NOW()),
        ('P4', 'G16', 0.6, NOW(), NOW()),
        ('P5', 'G1', 0.5, NOW(), NOW()),
        ('P5', 'G4', 0.9, NOW(), NOW()),
        ('P5', 'G5', 0.8, NOW(), NOW()),
        ('P5', 'G7', 0.6, NOW(), NOW()),
        ('P5', 'G8', 0.4, NOW(), NOW()),
        ('P5', 'G20', 0.8, NOW(), NOW()),
        ('P6', 'G22', 0.6, NOW(), NOW()),
        ('P6', 'G23', 0.7, NOW(), NOW()),
        ('P6', 'G24', 0.6, NOW(), NOW()),
        ('P6', 'G25', 0.7, NOW(), NOW()),
        ('P6', 'G26', 0.4, NOW(), NOW()),
        ('P7', 'G1', 0.9, NOW(), NOW()),
        ('P7', 'G3', 0.8, NOW(), NOW()),
        ('P7', 'G27', 0.9, NOW(), NOW()),
        ('P7', 'G28', 0.8, NOW(), NOW()),
        ('P7', 'G29', 0.7, NOW(), NOW()),
        ('P7', 'G32', 0.9, NOW(), NOW()),
        ('P7', 'G33', 0.7, NOW(), NOW()),
        ('P8', 'G34', 0.7, NOW(), NOW()),
        ('P8', 'G35', 0.8, NOW(), NOW()),
        ('P8', 'G36', 0.5, NOW(), NOW()),
        ('P8', 'G37', 0.4, NOW(), NOW()),
        ('P8', 'G38', 0.3, NOW(), NOW()),
        ('P8', 'G39', 0.5, NOW(), NOW()),
        ('P8', 'G44', 0.8, NOW(), NOW()),
        ('P9', 'G37', 0.7, NOW(), NOW()),
        ('P9', 'G40', 0.4, NOW(), NOW()),
        ('P9', 'G41', 0.6, NOW(), NOW()),
        ('P9', 'G42', 0.8, NOW(), NOW()),
        ('P9', 'G43', 0.6, NOW(), NOW()),
        ('P9', 'G44', 0.9, NOW(), NOW()),
        ('P10', 'G45', 0.9, NOW(), NOW()),
        ('P10', 'G46', 0.6, NOW(), NOW()),
        ('P10', 'G47', 0.8, NOW(), NOW()),
        ('P10', 'G48', 0.7, NOW(), NOW()),
        ('P10', 'G49', 0.5, NOW(), NOW()),
        ('P10', 'G50', 0.6, NOW(), NOW());";
        DB::statement($sql);


        // // insert dummy gejala
        // DB::table('gejala')->insert([
        //     [
        //         'kode_gejala' => 'G001',
        //         'gejala' => 'Pusing'
        //     ],
        //     [
        //         'kode_gejala' => 'G002',
        //         'gejala' => 'Demam'
        //     ],
        //     [
        //         'kode_gejala' => 'G003',
        //         'gejala' => 'Mual'
        //     ],
        //     // Add more rows as needed
        // ]);


        // // insert dummy penyakit
        // DB::table('penyakit')->insert([
        //     [
        //         'kode_penyakit' => 'P001',
        //         'penyakit' => 'Flu Burung',
        //         'solusi' => json_encode(['Hubungi dokter']),
        //         'deskripsi' => 'Flu burung adalah penyakit zoonosis yang disebabkan oleh virus H5N1. Infeksi ini berasal dari burung unggas, terutama bebek dan ayam.',
        //     ],
        //     [
        //         'kode_penyakit' => 'P002',
        //         'penyakit' => 'Tuberkulosis',
        //         'solusi' => json_encode(['Hubungi dokter']),
        //         'deskripsi' => 'Tuberkulosis adalah penyakit menular yang disebabkan oleh bakteri Mycobacterium tuberculosis. Penyakit ini biasanya menyerang paru-paru, tetapi juga dapat menyerang organ tubuh lainnya.',
        //     ],
        //     // Add more rows as needed
        // ]);


        // // insert dummy basis pengetahuan
        // DB::table('basis_pengetahuan')->insert([
        //     [
        //         'kode_penyakit' => 'P001',
        //         'kode_gejala' => 'G001',
        //         'densitas' => 0.7
        //     ],
        //     [
        //         'kode_penyakit' => 'P001',
        //         'kode_gejala' => 'G002',
        //         'densitas' => 0.8
        //     ],
        //     [
        //         'kode_penyakit' => 'P002',
        //         'kode_gejala' => 'G002',
        //         'densitas' => 0.6
        //     ],
        //     [
        //         'kode_penyakit' => 'P002',
        //         'kode_gejala' => 'G003',
        //         'densitas' => 0.9
        //     ],
        //     // Add more rows as needed
        // ]);


        // insert dummy data hasil diagnosa
        DB::table('hasil_diagnosa')->insert([
            [
                'id_user' => 2,
                'kode_penyakit' => 'P1',
                'diagnosa' => json_encode([
                    'nama_penyakit' => 'Cacing Gilig',
                    'nilai_belief' => 0.67,
                    'persentase_penyakit' => '67 %',
                    'gejala_penyakit' => [
                        ['kode_gejala' => 'G04', 'nama_gejala' => 'Nafsu Makan Menurun'],
                        ['kode_gejala' => 'G08', 'nama_gejala' => 'Batuk dan Bersin'],
                        ['kode_gejala' => 'G11', 'nama_gejala' => 'Anemia'],
                        ['kode_gejala' => 'G13', 'nama_gejala' => 'Perubahan Warna Mukosa'],
                    ],
                ])
            ],
        ]);


        // insert dummy data for comment
        DB::table('kritik_saran')->insert([
            [
                'nama' => 'John Doe',
                'komentar' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jane Doe',
                'komentar' => 'Nullam sollicitudin orci vitae libero dapibus bibendum.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bob Smith',
                'komentar' => 'Pellentesque rhoncus aliquam est, vel ultricies mauris.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jane Smith',
                'komentar' => 'Pellentesque rhoncus aliquam est, vel ultricies mauris.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bob Sponge',
                'komentar' => 'Pellentesque rhoncus aliquam est, vel ultricies mauris.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
