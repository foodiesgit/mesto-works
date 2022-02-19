-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 03, 2022 at 07:25 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaziantepbilisim`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `branch1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `phone`, `branch1`, `branch2`, `branch3`, `map`, `created_at`, `updated_at`) VALUES
(1, 'info@gaziantepbilisim.com.tr', 903426060643, 'Gazi, Uzay Parkı, Zübeyde Hanım Blv., 27060 Şehitkamil/Gaziantep', 'Çamtepe Mh. Mahmut Tevfik Atay Bul. Gaziantep Teknopark 4/A No:58, 27060 Şehitkamil/Gaziantep', '', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12734.849905408613!2d37.3534059!3d37.0643344!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd99ec9c3da06e14!2sGaziantep%20Gezegenevi%20ve%20Bilim%20Merkezi!5e0!3m2!1str!2str!4v1642754410445!5m2!1str!2str\" width=\"100%\" height=\"450\" style=\"padding:5px;border:1px solid #ddd;border-radius: 5px;\" allowfullscreen=\"\" loading=\"lazy\"', NULL, '2022-02-01 02:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_25_065321_settings', 2),
(6, '2022_01_25_065411_products', 2),
(7, '2022_01_25_065423_services', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagedetail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `content`, `image`, `imagedetail`, `created_at`, `updated_at`) VALUES
(1, 'SUNUM PROJESİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'PowerPoint veya benzeri uygulamalarda hazırlanan sunumların bulut tabanlı bir sistem altında, hızlı, kolay, kurumsal kimliğe uygun bir formatta hazırlanmasını sağlayan bir uygulamadır.', 'upload/products/SUNUM PROJESİ.jpg', 'upload/products/details/SUNUM PROJESİ.jpg', NULL, '2022-01-28 05:52:46'),
(2, 'PANDEMİ ELÇİSİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Pandemi ortamında hasta denetimine yardımcı olmak amacıyla kurum tarafından belirlenen gönüllü vatandaşların hasta kişileri takip etmek için hazırlanmış bir projedir. Proje kapsamında sistem üzerinden elçilerinde hasta durumları hakkında bildirilen durumlar ile bir puan kazanılır ve puanlar ile sistem içinden hediye talebinde bulunabilir', 'upload/products/PANDEMİ ELÇİSİ.jpg', 'upload/products/details/PANDEMİ ELÇİSİ.jpg', NULL, '2022-01-28 05:46:35'),
(3, 'İKOM', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'İKOM, vatandaş ile kurum arasındaki tüm iletişimi, tek bir ekranda otomatik olarak toplayan iletişim yönetim sistemidir. Çağrı hattı entegrasyonu sayesinde web tarayıcı ile istenilen her yerden çalışmaktadır.', 'upload/products/İKOM.jpg', 'upload/products/details/İKOM.jpg', NULL, '2022-01-28 05:41:08'),
(5, 'GAZİRAY OYLAMA', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Gaziantep halkının kullanacağı hizmetleri kendi seçimlerine sunan projemizdir.', 'upload/products/GAZİRAY OYLAMA.jpg', 'upload/products/details/GAZİRAY OYLAMA.jpg', NULL, '2022-01-28 05:37:30'),
(6, 'SATIN ALMA SÜREÇ YÖNETİMİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Satın Alma Süreçlerinin mevzuata uygun yönetimini sağlayan bir paket yazılım uygulamasıdır. Uygulama kamu, kamu iştirak ve özel şirketlerin Satın Alma Süreçlerinin dijital ortamda yürütülmesini sağlamaktadır. Uygulama ile satın alma süreçlerinin yönetimi, raporlanması ve nitelikli veriler kullanılarak veri analizi yapılmaktadır.Bir şirketin birimleri tarafından oluşturulan talepler, yönetildikten sonra talep havuzunda bekleyen diğer kalemler ile satın alma birimi tarafından alım işi haline getirilir. Böylece satın alma süreci başlatılmış olur. Kayıt edilen verilerin analizi, raporlanması ve ilgili dokümanların kolaylıkla sistem üzerinden alınabilmesini sağlar. Sms ve mail entegrasyonları ile yetkili kişilere anlık bildirimler gönderilerek sürecin daha verimli ilerlemesi sağlanmaktadır.', 'upload/products/SATIN ALMA SÜREÇ YÖNETİMİ.jpg', 'upload/products/details/SATIN ALMA SÜREÇ YÖNETİMİ.jpg', NULL, '2022-01-28 05:50:11'),
(7, 'UKOME – BİLGİ VE EVRAK YÖNETİMİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Ulaşım Koordinasyon Merkezi için yapılan bu program ile; Dilekçe ve talep girme Toplantı (oturum) planlama Gündem hazırlama (Genel kurul ve teknik komisyon için ayrı ayrı gündem maddeleri oluşturma) Girilen dilekçe ve talepleri oturuma bağlama Karar ve raporların otomatik olarak çıktısının alınması Geçmiş toplantıların ve toplantılarda alınan kararların evrak yükleme desteği ile girilebileceği arşiv. Kararın birimlere, diğer kurumlara gönderilmesi Tamamlanmış, beklemede olan, zaman aşımına uğrayan kararların takibi Raporlamalar', 'upload/products/UKOME – BİLGİ VE EVRAK YÖNETİMİ.jpg', 'upload/products/details/UKOME – BİLGİ VE EVRAK YÖNETİMİ.jpg', NULL, '2022-01-28 05:53:52'),
(8, 'MAHALLE KARTI', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Belediyemizin verdiği bütün hizmetler listelenir Talepler alınıp bu taleplere göre hizmetler şekillendirilir En hızlı ve en doğru yatırımlar için karar alınmasına yardım eder. Mahalle Kartı web tarafında çıktı olarak alınan raporun mobil uygulama olarak kullanılması Ek olarak; İlçe belediyeleri ve kaymakamlıkların gerçekleştirdiği ve planladığı yatırımlar Önemli kurum adres ve telefonları Faaliyet Bildirim ekranı Sorun ve Talep Bildirimi', 'upload/products/MAHALLE KARTI.jpg', 'upload/products/details/MAHALLE KARTI.jpg', NULL, '2022-01-28 05:46:08'),
(9, 'GAZİANTEP VALİLİĞİ ÇAĞRI MERKEZİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Covid19 Sağlık Destek Hattının kurulmasıyla oluşturulan çağrı merkezi yazılımı; Valilik çağrı merkezini arayan vatandaşların kaydını tutarak takibinin sağlanmasını içeren sistemdir. COVID-19 ile ilgili çağrı merkezine düşen tüm iş ve işlemler anlık olarak takip edilebilmektedir.Portal sayesinde detaylı raporlar alınabilmektedir. Günlük, haftalık, aylık girilen çağrı kayıtlarının özeti İlçelere göre sağlık veya denetim kayıtlarını ve sonlandırılan kayıtlar tespit edilmektedir.', 'upload/products/GAZİANTEP VALİLİĞİ ÇAĞRI MERKEZİ.jpg', 'upload/products/details/GAZİANTEP VALİLİĞİ ÇAĞRI MERKEZİ.jpg', NULL, '2022-01-28 05:35:59'),
(10, 'UKOME - RUHSAT', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Ulaşım Koordinasyon Merkezi için yapılan bu program ile; Şoför, rehber personel tanımlama, kara listeye alma S, T, H, K, JJ plaka ruhsat tanımlama (şahıs, şirket) Plaka tiplerine özel ruhsat işlemleri gerçekleştirme (Araç değişikliği, güzergah izin belgesi, şahıstan şahısa, şahıstan şirkete devir vs.) Raporlamalar İnşaat projelerindeki makbuz, rapor ve izin belgeleri ile ilgili işleri hızlandırmak ve geçmişe yönelik onaylanan İnşaat projeleri hakkında bilgiye en kısa zamanda ulaşmak için geliştirilmiş bir yazılımdır. Aynı zamanda makbuz ve onaylanan proje arşivlerini tutulmasını sağlar.', 'upload/products/UKOME - RUHSAT.jpg', 'upload/products/details/UKOME - RUHSAT.jpg', NULL, '2022-01-28 05:53:18'),
(11, 'KALİTE YÖNETİM SİSTEMİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Kurum ve kuruluşların ISO 9001-2015 standartlarını baz alarak üretim ve hizmet kalitelerini artıran, bütün birimlerin ve faaliyetlerin gözden geçirilmesini ve iyileştirilmesini gerçekleştiren, dokümanların revizyonlarını takip eden, yetkisiz kullanıcıların dokümanlar üzerinde değişklik yapmasını engelleyen,tüm birimlerin birbirleri ile etkileşim içerisinde olduğu astın üste, üstün asta online bir şekilde bilgi verdiğibir otomasyon sistemidir.', 'upload/products/KALİTE YÖNETİM SİSTEMİ.jpg', 'upload/products/details/KALİTE YÖNETİM SİSTEMİ.jpg', NULL, '2022-01-28 05:44:01'),
(12, 'ANKET SİSTEMİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Anket sistemi, geleneksel ve bilindik olan anket sistemlerinden farklıdır. Her türlü bilginin dijital ortamda depolanması istemi bu projenin kırılma noktalarından biridir. Geliştirilen bu proje sayesinde kağıtlar ve fiziki dosyalama sistemi yerine dijital olarak depolanması hedeflenmiştir. Dijital olarak toplanan veriler sonrası tüm bu verilerin farklı formatlarda (Excel, PDF vs) alınması da mümkündür. Hazırlanmış olan sistem sayesinde yöneticiler, anketlerin hangi konumlarda yapıldığını kontrol edebilir ve haritalar üzerinden de bu konumlar incelenebilir.', 'upload/products/ANKET SİSTEMİ.jpg', 'upload/products/details/ANKET SİSTEMİ.jpg', NULL, '2022-01-28 04:55:33'),
(13, 'PERSONEL TAKİP SİSTEMİ (PDKS)', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Mesai saatlerinin kontrol altına alınmasını ve personellerin konum bazlı kontrolünün sağlanmasını hedefleyen bir mobil/web uygulamadır.', 'upload/products/PERSONEL TAKİP SİSTEMİ (PDKS).jpg', 'upload/products/details/PERSONEL TAKİP SİSTEMİ (PDKS).jpg', NULL, '2022-01-28 05:49:31'),
(14, 'EVİM DÜNYALARA BEDEL', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Proje kapasmında; belirlenen ihtiyaç sahibi yaşlıların telefonlarına yüklenecek uygulamanın ekranında bulunan butonlar yardımı ile belediye bünyesinde yer alan çağrı merkezlerine yönlendirilecek ve görüntülü veya sesli konuşma ile belediye hizmetlerine sıra beklemeden direkt ilgili personelin yardımı ile ulaşabileceklerdir.', 'upload/products/EVİM DÜNYALARA BEDEL.jpg', 'upload/products/details/EVİM DÜNYALARA BEDEL.jpg', NULL, '2022-01-28 05:32:41'),
(15, 'HKU KAMERA TAKİP SİSTEMİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Hasan Kalyoncu Üniversitesi rektörlüğü’ne yapılan “kamera takip projesi” ile rektörlüğün kampüse giriş - çıkış yapan yaya ve araçları anlık olarak takip edebilebilmektedir. Ayrıca istenilen bir zaman aralığındaki veriler de raporlanabilmektedir.', 'upload/products/HKU KAMERA TAKİP SİSTEMİ.jpg', 'upload/products/details/HKU KAMERA TAKİP SİSTEMİ.jpg', NULL, '2022-01-28 05:38:48'),
(16, 'SAYBİT (SAYIŞTAY FORMAT DÖNÜŞTÜRÜCÜ)', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Sayıştay, kamu idarelerince tutulan defter, kayıt, belge ve bilgileri özel bir formatta istemektedir. Hali hazırda ki muhasebe programları buna bir çözüm geliştiremediği için şirketimiz tarafından bir format dönüştürücü program yazıldı.', 'upload/products/SAYBİT (SAYIŞTAY FORMAT DÖNÜŞTÜRÜCÜ).jpg', 'upload/products/details/SAYBİT (SAYIŞTAY FORMAT DÖNÜŞTÜRÜCÜ).jpg', NULL, '2022-01-28 05:51:00'),
(17, 'SCADA İZLEME SİSTEMİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'SCADA takip sistemimizde depo seviyesi,analog çıkış değerleri ve alarmları görebildiğimiz bir sistemdir. Scada değerlerini aynı zamanda animasyonlarla desteklemekteyiz. Bunlara ek olarak her istasyonda oluşan alarmlarıda anlık olarak sistemden takip edebiliyoruz.Haritalandırma özelliği; istasyonları harita üzerinde konumlandırmaya yarar. Olası bir problem yaşandığında Çağrı Merkezi Sistemiyle anında yetkili kişiye ulaşılabiliyor.', 'upload/products/SCADA İZLEME SİSTEMİ.jpg', 'upload/products/details/SCADA İZLEME SİSTEMİ.jpg', NULL, '2022-01-28 05:51:52'),
(18, 'KİRALAMA TAKİP', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Tanımlanan kiracı ve taşınmazlara ait kira sözleşmeleri yapıp bunların ödeme planlarını çıkaran sistemimizde tahsilat, gecikme faizi takibini gerçekleştirebiliyoruz. Yapmış olduğumuz Kira Sözleşme Numarasına göre gerçekleştirilen tahsilatlar farklı şahıslardan gelse bile bir sözleşme altında kaydı tutuluyor. Toplam ödenmesi gereken kira tutarı, tahsil edilen tutarlar, bu tahsilatın ne kadarı kira ödemesinde kullanılmış ve kalan ödenmesi gereken tutarda aynı şekilde gösterilmektedir. Sonuç olarak; kira ödeme ve zam tarihlerini hatırlatan pratik bir uygulamadır.', 'upload/products/KİRALAMA TAKİP.jpg', 'upload/products/details/KİRALAMA TAKİP.jpg', NULL, '2022-01-28 05:45:17'),
(19, 'BELEDİYE-SOSYAL AĞ PROJESİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Gaziantep Bilişim – KoçSistem - Entegres Workplace ürünü, Belediyenin vatandaşlar ile iletişiminin sağlanması amacıyla kullanılması ve daha sonra Gaziantep Büyükşehir Belediyesi’nin önderliğinde diğer belediyelere satışı amaçlanmaktadır. Vatandaşın kullanımının sağlanması amacıyla vatandaşların belediye hizmetlerini kullandıklarında ödül-puan kazanmaları ve bu puanı belediye hizmeti olarak harcamaları proje kapsamındadır.', 'upload/products/BELEDİYE-SOSYAL AĞ PROJESİ.jpg', 'upload/products/details/BELEDİYE-SOSYAL AĞ PROJESİ.jpg', NULL, '2022-01-28 05:25:16'),
(20, 'GAZİ ÇİFTÇİ OYUNU', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Firmamızda bilgilendirici ve eğitsel oyunlar geliştirilmektedir. En son geliştirdiğimiz çiftlik temalı oyun kullanıcılara çiftlik ürünlerinin yetiştirilmesi ve hayvansal gıdaların üretilmesi konusunda bilgiler vermektedir.', 'upload/products/GAZİ ÇİFTÇİ OYUNU.jpg', 'upload/products/details/GAZİ ÇİFTÇİ OYUNU.jpg', NULL, '2022-01-28 05:34:18'),
(21, 'E-SINAV SİSTEMİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Sınav yapan kurumlar için detaylı değerlendirme, ölçme ve takibin yapıldığı bir e-Sınav Sistemi geliştirdik.', 'upload/products/E-SINAV SİSTEMİ.jpg', 'upload/products/details/E-SINAV SİSTEMİ.jpg', NULL, '2022-01-28 05:30:06'),
(22, 'ÖĞRENCİ DEVAMSIZLIK TAKİBİ', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Geliştirilen devamsızlık yazılımı ile öğrencilerin hangi sebeple ve ne kadar sıklıkla devamsızlık yaptığının analizi kolayca yapılabilmektedir.', 'upload/products/ÖĞRENCİ DEVAMSIZLIK TAKİBİ.jpg', 'upload/products/details/ÖĞRENCİ DEVAMSIZLIK TAKİBİ.jpg', NULL, '2022-01-28 05:54:45'),
(23, 'PERFORMANS TAKİP', 'Gaziantep Bilişim ve Akıllı Kent Teknolojileri A.Ş.', 'Planlanmış işlerin personele dağılımı, Verilen işlerin anlık takibi ve kontrolü, Projelerin ve personellerin ayrıntılı raporlarla istatistiğinin çıkarılarak daha verimli ve hızlı yönetimi.', 'upload/products/PERFORMANS TAKİP.jpg', 'upload/products/details/PERFORMANS TAKİP.jpg', NULL, '2022-01-28 05:47:28'),
(59, '3D SİMÜLATÖR', '3D SİMÜLATÖR', '3D SİMÜLATÖR', 'upload/products/3D SİMÜLATÖR.jpg', 'upload/products/details/3D SİMÜLATÖR.jpg', '2022-01-28 06:17:31', '2022-01-28 06:17:31');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Paket Yazılımlar', 'des', 'gggggggggggggggggggg', 'upload/services/Paket Yazılımlar.png', NULL, '2022-01-25 13:34:58'),
(2, 'Kira Takip Yazılımları', '', '', 'upload/services/kira.png', NULL, NULL),
(3, 'Mobil Uygulama Çözümleri', '', '', 'upload/services/mobil.png', NULL, NULL),
(4, 'Sosyal Belediye Yazılımı', '', '', 'upload/services/sosyal.png', NULL, NULL),
(5, 'Kamu Yazılım Çözümleri', '', '', 'upload/services/kamu.png', NULL, NULL),
(6, 'Bilgi Teknolojileri Destegi', '', '', 'upload/services/bilgi.png', NULL, NULL),
(7, 'Özel Yazılım Çözümleri', '', '', 'upload/services/ozel.png', NULL, NULL),
(8, 'Akıllı Kamera Sistemleri', '', '', 'upload/services/akilli.png', NULL, NULL),
(9, 'Mobil Oyun', '', '', 'upload/services/mobil2.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@outlook.com', NULL, '$2y$10$LNnnWNiJbwny7Rrmcbx3vOqX.tfc4e9sufwqS6fOasyUDrT5iq2M2', 'admin', NULL, NULL, NULL),
(2, 'test2', 'test2@outlook.com', NULL, '$2y$10$WdkUMXWGL.l6ZwALu3P4MuvV0ZIKMaeAcj2DY1qBaYTYXoZZMdLwu', 'user', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
