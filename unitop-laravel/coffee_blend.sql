-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 17, 2025 lúc 07:55 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `coffee_blend`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `feature_image_path` varchar(191) DEFAULT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `feature_image_path`, `content`, `user_id`, `deleted_at`, `created_at`, `updated_at`, `feature_image_name`) VALUES
(1, 'SIGNATURE - BIỂU TƯỢNG VĂN HOÁ CÀ PHÊ CỦA THE COFFEE HOUSE ĐÃ QUAY TRỞ LẠI', '/storage/blog/1/jWCmDdsWPfoJ50Iel4xB.jpg', '<div><strong>Mới đ&acirc;y, c&aacute;c \"t&iacute;n đồ\" c&agrave; ph&ecirc; đang b&agrave;n t&aacute;n x&ocirc;n xao về SIGNATURE - Biểu tượng văn h&oacute;a c&agrave; ph&ecirc; của The Coffee House đ&atilde; quay trở lại.</strong></div>\r\n<h2><strong>Một lời hẹn l&agrave;m bao người xao xuyến</strong></h2>\r\n<p>Vừa qua, Fanpage Nh&agrave; đ&atilde; h&eacute; mở những th&ocirc;ng tin đầu ti&ecirc;n về \"SIGNATURE by The Coffee House\" k&egrave;m lời hẹn \"H&ocirc;m nay bạn c&oacute; hẹn chưa? M&igrave;nh c&agrave; ph&ecirc; nh&eacute;!\".</p>\r\n<p>Theo đ&oacute;, SIGNATURE by The Coffee House sẽ gửi đến c&aacute;c th&agrave;nh vi&ecirc;n của Nh&agrave; những Cuộc hẹn tr&ograve;n đầy với 3 trải nghiệm: T&aacute;ch c&agrave; ph&ecirc; đặc sản với những mẻ rang mới mỗi ng&agrave;y, chiều l&ograve;ng mọi t&acirc;m hồn y&ecirc;u c&agrave; ph&ecirc; hay những ai đang t&ograve; m&ograve; về loại tr&aacute;i c&acirc;y đặc biệt n&agrave;y; M&oacute;n ăn đa bản sắc, mang phong vị giao thoa từ nhiều nơi cho cuộc hẹn d&agrave;i hơn, r&ocirc;m rả hơn; Một kh&ocirc;ng gian đầy cảm hứng, nơi hạt c&agrave; ph&ecirc; kể về h&agrave;nh tr&igrave;nh tuyệt vời của m&igrave;nh theo c&aacute;ch gần gũi nhất. Bạn sẽ c&oacute; cơ hội thưởng thức c&agrave; ph&ecirc; bằng đủ những gi&aacute;c quan - ngửi hương, lắng nghe, ngắm nh&igrave;n v&agrave; nếm vị.</p>\r\n<p><img src=\"https://file.hstatic.net/1000075078/file/_dsc2358_820aba0fa2c146578565ead25a3c05ec_grande.jpg\"></p>\r\n<p><em>Sự trở lại của m&ocirc; h&igrave;nh Signature với c&aacute;i t&ecirc;n mới SIGNATURE by The Coffee House</em></p>\r\n<p>Kh&ocirc;ng gian rộng mở, được thiết kế như một xưởng rang c&agrave; ph&ecirc; nhưng vẫn tạo cảm gi&aacute;c th&acirc;n thuộc, gần gũi với nhiều c&acirc;y xanh v&agrave; hai t&ocirc;ng m&agrave;u cam n&acirc;u ấm &aacute;p v&agrave; trắng x&aacute;m tinh tế. Trong đ&oacute;, nổi bật nhất phải kể đến hệ thống c&aacute;c si l&ocirc; c&agrave; ph&ecirc; v&agrave; một m&aacute;y rang lớn đặt ở sảnh tầng 1, c&ugrave;ng hệ thống c&aacute;c ống đồng chứa c&agrave; ph&ecirc; rang, khu vực quầy bar trải nghiệm. Khoảng 1 giờ, qu&aacute;n sẽ rang 1 mẻ nhỏ, tạo n&ecirc;n tiếng c&agrave; ph&ecirc; chạy trong c&aacute;c ống đồng rất vui tai, như 1 bản nhạc.</p>\r\n<p><img src=\"https://channel.mediacdn.vn/428462621602512896/2023/1/10/photo-2-16733167329771189768547.png\" alt=\"https://channel.mediacdn.vn/428462621602512896/2023/1/10/photo-2-16733167329771189768547.png\"></p>\r\n<p><em>\"S&acirc;n khấu tr&igrave;nh diễn\" h&agrave;nh tr&igrave;nh của hạt c&agrave; ph&ecirc; từ lo rang, qua những ống đồng, tới m&aacute;y pha v&agrave; t&aacute;ch c&agrave; ph&ecirc; tại b&agrave;n.</em></p>\r\n<p>Kh&ocirc;ng chỉ được thưởng thức những ly c&agrave; ph&ecirc; đặc sản thơm ngon, đậm vị, đến với SIGNATURE by The Coffee House, bạn c&ograve;n c&oacute; thể thưởng thức nhiều m&oacute;n ăn mới lạ kết hợp &Aacute; - &Acirc;u, th&iacute;ch hợp cho mọi cuộn hẹn.</p>\r\n<p>Ngay khi vừa xuất hiện, SIGNATURE by The Coffee House đ&atilde; nhận được sự hưởng ứng, chia sẻ nhiệt t&igrave;nh của giới trẻ. B&ecirc;n dưới b&agrave;i đăng l&agrave; h&agrave;ng loạt những b&igrave;nh luận khen ngợi về kh&ocirc;ng gian cửa h&agrave;ng, thức uống, đồ ăn v&agrave; \"rủ r&ecirc;\" bạn b&egrave; tới kh&aacute;m ph&aacute; v&agrave; trải nghiệm.</p>\r\n<p><img src=\"https://channel.mediacdn.vn/428462621602512896/2023/1/10/photo-4-16733167320151863927482.png\" alt=\"https://channel.mediacdn.vn/428462621602512896/2023/1/10/photo-4-16733167320151863927482.png\"></p>\r\n<p>Bạn Lan Anh, một \"fan cứng\" của The Coffee House Signature Phạm Ngọc Thạch đ&atilde; tỏ ra rất h&agrave;o hứng khi nghe tin bạn cũ sắp quay lại: \"Lần đầu được trải nghiệm The Coffee House Signature từ mấy năm trước, m&igrave;nh đ&atilde; m&ecirc; như điếu đổ rồi. C&agrave; ph&ecirc; v&agrave; kh&ocirc;ng gian đều rất hợp gu m&igrave;nh. Chớm hay tin bạn cũ đ&atilde; quay trở lại tại Crescent Mall từ \"cạ cứng\" c&agrave; ph&ecirc;, ch&uacute;ng m&igrave;nh l&ecirc;n lịch gh&eacute; qua thăm liền, bạn vẫn ngon vậy m&agrave; c&ograve;n hấp dẫn hơn xưa nữa\".</p>\r\n<p><img src=\"https://channel.mediacdn.vn/428462621602512896/2023/1/10/photo-3-16733167324971109841045.png\" alt=\"https://channel.mediacdn.vn/428462621602512896/2023/1/10/photo-3-16733167324971109841045.png\"></p>\r\n<h2><strong>The Coffee House Signature - Dấu ấn đặc trưng của Nh&agrave; c&agrave; ph&ecirc;</strong></h2>\r\n<p>V&agrave;o năm 2018, The Coffee House đ&atilde; ra mắt The Coffee House Signature lần đầu ti&ecirc;n, l&agrave; một địa chỉ c&agrave; ph&ecirc; \"sang &ndash; xịn &ndash; mịn &ndash; thơm\" nổi bật, từng khiến bạn m&ecirc; mẩn ngay từ khi ra mắt.</p>\r\n<p>The Coffee House Signature Phạm Ngọc Thạch từng l&agrave; một phi&ecirc;n bản chắt lọc những gi&aacute; trị đặc trưng nhất của Nh&agrave; c&agrave; ph&ecirc;. Những gi&aacute; trị ấy được kho&aacute;c l&ecirc;n m&igrave;nh một h&igrave;nh h&agrave;i mới bởi sự tận tụy, sự tỉ mỉ v&agrave; đam m&ecirc; của h&agrave;ng trăm con người l&agrave;m việc tại đ&acirc;y, với hy vọng để lại một dấu ấn n&agrave;o đ&oacute; từ những điều nhỏ nhặt nhất, bắt đầu từ những hạt c&agrave; ph&ecirc;.</p>\r\n<p>Sự chia tay The Coffee House Signature Phạm Ngọc Thạch khiến nhiều bạn kh&ocirc;ng khỏi tiếc nuối v&agrave; chờ mong ng&agrave;y \"t&aacute;i ngộ\".</p>\r\n<p>Bạn Thu Phương, một cạ cứng của qu&aacute;n chia sẻ, tuy kh&ocirc;ng muốn tin v&agrave;o \"sự thực phũ ph&agrave;ng\" nhưng vẫn đ&agrave;nh chấp nhận v&agrave; mong ng&oacute;ng đến ng&agrave;y m&ocirc; h&igrave;nh n&agrave;y mở cửa trở lại. Phương chia sẻ: \"H&ocirc;m đ&oacute; được đứa bạn th&acirc;n gửi cho tin tr&ecirc;n b&aacute;o, m&igrave;nh c&ograve;n nghĩ tin l&aacute; cải th&ocirc;i. Qu&aacute;n to, đồ ngon vậy sao n&oacute;i đ&oacute;ng l&agrave; đ&oacute;ng được. Thế m&agrave; qu&aacute;n đ&oacute;ng thật. L&uacute;c ấy chỉ mong dịch bệnh qua đi th&igrave; qu&aacute;n sẽ mở cửa trở lại, m&igrave;nh sẽ l&agrave; những kh&aacute;ch h&agrave;ng đầu ti&ecirc;n đến để ch&uacute;c mừng th&ocirc;i ấy\".</p>\r\n<p>Kh&ocirc;ng phụ sự chờ đợi của Lan Anh hay Thu Phương v&agrave; nhiều t&iacute;n đồ c&agrave; ph&ecirc; kh&aacute;c của Nh&agrave;, SIGNATURE by The Coffee House đ&atilde; t&aacute;i xuất với một m&ocirc; h&igrave;nh ho&agrave;n to&agrave;n mới đ&aacute;p ứng những nhu cầu mới, hứa hẹn mang đến những trải nghiệm mới mẻ cho cuộc hẹn của bạn th&ecirc;m tr&ograve;n đầy. Bạn đ&atilde; sẵn s&agrave;ng c&agrave; ph&ecirc; c&ugrave;ng SIGNATURE by The Coffee House rồi chứ? M&igrave;nh c&agrave; ph&ecirc; nh&eacute;!</p>', 1, NULL, '2024-12-25 01:20:28', '2024-12-25 01:48:59', 'Blog - BIỂU TƯỢNG VĂN HOÁ.jpg'),
(2, 'CÀ PHÊ SỮA ESPRESSO THE COFFEE HOUSE - BẬT LON BẬT VỊ NGON', '/storage/blog/1/WfH44XapCnjOMrPWc2dw.jpg', '<p><strong><a href=\"https://order.thecoffeehouse.com/product/combo-6-lon-ca-phe-sua-espresso\">C&agrave; ph&ecirc; sữa Espresso&nbsp;</a>l&agrave; một lon c&agrave; ph&ecirc; sữa giải kh&aacute;t với hương vị c&agrave; ph&ecirc; đậm đ&agrave; từ&nbsp;100% c&agrave; ph&ecirc; Robusta&nbsp;c&ugrave;ng&nbsp;vị sữa b&eacute;o nhẹ&nbsp;cho bạn một trải nghiệm hương vị c&agrave; ph&ecirc; ho&agrave;n to&agrave;n mới.</strong></p>\r\n<p><img src=\"https://file.hstatic.net/1000075078/file/1__3__5c6373c6309f47fe8b298f96417819cf_grande.jpg\"><img src=\"https://file.hstatic.net/1000075078/file/2__1__97ff52a6281b444d991166f33ae29737_grande.jpg\"><img src=\"https://file.hstatic.net/1000075078/file/3__2__a23775f7af6e4becac403f41c746dd60_grande.jpg\"><img src=\"https://file.hstatic.net/1000075078/file/4__2__f374fe16983e4e8b8ebd7c52e4cb758a_grande.jpg\"><img src=\"https://file.hstatic.net/1000075078/file/5_96e68cceb8a84f4e910c12aa16d7b48a_grande.jpg\"><img src=\"https://file.hstatic.net/1000075078/file/6_dda2532fbac44d12bdfc0bbdbe1512d0_grande.jpg\"></p>', 1, NULL, '2024-12-25 01:48:05', '2024-12-25 01:48:05', 'CÀ PHÊ SỮA ESPRESSO - Blog.jpg'),
(3, 'CÁCH NHẬN BIẾT HƯƠNG VỊ CÀ PHÊ ROBUSTA NGUYÊN CHẤT DỄ DÀNG NHẤT', '/storage/blog/1/OczdLgPRkf36ShkKwSh4.jpg', '<p><strong>C&ugrave;ng Arabica, Robusta cũng l&agrave; loại c&agrave; ph&ecirc; nổi tiếng được sử dụng phổ biến ở Việt Nam v&agrave; nhiều nước kh&aacute;c tr&ecirc;n thế giới. Với nhiều đặc điểm&nbsp;ri&ecirc;ng, kh&ocirc;ng qu&aacute; kh&oacute; để c&oacute; thể nhận ra hương vị của loại c&agrave; ph&ecirc; trứ danh n&agrave;y.</strong></p>\r\n<p><strong>Đặc điểm c&agrave; ph&ecirc; Robusta&nbsp;</strong></p>\r\n<p>Về h&igrave;nh dạng, hạt c&agrave; ph&ecirc; Robusta c&oacute; h&igrave;nh tr&ograve;n, đường k&iacute;nh khoảng 10 &ndash; 13 mm. Hạt Robusta c&oacute; m&agrave;u n&acirc;u đậm v&agrave; h&agrave;m lượng caffeine từ 3 - 4%, trong khi đ&oacute; Arabica chỉ chiếm từ 1 - 2%.&nbsp;</p>\r\n<p>Về điều kiện trồng, c&agrave; ph&ecirc; Robusta sinh trưởng tốt trong v&ugrave;ng c&oacute; mưa nhiều v&agrave; nhiều &aacute;nh nắng mặt trời. Nhiệt độ th&iacute;ch hợp ở mức 24 - 29 độ C, ưa sống ở những v&ugrave;ng c&oacute; độ cao dưới 1000 m&eacute;t, phổ biến ở 850 &ndash; 900 m&eacute;t v&agrave; ở những v&ugrave;ng c&oacute; đất đỏ bazan m&agrave;u mỡ.</p>\r\n<p><img src=\"https://file.hstatic.net/1000075078/file/thecoffeehouse_ca_phe_robusta_04_77eebbf64f264751945dd2db61050c4b_grande.jpg\"></p>\r\n<p><em>Ở Việt Nam, Robusta c&ograve;n được gọi với c&aacute;i t&ecirc;n quen thuộc l&agrave; c&agrave; ph&ecirc; Vối</em></p>\r\n<p>Ở Việt Nam c&oacute; rất nhiều v&ugrave;ng ph&ugrave; hợp để trồng giống Robusta, đặc biệt l&agrave;&nbsp;Bu&ocirc;n Ma Thuột, Đắk Lắk, L&acirc;m Đồng, Gia Lai, Đắk N&ocirc;ng,&hellip; Đ&acirc;y l&agrave; những v&ugrave;ng đất mang đến hương vị c&agrave; ph&ecirc; Robusta nguy&ecirc;n chất ngon v&agrave; nổi tiếng. Tuy nhi&ecirc;n, do sự kh&aacute;c biệt về thổ nhưỡng m&agrave; hương vị Robusta ở c&aacute;c v&ugrave;ng cũng c&oacute; sự kh&aacute;c biệt tương đối. Những người s&agrave;nh c&agrave; ph&ecirc;, c&oacute; gu thưởng thức tinh tế sẽ dễ d&agrave;ng cảm nhận được sự kh&aacute;c biệt ấn tượng m&agrave; đầy th&uacute; vị n&agrave;y.&nbsp;</p>\r\n<p><strong>Hương vị c&agrave; ph&ecirc; Robusta nguy&ecirc;n chất&nbsp;</strong></p>\r\n<p>C&agrave; ph&ecirc; Robusta nguy&ecirc;n chất được l&ograve;ng nhiều người bởi vị đậm đ&agrave; v&agrave; m&ugrave;i thơm đặc trưng. Nh&igrave;n chung, Robusta nguy&ecirc;n chất thường c&oacute; vị ch&aacute;t v&agrave; đắng hơn nhiều so với Arabica.&nbsp;Một trong những nguy&ecirc;n nh&acirc;n dẫn đến t&iacute;nh chất n&agrave;y l&agrave; do Robusta&nbsp;thường được &aacute;p dụng phương ph&aacute;p chế biến kh&ocirc;.</p>\r\n<p>Ngo&agrave;i ra, hạt c&agrave; ph&ecirc; Robusta nguy&ecirc;n chất chứa nhiều h&agrave;m lượng Chlorogenic Acid (CGA). Tuy được gọi l&agrave; Acid nhưng Chlorogenic Acid kh&ocirc;ng đặc trưng bởi &ldquo;vị chua&rdquo; m&agrave; l&agrave; &ldquo;vị đắng&rdquo;. Trong qu&aacute; tr&igrave;nh rang hạt c&agrave; ph&ecirc;, CGA sẽ ph&acirc;n hủy để tạo th&agrave;nh&nbsp;axit caffeic&nbsp;v&agrave;&nbsp;axit quinic, những chất n&agrave;y khi kết hợp c&ugrave;ng caffeine sẽ tạo n&ecirc;n vị đắng đặc trưng thường thấy ở Robusta. Vậy n&ecirc;n d&ugrave; Robusta c&oacute; lượng axit gấp đ&ocirc;i Arabica nhưng thực sự n&oacute; kh&ocirc;ng hề chua, m&agrave; đắng hơn Arabica.&nbsp;</p>\r\n<p><img src=\"https://file.hstatic.net/1000075078/file/thecoffeehouse_ca_phe_robusta_03_f41cdb27feb44fe7bffb77ac03aefbad_grande.jpg\"></p>\r\n<p>B&ecirc;n cạnh đ&oacute;, với h&agrave;m lượng caffeine trung b&igrave;nh cao gấp đ&ocirc;i so với Arabica n&ecirc;n khi kết hợp hai loại c&agrave; ph&ecirc; n&agrave;y lại cho ra&nbsp;sản phẩm h&agrave;i h&ograve;a&nbsp;được nhiều người y&ecirc;u th&iacute;ch. V&igrave; vậy m&agrave; tr&ecirc;n thị trường nhiều loại c&agrave; ph&ecirc; &Yacute; (Espresso) lu&ocirc;n c&oacute; 10 - 15% c&agrave; ph&ecirc; Robusta để l&agrave;m dậy hương vị v&agrave; tạo lớp crema hấp dẫn hơn.</p>\r\n<p><strong>Chọn c&agrave; ph&ecirc; Robusta nguy&ecirc;n chất&nbsp;</strong></p>\r\n<p>T&ugrave;y theo sở th&iacute;ch ri&ecirc;ng của mỗi người, họ sẽ c&oacute; &ldquo;gu&rdquo; c&agrave; ph&ecirc; ri&ecirc;ng cho m&igrave;nh. Tuy nhi&ecirc;n, những loại c&agrave; ph&ecirc; nguy&ecirc;n chất, c&agrave; ph&ecirc; sạch kh&ocirc;ng pha trộn c&aacute;c loại tạp chất lu&ocirc;n l&agrave; ti&ecirc;u ch&iacute; lựa chọn h&agrave;ng đầu của những ai y&ecirc;u&nbsp;c&agrave; ph&ecirc;.&nbsp;</p>\r\n<p>Thấu hiểu sự đam m&ecirc; v&agrave; những cảm x&uacute;c kỳ diệu của c&aacute;c t&iacute;n đồ c&agrave; ph&ecirc; khi được nh&acirc;m nhi những t&aacute;ch c&agrave; ph&ecirc; nguy&ecirc;n chất, đậm vị, The Coffee House đ&atilde; cho ra đời&nbsp;c&agrave; ph&ecirc; Original 1. Sản phẩm c&oacute;&nbsp;100% th&agrave;nh phần l&agrave;&nbsp;c&agrave; ph&ecirc; Robusta Đắk Lắk, v&ugrave;ng trồng c&agrave; ph&ecirc; ngon nhất Việt Nam. Bằng c&aacute;ch &aacute;p dụng kỹ thuật rang xay hiện đại, C&agrave; ph&ecirc; Original 1 mang đến trải nghiệm tuyệt vời khi uống c&agrave; ph&ecirc; tại nh&agrave; với hương vị đậm đ&agrave; truyền thống.&nbsp;</p>\r\n<p><img src=\"https://file.hstatic.net/1000075078/file/thecoffeehouse_ca_phe_rang_xay_01_1d5dc412941442dcbdccfdcd117ebbb3_grande.jpg\"></p>\r\n<p><em>C&agrave; ph&ecirc; Original 1 của The Coffee House với 100% th&agrave;nh phần c&agrave; ph&ecirc; Robusta Đăk Lăk, v&ugrave;ng trồng c&agrave; ph&ecirc; ngon nhất Việt Nam.&nbsp;</em></p>\r\n<p>B&ecirc;n cạnh đ&oacute;, d&ograve;ng c&agrave; ph&ecirc; Rich Finish của The Coffee House sở hữu c&ocirc;ng thức rang xay chuy&ecirc;n biệt v&agrave; được phối trộn tỷ lệ ho&agrave;n hảo giữa hạt Robusta v&agrave; Arabica. Đối với Rich Finish, ngay từ c&aacute;i chạm m&ocirc;i đầu ti&ecirc;n sẽ cảm nhận được r&otilde; vị đậm đ&agrave; v&agrave; hậu vị vấn vương. Rich Finish cho bạn khởi đầu đầy năng lượng, tỉnh t&aacute;o v&agrave; kết th&uacute;c một ng&agrave;y với những cảm x&uacute;c rộn r&agrave;ng.&nbsp;</p>\r\n<p>Ngo&agrave;i ra, những hạt c&agrave; ph&ecirc; Robusta Đắk N&ocirc;ng v&agrave; hạt c&agrave; ph&ecirc; Arabica Cầu Đất nổi tiếng của Việt Nam c&ograve;n được The Coffee House g&oacute;i trọn v&agrave; tạo th&agrave;nh một hương vị mới mẻ đầy l&ocirc;i cuốn trong d&ograve;ng sản phẩm Peak Flavor. Được rang với nhiệt độ v&agrave;ng, c&agrave; ph&ecirc; Peak Flavor l&agrave; sự h&ograve;a trộn của nhiều cung bậc, c&aacute;c tầng lớp của hương v&agrave; vị sẽ mang đến cho người d&ugrave;ng một ng&agrave;y mới tr&agrave;n đầy cảm hứng.</p>', 1, NULL, '2024-12-25 01:50:24', '2024-12-25 01:50:24', 'CÁCH NHẬN BIẾT HƯƠNG VỊ CÀ PHÊ ROBUSTA NGUYÊN CHẤT DỄ DÀNG NHẤT-blog.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`, `deleted_at`, `url`) VALUES
(54, 'Trang Chủ', 'trang-chu', 0, '2024-12-21 01:57:08', '2025-01-07 23:16:31', NULL, '/home'),
(55, 'Trà', 'tra', 0, '2024-12-21 01:57:46', '2024-12-21 01:57:46', NULL, NULL),
(56, 'Menu', 'menu', 0, '2024-12-21 01:58:19', '2024-12-21 01:58:19', NULL, NULL),
(57, 'Blog', 'blog', 0, '2024-12-21 01:58:28', '2025-01-01 02:11:05', NULL, '/blog'),
(58, 'Cửa hàng', 'cua-hang', 0, '2024-12-21 01:58:41', '2024-12-21 01:58:41', NULL, NULL),
(59, 'Tuyển dụng', 'tuyen-dung', 0, '2024-12-21 01:58:49', '2024-12-21 01:58:49', NULL, NULL),
(60, 'Cà Phê', 'ca-phe', 56, '2024-12-21 01:59:51', '2024-12-21 01:59:51', NULL, NULL),
(61, 'Trái Cây Xay 0°C', 'trai-cay-xay-0c', 56, '2024-12-21 02:00:37', '2024-12-21 02:00:37', NULL, NULL),
(62, 'Trà Trái Cây', 'tra-trai-cay', 56, '2024-12-21 02:00:59', '2024-12-21 02:10:10', '2024-12-21 02:10:10', NULL),
(63, 'Trà Sữa', 'tra-sua', 56, '2024-12-21 02:01:11', '2024-12-21 02:01:11', NULL, NULL),
(64, 'Trà Xanh - Chocolate', 'tra-xanh-chocolate', 56, '2024-12-21 02:01:35', '2024-12-21 02:01:35', NULL, NULL),
(65, 'Thức uống đá xay', 'thuc-uong-da-xay', 56, '2024-12-21 02:02:02', '2024-12-21 02:02:02', NULL, NULL),
(66, 'Bánh & Snack', 'banh-snack', 56, '2024-12-21 02:02:25', '2024-12-21 02:02:25', NULL, NULL),
(67, 'Thưởng Thức Tại Nhà', 'thuong-thuc-tai-nha', 56, '2024-12-21 02:02:48', '2024-12-21 02:02:48', NULL, NULL),
(68, 'Cà Phê Highlight', 'ca-phe-highlight', 60, '2024-12-21 02:03:19', '2024-12-21 02:03:19', NULL, NULL),
(69, 'Cà Phê Việt Nam', 'ca-phe-viet-nam', 60, '2024-12-21 02:03:39', '2024-12-21 02:03:39', NULL, NULL),
(70, 'Cà Phê Máy', 'ca-phe-may', 60, '2024-12-21 02:03:58', '2024-12-21 02:03:58', NULL, NULL),
(71, 'Cold Brew', 'cold-brew', 60, '2024-12-21 02:04:08', '2024-12-21 02:04:08', NULL, NULL),
(72, 'Trái Cây Xay 0°C', 'trai-cay-xay-0c', 61, '2024-12-21 02:04:26', '2024-12-21 02:04:26', NULL, NULL),
(73, 'Trà Trái Cây - HiTea', 'tra-trai-cay-hitea', 56, '2024-12-21 02:10:27', '2024-12-21 02:18:27', NULL, NULL),
(74, 'Trà Trái Cây', 'tra-trai-cay', 73, '2024-12-21 02:21:58', '2024-12-21 02:21:58', NULL, NULL),
(75, 'HiTea', 'hitea', 73, '2024-12-21 02:31:46', '2024-12-21 02:31:46', NULL, NULL),
(76, 'Trà Sữa', 'tra-sua', 63, '2024-12-21 02:33:25', '2024-12-21 02:33:25', NULL, NULL),
(77, 'Trà xanh Tây Bắc', 'tra-xanh-tay-bac', 64, '2024-12-21 02:33:57', '2024-12-21 02:33:57', NULL, NULL),
(78, 'Chocolate', 'chocolate', 64, '2024-12-21 02:34:08', '2024-12-21 02:34:08', NULL, NULL),
(79, 'Đá Xay Frosty', 'da-xay-frosty', 65, '2024-12-21 02:34:46', '2024-12-21 02:34:46', NULL, NULL),
(80, 'Bánh Mặn', 'banh-man', 66, '2024-12-21 02:35:05', '2024-12-21 02:35:05', NULL, NULL),
(81, 'Bánh Ngọt', 'banh-ngot', 66, '2024-12-21 02:35:19', '2024-12-21 02:35:19', NULL, NULL),
(82, 'Bánh Bastry', 'banh-bastry', 66, '2024-12-21 02:35:41', '2024-12-21 02:35:41', NULL, NULL),
(83, 'Cà Phê Tại Nhà', 'ca-phe-tai-nha', 67, '2024-12-21 02:36:03', '2024-12-21 02:36:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'menu1', '', 0, NULL, NULL),
(2, 'menu2', '', 0, NULL, NULL),
(3, 'menu3', '', 0, NULL, NULL),
(4, 'menu1.1', '', 1, NULL, NULL),
(5, 'menu2.1', '', 2, NULL, NULL),
(6, 'menu1.1.2', 'menu112', 4, NULL, '2024-11-21 05:15:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_24_081955_create_categories_table', 1),
(6, '2024_10_31_082544_add_column_deleted_at_table_categories', 2),
(7, '2024_11_20_095659_create_menus_table', 3),
(8, '2024_11_25_053445_create_products_table', 4),
(9, '2024_11_25_053946_create_product_images_table', 5),
(10, '2024_11_25_054244_create_tags_table', 6),
(11, '2024_11_25_054431_create_product_tags_table', 6),
(12, '2024_11_25_120320_rename_column_in_product_images_table', 7),
(13, '2024_12_01_073523_create_sliders_table', 8),
(14, '2024_12_01_092528_create_settings_table', 9),
(15, '2024_12_07_061136_create_roles_table', 10),
(16, '2024_12_07_061201_create_permissions_table', 10),
(17, '2024_12_07_061300_create_role_user', 10),
(18, '2024_12_07_061335_create_permission_role_table', 10),
(19, '2024_12_25_073500_create_blogs_table', 11),
(20, '2024_12_25_080432_add_column_feature_image_name_in_blogs_table', 12),
(21, '2025_01_01_092333_add_column_url_to_categories_table', 13),
(22, '2025_01_08_104319_create_orders_table', 14),
(23, '2025_01_11_055142_create_table_product_order', 15),
(24, '2025_01_11_062101_add_column_quantity_in_product_order_table', 16),
(26, '2025_01_11_064237_add_column_total_price_and_column_order_code_in_orders_table', 17),
(27, '2025_01_15_084552_create_product_feedback_table', 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `discount_code` varchar(191) DEFAULT NULL,
  `city_address` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_code` varchar(191) NOT NULL,
  `total_price` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `address`, `discount_code`, `city_address`, `email`, `phone`, `status`, `user_id`, `note`, `created_at`, `updated_at`, `order_code`, `total_price`) VALUES
(5, 'Nam', 'Trần', '87, Đường 30/4', '123', 'Tây Ninh', 'nammtran2408@gmail.com', '0937197829', 2, 1, 'Thêm cho tôi 1 ống hút', '2025-01-10 23:56:33', '2025-01-11 01:41:00', 'ORD-6782162120D74', '182,000'),
(6, 'Dũng', 'Nguyễn Trung', '198, Đường 30/2', '123dgrs4', 'Thành Phố Hồ Chí Minh', 'Guest@gmail.com', '0123456789', 1, 5, 'Để đá riêng giúp ạ !', '2025-01-11 03:26:48', '2025-01-11 03:30:21', 'ORD-6782476855F96', '119,000'),
(7, 'Dũng', 'Nguyễn Trung', '198, Đường 30/2', '123456', 'Thành Phố Hồ Chí Minh', 'Guest@gmail.com', '0123456789', 0, 5, 'Thêm cho tôi 1 ống hút', '2025-01-11 03:31:28', '2025-01-11 03:31:28', 'ORD-6782488073582', '119,000'),
(8, 'Dũng', 'Nguyễn Trung', '198, Đường 30/2', '123', 'Tây Ninh', 'Guest@gmail.com', '0123456789', 0, 5, 'Thêm cho tôi 1 ống hút', '2025-01-14 23:53:36', '2025-01-14 23:53:36', 'ORD-67875B70337DB', '49,000'),
(9, 'Nam', 'Trần', '198, Đường 30/2', '123', 'Tây Ninh', 'nammtran2408@gmail.com', '0123456789', 0, 1, 'Thêm cho tôi 1 ống hút', '2025-01-15 00:39:30', '2025-01-15 00:39:30', 'ORD-6787663259C0B', '168,000'),
(10, 'Nam', 'Trần', '87, Đường 30/4', '123', 'Tây Ninh', 'nammtran2408@gmail.com', '0937197829', 0, 1, 'Thêm cho tôi 1 ống hút', '2025-01-15 01:32:05', '2025-01-15 01:32:05', 'ORD-67877285BCC47', '105,000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `key_code` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `display_name`, `name`, `key_code`, `parent_id`, `created_at`, `updated_at`) VALUES
(7, 'category', 'category', '', 0, '2024-12-11 01:21:02', '2024-12-11 01:21:02'),
(8, 'add', 'add', 'category_add', 7, '2024-12-11 01:21:02', '2024-12-11 01:21:02'),
(9, 'list', 'list', 'category_list', 7, '2024-12-11 01:21:02', '2024-12-11 01:21:02'),
(10, 'update', 'update', 'category_update', 7, '2024-12-11 01:21:02', '2024-12-11 01:21:02'),
(11, 'delete', 'delete', 'category_delete', 7, '2024-12-11 01:21:02', '2024-12-11 01:21:02'),
(12, 'menu', 'menu', '', 0, '2024-12-11 01:41:18', '2024-12-11 01:41:18'),
(13, 'add', 'add', 'menu_add', 12, '2024-12-11 01:41:18', '2024-12-11 01:41:18'),
(14, 'list', 'list', 'menu_list', 12, '2024-12-11 01:41:18', '2024-12-11 01:41:18'),
(15, 'update', 'update', 'menu_update', 12, '2024-12-11 01:41:18', '2024-12-11 01:41:18'),
(16, 'delete', 'delete', 'menu_delete', 12, '2024-12-11 01:41:18', '2024-12-11 01:41:18'),
(17, 'user', 'user', '', 0, '2024-12-11 01:41:52', '2024-12-11 01:41:52'),
(18, 'list', 'list', 'user_list', 17, '2024-12-11 01:41:52', '2024-12-11 01:41:52'),
(19, 'update', 'update', 'user_update', 17, '2024-12-11 01:41:52', '2024-12-11 01:41:52'),
(20, 'delete', 'delete', 'user_delete', 17, '2024-12-11 01:41:52', '2024-12-11 01:41:52'),
(21, 'permission', 'permission', '', 0, '2024-12-11 02:36:03', '2024-12-11 02:36:03'),
(22, 'add', 'add', 'permission_add', 21, '2024-12-11 02:36:03', '2024-12-11 02:36:03'),
(23, 'delete', 'delete', 'permission_delete', 21, '2024-12-11 02:36:03', '2024-12-11 02:36:03'),
(24, 'product', 'product', '', 0, '2024-12-12 06:49:40', '2024-12-12 06:49:40'),
(25, 'add', 'add', 'product_add', 24, '2024-12-12 06:49:40', '2024-12-12 06:49:40'),
(26, 'list', 'list', 'product_list', 24, '2024-12-12 06:49:40', '2024-12-12 06:49:40'),
(27, 'update', 'update', 'product_update', 24, '2024-12-12 06:49:40', '2024-12-12 06:49:40'),
(28, 'delete', 'delete', 'product_delete', 24, '2024-12-12 06:49:40', '2024-12-12 06:49:40'),
(29, 'slider', 'slider', '', 0, '2024-12-12 06:49:48', '2024-12-12 06:49:48'),
(30, 'add', 'add', 'slider_add', 29, '2024-12-12 06:49:48', '2024-12-12 06:49:48'),
(31, 'list', 'list', 'slider_list', 29, '2024-12-12 06:49:48', '2024-12-12 06:49:48'),
(32, 'update', 'update', 'slider_update', 29, '2024-12-12 06:49:48', '2024-12-12 06:49:48'),
(33, 'delete', 'delete', 'slider_delete', 29, '2024-12-12 06:49:48', '2024-12-12 06:49:48'),
(34, 'setting', 'setting', '', 0, '2024-12-12 06:49:58', '2024-12-12 06:49:58'),
(35, 'add', 'add', 'setting_add', 34, '2024-12-12 06:49:58', '2024-12-12 06:49:58'),
(36, 'list', 'list', 'setting_list', 34, '2024-12-12 06:49:58', '2024-12-12 06:49:58'),
(37, 'update', 'update', 'setting_update', 34, '2024-12-12 06:49:58', '2024-12-12 06:49:58'),
(38, 'delete', 'delete', 'setting_delete', 34, '2024-12-12 06:49:58', '2024-12-12 06:49:58'),
(39, 'role', 'role', '', 0, '2024-12-12 06:50:25', '2024-12-12 06:50:25'),
(40, 'add', 'add', 'role_add', 39, '2024-12-12 06:50:25', '2024-12-12 06:50:25'),
(41, 'list', 'list', 'role_list', 39, '2024-12-12 06:50:25', '2024-12-12 06:50:25'),
(42, 'update', 'update', 'role_update', 39, '2024-12-12 06:50:25', '2024-12-12 06:50:25'),
(43, 'delete', 'delete', 'role_delete', 39, '2024-12-12 06:50:25', '2024-12-12 06:50:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(14, 18, 6, NULL, NULL),
(15, 20, 6, NULL, NULL),
(19, 36, 6, NULL, NULL),
(20, 40, 6, NULL, NULL),
(26, 11, 2, NULL, NULL),
(27, 9, 2, NULL, NULL),
(57, 10, 2, NULL, NULL),
(59, 9, 1, NULL, NULL),
(60, 10, 1, NULL, NULL),
(61, 8, 1, NULL, NULL),
(62, 11, 1, NULL, NULL),
(63, 13, 1, NULL, NULL),
(64, 14, 1, NULL, NULL),
(65, 15, 1, NULL, NULL),
(66, 16, 1, NULL, NULL),
(67, 18, 1, NULL, NULL),
(68, 19, 1, NULL, NULL),
(69, 20, 1, NULL, NULL),
(70, 22, 1, NULL, NULL),
(71, 23, 1, NULL, NULL),
(72, 25, 1, NULL, NULL),
(73, 26, 1, NULL, NULL),
(74, 27, 1, NULL, NULL),
(75, 28, 1, NULL, NULL),
(76, 30, 1, NULL, NULL),
(77, 31, 1, NULL, NULL),
(78, 32, 1, NULL, NULL),
(79, 33, 1, NULL, NULL),
(80, 35, 1, NULL, NULL),
(81, 36, 1, NULL, NULL),
(82, 37, 1, NULL, NULL),
(83, 38, 1, NULL, NULL),
(84, 40, 1, NULL, NULL),
(85, 41, 1, NULL, NULL),
(86, 42, 1, NULL, NULL),
(87, 43, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `feature_image_path` varchar(191) DEFAULT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `feature_image_name` varchar(191) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `feature_image_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 'Bạc Xỉu Đá', '39000', '/storage/products/1/kormQOpkqR3VdAAcKbVf.jpg', '<p>Bạc sỉu&nbsp;l&agrave; một m&oacute;n đồ uống đ&atilde; theo ch&acirc;n người Hoa du nhập v&agrave;o S&agrave;i G&ograve;n v&agrave;o những năm của thập ni&ecirc;n 1950. Bạc sỉu kh&aacute; giống với c&agrave; ph&ecirc; sữa. Nhưng khi chế biến, c&agrave; ph&ecirc; sữa sẽ c&oacute; phần c&agrave; ph&ecirc; nhiều hơn phần sữa. C&ograve;n bạc xỉu th&igrave; ngược lại, phần sữa nhiều hơn phần c&agrave; ph&ecirc;. Nếu quan s&aacute;t kỹ v&agrave; cảm nhận kỹ hơn th&igrave; c&oacute; thể nhận ra được điều n&agrave;y.&nbsp;</p>\r\n<p>Bạc sỉu theo tiếng của những người Hoa sống tại v&ugrave;ng S&agrave;i G&ograve;n - Chợ Lớn th&igrave; được gọi tắt từ cụm \"Bạc tẩy sỉu ph&eacute;\". Bạc l&agrave; \"trắng\". Tẩy l&agrave; \"ly\". Sỉu l&agrave; \"một ch&uacute;t\". Ph&eacute; l&agrave; \"c&agrave; ph&ecirc;\". Bạc sỉu ch&iacute;nh l&agrave; \"Ly sữa trắng k&egrave;m một ch&uacute;t c&agrave; ph&ecirc;\". N&oacute;i về nguồn gốc, th&igrave; trước đ&acirc;y, người lao động phổ th&ocirc;ng d&ugrave;ng sữa đặc pha với nước n&oacute;ng để thay thế cho sữa tươi đắt đỏ trong thời điểm ấy. Tuy vậy, vị sữa đặc pha kh&aacute; nồng v&agrave; ngọt n&ecirc;n họ th&ecirc;m ch&uacute;t c&agrave; ph&ecirc; v&agrave;o cho ly sữa th&ecirc;m thơm v&agrave; hấp dẫn. Người S&agrave;i G&ograve;n xưa chỉ d&ugrave;ng bạc sỉu n&oacute;ng. Tuy nhi&ecirc;n, theo thời gian, người ta th&ecirc;m đ&aacute; v&agrave;o để uống, khiến n&oacute; trở n&ecirc;n m&aacute;t mẻ, tuyệt vời trong những ng&agrave;y oi bức.</p>\r\n<p><img src=\"https://file.hstatic.net/1000075078/file/bac_siu_da_lifestyle_c8405108b5414259875bc5f6eb4478f0_grande.jpg\" width=\"344\" height=\"344\"></p>', 1, 70, 'bạc xỉu.jpg', NULL, '2024-11-26 00:42:50', '2024-12-25 05:04:36'),
(18, 'Cà phê Sữa Đá', '35000', '/storage/products/1/bI85yg5oHBcsmnc5Hv2j.jpg', '<p>C&agrave; ph&ecirc; Đắk Lắk nguy&ecirc;n chất được pha phin truyền thống kết hợp với sữa đặc tạo n&ecirc;n hương vị đậm đ&agrave;, h&agrave;i h&ograve;a giữa vị ngọt đầu lưỡi v&agrave; vị đắng thanh tho&aacute;t nơi hậu vị.</p>', 1, 70, 'cà-phê-sữa-đá.jpg', NULL, '2024-11-26 01:39:25', '2024-12-24 23:40:47'),
(19, 'Latte nóng', '55000', '/storage/products/1/dq8LGxs1gI29EGe84PCY.jpg', '<p>Một sự kết hợp tinh tế giữa vị đắng c&agrave; ph&ecirc; Espresso nguy&ecirc;n chất h&ograve;a quyện c&ugrave;ng vị sữa n&oacute;ng ngọt ng&agrave;o, b&ecirc;n tr&ecirc;n l&agrave; một lớp kem mỏng nhẹ tạo n&ecirc;n một t&aacute;ch c&agrave; ph&ecirc; ho&agrave;n hảo về hương vị lẫn nh&atilde;n quan.</p>', 1, 68, 'latte nóng.jpg', NULL, '2024-11-26 01:42:25', '2024-12-24 22:09:51'),
(20, 'Trà Đào Cam Sả Đá', '49000', '/storage/products/1/Zm7i2NJT2hkBlYfj8jEn.jpg', '<p>Vị thanh ngọt của đ&agrave;o, vị chua dịu của Cam V&agrave;ng nguy&ecirc;n vỏ, vị ch&aacute;t của tr&agrave; đen tươi được ủ mới mỗi 4 tiếng, c&ugrave;ng hương thơm nồng đặc trưng của sả ch&iacute;nh l&agrave; điểm s&aacute;ng l&agrave;m n&ecirc;n sức hấp dẫn của thức uống n&agrave;y.</p>', 1, 72, 'trà đào cam sả đá.jpg', NULL, '2024-11-26 01:56:30', '2024-12-24 23:40:08'),
(30, 'Hi-tea Yuzu Trân Châu', '49000', '/storage/products/1/PuC0FIbJKu74hiEBdBR6.jpg', '<p>Kh&ocirc;ng chỉ nổi bật với sắc đỏ đặc trưng từ tr&agrave; hoa Hibiscus, Hi-Tea Yuzu c&ograve;n g&acirc;y ấn tượng với topping Yuzu (qu&yacute;t Nhật) lạ miệng, kết hợp c&ugrave;ng tr&acirc;n ch&acirc;u trắng dai gi&ograve;n sần sật, nhai vui vui.</p>', 1, 75, 'Hi-tea-Yuzu-trân-châu.jpg', NULL, '2024-12-24 22:57:39', '2024-12-25 05:03:45'),
(31, 'Bánh Mì Que Pate', '15000', '/storage/products/1/30bq2KI1TavmyVvEbE8j.jpg', '<p>Vỏ b&aacute;nh m&igrave; gi&ograve;n tan, kết hợp với lớp nh&acirc;n pate b&eacute;o b&eacute;o đậm đ&agrave; sẽ l&agrave; lựa chọn l&yacute; tưởng nhẹ nh&agrave;ng để lấp đầy chiếc bụng đ&oacute;i , cho 1 bữa s&aacute;ng - trưa - chiều - tối của bạn th&ecirc;m phần th&uacute; vị.</p>', 1, 80, 'Bánh-Mì-Que-Pate.jpg', NULL, '2024-12-24 23:00:18', '2024-12-25 05:03:01'),
(32, 'Đường Đen Marble Latte', '55000', '/storage/products/1/NWJlmvucB8pUBCMkBwWi.jpg', '<p>Đường Đen Marble Latte &ecirc;m dịu cực hấp dẫn bởi vị c&agrave; ph&ecirc; đắng nhẹ ho&agrave; quyện c&ugrave;ng vị đường đen ngọt thơm v&agrave; sữa tươi b&eacute;o mịn. Sự kết hợp đầy mới mẻ của c&agrave; ph&ecirc; v&agrave; đường đen cũng tạo n&ecirc;n diện mạo ph&acirc;n tầng đẹp mắt. Đ&acirc;y l&agrave; lựa chọn đ&aacute;ng thử để bạn khởi đầu ng&agrave;y mới đầy hứng khởi. - Khuấy đều trước khi sử dụng</p>', 1, 70, 'Đường Đen Marble Latte.jpg', NULL, '2024-12-26 05:05:18', '2024-12-26 05:05:18'),
(33, 'Caramel Macchiato Nóng', '55000', '/storage/products/1/N6ZjFyvrtUDtcpFur6Ys.jpg', '<p>Caramel Macchiato sẽ mang đến một sự ngạc nhi&ecirc;n th&uacute; vị khi vị thơm b&eacute;o của bọt sữa, sữa tươi, vị đắng thanh tho&aacute;t của c&agrave; ph&ecirc; Espresso hảo hạng v&agrave; vị ngọt đậm của sốt caramel được g&oacute;i gọn trong một t&aacute;ch c&agrave; ph&ecirc;</p>', 1, 70, 'Caramel Macchiato Nóng.jpg', NULL, '2024-12-26 05:08:09', '2024-12-26 05:08:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_feedback`
--

CREATE TABLE `product_feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_feedback`
--

INSERT INTO `product_feedback` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 18, 1, 4, 'ngon', '2025-01-15 04:07:43', '2025-01-15 04:07:43'),
(2, 20, 5, 5, 'Quá ngon, đã lưu vào danh sách <3', '2025-01-15 04:34:27', '2025-01-15 04:34:27'),
(3, 20, 5, 3, 'Tôi cảm thấy hơi chua, nhưng nói chung tạm ổn', '2025-01-15 04:35:59', '2025-01-15 04:35:59'),
(4, 20, 5, 1, 'Nước có mùi hôi, cảm nhận tệ !', '2025-01-15 04:45:26', '2025-01-15 04:45:26'),
(5, 20, 5, 2, 'Không ổn chút nào !', '2025-01-15 04:51:32', '2025-01-15 04:51:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) DEFAULT NULL,
  `image_name` varchar(191) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(46, '/storage/products/1/yqjEJFEdfUaolUoJyXRg.jpg', 'bạc xỉu(2).jpg', 21, '2024-11-28 04:34:40', '2024-11-28 04:34:40'),
(47, '/storage/products/1/dH7Nb0P3G5dnushA4ckC.jpg', 'cà-phê-sữa-nóng.jpg', 22, '2024-11-28 04:47:40', '2024-11-28 04:47:40'),
(48, '/storage/products/1/qJxTQ8UVRAtvGLSqxTf4.jpg', 'bạc xỉu(2).jpg', 23, '2024-11-28 04:56:08', '2024-11-28 04:56:08'),
(49, '/storage/products/1/1LgeLLsC5aMfXLHuLERe.jpg', 'bạc xỉu(3).jpg', 24, '2024-11-28 04:56:30', '2024-11-28 04:56:30'),
(52, '/storage/products/1/wHYWoJ06dD5P1iq8aiip.jpg', 'bạc xỉu(3).jpg', 27, '2024-11-28 05:26:31', '2024-11-28 05:26:31'),
(53, '/storage/products/1/uk68hp3S1qUgexZls78E.jpg', 'bạc xỉu(4).jpg', 28, '2024-11-28 05:27:21', '2024-11-28 05:27:21'),
(54, '/storage/products/1/Mb98E3hONbZ7EzHhdA1q.jpg', 'cà phê sữa(2).jpg', 29, '2024-11-28 05:27:40', '2024-11-28 05:27:40'),
(55, '/storage/products/1/5PpHqqA7PxkYMle0oIiy.jpg', 'latte nóng(2).jpg', 19, '2024-12-24 22:09:51', '2024-12-24 22:09:51'),
(56, '/storage/products/1/Sc3n3brMk5zga7Y3GmpE.webp', 'latte nóng(3)jpg.webp', 19, '2024-12-24 22:09:51', '2024-12-24 22:09:51'),
(88, '/storage/products/1/eJmt1C77l9CJ4RuzZIFa.jpg', 'trà đào cam sả đá(2) - Copy.jpg', 20, '2024-12-24 23:40:08', '2024-12-24 23:40:08'),
(89, '/storage/products/1/Ayra2tmYVOliP5JsjKXq.jpg', 'trà đào cam sả đá(3) - Copy.jpg', 20, '2024-12-24 23:40:08', '2024-12-24 23:40:08'),
(90, '/storage/products/1/7pAOKCvIXaiGZgRVOpYb.jpg', 'cà phê sữa(2).jpg', 18, '2024-12-24 23:40:47', '2024-12-24 23:40:47'),
(91, '/storage/products/1/UvApiOroAd579j5bsmZw.jpg', 'Bánh-Mì-Que-Pate(2).jpg', 31, '2024-12-25 05:03:01', '2024-12-25 05:03:01'),
(92, '/storage/products/1/uN67DthkKKrwpiAdAek5.jpg', 'Bánh-Mì-Que-Pate(3).jpg', 31, '2024-12-25 05:03:01', '2024-12-25 05:03:01'),
(93, '/storage/products/1/WsjZhx1kJDB9MvhKSgkx.jpg', 'Hi-tea-Yuzu-trân-châu(2).jpg', 30, '2024-12-25 05:03:45', '2024-12-25 05:03:45'),
(94, '/storage/products/1/eEeXtUkAGWXVkm1uwBfh.jpg', 'Hi-tea-Yuzu-trân-châu(3).jpg', 30, '2024-12-25 05:03:45', '2024-12-25 05:03:45'),
(95, '/storage/products/1/ij1RDYGbDFVFrraz9ACe.jpg', 'bạc xỉu(2).jpg', 17, '2024-12-25 05:04:36', '2024-12-25 05:04:36'),
(96, '/storage/products/1/Ld8d7HS3qCy0glgbGKuk.jpg', 'bạc xỉu(3).jpg', 17, '2024-12-25 05:04:36', '2024-12-25 05:04:36'),
(97, '/storage/products/1/FaSKvfhZ9eMkTwJPJem2.jpg', 'bạc xỉu(4).jpg', 17, '2024-12-25 05:04:36', '2024-12-25 05:04:36'),
(98, '/storage/products/1/JN1RI7IVcalVJedcS6YX.jpg', 'bạc xỉu(5)jpg.jpg', 17, '2024-12-25 05:04:36', '2024-12-25 05:04:36'),
(99, '/storage/products/1/8r0hx2L4JY7UJsu4UUEX.jpg', 'bạc xỉu(6).jpg', 17, '2024-12-25 05:04:36', '2024-12-25 05:04:36'),
(100, '/storage/products/1/krbhna4Krga3bNCf4Qg1.jpg', 'Đường Đen Marble Latte.jpg', 32, '2024-12-26 05:05:18', '2024-12-26 05:05:18'),
(101, '/storage/products/1/kiydU11pOM6yPIDDAE9A.jpg', 'Caramel Macchiato Nóng(2).jpg', 33, '2024-12-26 05:08:09', '2024-12-26 05:08:09'),
(102, '/storage/products/1/oSOWpNY7OFjRNqDJksnV.jpg', 'Caramel Macchiato Nóng(3).jpg', 33, '2024-12-26 05:08:09', '2024-12-26 05:08:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_order`
--

CREATE TABLE `product_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_order`
--

INSERT INTO `product_order` (`id`, `product_id`, `order_id`, `created_at`, `updated_at`, `quantity`) VALUES
(1, 18, 3, NULL, NULL, 1),
(2, 20, 3, NULL, NULL, 6),
(3, 17, 4, NULL, NULL, 1),
(4, 18, 4, NULL, NULL, 2),
(5, 32, 4, NULL, NULL, 3),
(6, 20, 5, NULL, NULL, 3),
(7, 18, 5, NULL, NULL, 1),
(8, 20, 6, NULL, NULL, 1),
(9, 18, 6, NULL, NULL, 2),
(10, 18, 7, NULL, NULL, 2),
(11, 20, 7, NULL, NULL, 1),
(12, 20, 8, NULL, NULL, 1),
(13, 18, 9, NULL, NULL, 2),
(14, 20, 9, NULL, NULL, 2),
(15, 18, 10, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `tag_id`, `product_id`, `created_at`, `updated_at`) VALUES
(24, 26, 21, '2024-11-28 04:34:40', '2024-11-28 04:34:40'),
(25, 26, 22, '2024-11-28 04:47:40', '2024-11-28 04:47:40'),
(26, 26, 23, '2024-11-28 04:56:08', '2024-11-28 04:56:08'),
(27, 26, 24, '2024-11-28 04:56:30', '2024-11-28 04:56:30'),
(28, 26, 27, '2024-11-28 05:26:31', '2024-11-28 05:26:31'),
(29, 27, 28, '2024-11-28 05:27:21', '2024-11-28 05:27:21'),
(30, 27, 29, '2024-11-28 05:27:40', '2024-11-28 05:27:40'),
(31, 28, 19, '2024-12-24 22:09:52', '2024-12-24 22:09:52'),
(32, 29, 19, '2024-12-24 22:09:52', '2024-12-24 22:09:52'),
(53, 36, 20, '2024-12-24 23:40:08', '2024-12-24 23:40:08'),
(54, 36, 18, '2024-12-24 23:40:47', '2024-12-24 23:40:47'),
(55, 38, 31, '2024-12-25 05:03:01', '2024-12-25 05:03:01'),
(56, 38, 30, '2024-12-25 05:03:45', '2024-12-25 05:03:45'),
(57, 41, 17, '2024-12-25 05:04:36', '2024-12-25 05:04:36'),
(58, 42, 32, '2024-12-26 05:05:18', '2024-12-26 05:05:18'),
(59, 42, 33, '2024-12-26 05:08:09', '2024-12-26 05:08:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Quản lý hệ thống', NULL, NULL),
(2, 'Guest', 'Khách hàng', NULL, NULL),
(3, 'Developer', 'Phát triển hệ thống', NULL, NULL),
(4, 'Content', 'Nội dung phần mềm', NULL, NULL),
(5, 'Customer', 'Khách hàng 2', '2024-12-12 06:38:42', '2024-12-12 06:38:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(9, 1, 1, NULL, NULL),
(10, 1, 3, NULL, NULL),
(11, 1, 4, NULL, NULL),
(12, 5, 2, NULL, NULL),
(13, 5, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(191) NOT NULL,
  `config_value` text NOT NULL,
  `type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `type`, `created_at`, `updated_at`) VALUES
(2, 'html-quantity-store', '<a href=\"/\">\r\n            <img src=\"https://file.hstatic.net/1000075078/file/vector_706a88566eab4f009bed6eea93cd890b.png\">\r\n             <span>97 Cửa hàng khắp cả nước</span>\r\n</a>', 'textarea', '2024-12-01 03:22:36', '2024-12-01 03:22:36'),
(3, 'phone-contact', '0937197829', 'text', '2024-12-01 03:53:14', '2024-12-01 03:53:14'),
(4, 'contact-email', 'nammtran2408@gmail.com', 'text', '2025-01-08 03:18:36', '2025-01-08 03:18:36'),
(5, 'secure-payment-html', '<div class=\"sb-text\">\r\n                                <h6>Secure Payment</h6>\r\n                                <p>100% secure payment</p>\r\n                            </div>', 'textarea', '2025-01-08 03:24:51', '2025-01-08 03:24:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image_path`, `image_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'slider3', '/storage/slider/5/TUJDhO7rMAhBOeCZwzVr.jpg', 'slider-3.jpg', 'slider3', NULL, '2024-12-17 01:22:08', '2024-12-17 01:22:08'),
(4, 'slider4', '/storage/slide/5/wloYNUC7Lxioea7W0dKc.jpg', 'slider-4.jpg', 'slider4', NULL, '2024-12-17 01:24:23', '2024-12-17 01:30:03'),
(5, 'slider5', '/storage/slide/5/yqp3aYJ6GgT4ltHBJA8V.jpg', 'slider-5.jpg', 'slider5', NULL, '2024-12-17 01:24:38', '2024-12-17 01:27:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(35, '25', '2024-12-24 22:11:47', '2024-12-24 22:11:47'),
(36, 'bestseller', '2024-12-24 22:57:39', '2024-12-24 22:57:39'),
(37, 'banhmi', '2024-12-24 23:00:18', '2024-12-24 23:00:18'),
(38, '36', '2024-12-24 23:17:10', '2024-12-24 23:17:10'),
(39, '37', '2024-12-24 23:17:10', '2024-12-24 23:17:10'),
(40, 'caphe', '2024-12-24 23:18:45', '2024-12-24 23:18:45'),
(41, '40', '2024-12-25 05:04:36', '2024-12-25 05:04:36'),
(42, 'caphemay', '2024-12-26 05:05:18', '2024-12-26 05:05:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 'nammtran2408@gmail.com', NULL, '$2y$10$GFWnsUpTyfLE.mHAUhpEq.Oy5KkPqOkFWskF7el3iU/fVoyOfpJpi', 'mOS9BBxO7I1MKTyMWVni0EJDKY1dOUZhbUHe8fNJLQDvUgkgUY6flzxO1LOc', NULL, '2024-12-07 03:12:28'),
(5, 'Dũng', 'Guest@gmail.com', NULL, '$2y$10$JlHYGf3PL8CV5sx78C0yeuKdAJ5lQhdF3iUzRTCqWLmRuo5P9EclO', '69nNSFRZuZEHIkTPVLFNaYPmLPsg4Llft5jjYyqIUPdwGFUw5ofSSqaFBREe', '2024-11-23 05:02:13', '2024-12-13 15:12:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `product_feedback`
--
ALTER TABLE `product_feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
