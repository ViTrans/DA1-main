-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 19, 2022 lúc 08:47 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlibannuochoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Đức Tiến', 'demo@gmail.com', '123@abc'),
(2, 'Vĩ Trần', 'demo1@gmail.com', 'abc@123'),
(3, 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status_delete`) VALUES
(4, 'Nam', 0),
(96, 'Nữ', 0),
(97, 'Unisex', 0),
(101, 'Sản Phẩm Nổi Bật', 0),
(102, 'Sản phẩm bán chạy', 0),
(103, 'sản phẩm sale', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `phone`, `address`, `status_delete`) VALUES
(1, 'Missi Perfume', ' 0909638523', '285/141 CMT8, P.12, Q.10, Tp Hồ Chí Minh', 0),
(2, 'Jolie Dion', '091363688', '285/141 CMT8, P.12, Q.10, Tp Hồ Chí Minh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `time` datetime DEFAULT current_timestamp(),
  `name_receive` varchar(255) DEFAULT NULL,
  `phone_receive` varchar(255) DEFAULT NULL,
  `address_receive` text DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `time`, `name_receive`, `phone_receive`, `address_receive`, `note`, `status`, `user_id`, `status_delete`, `total_price`) VALUES
(19, '2022-07-19 12:51:48', 'vitran', '0942044075', '201/14 , Đường Nguyễn Tri Phương , Phường Long Thạnh', 'Giao lúc 12h đêm', 1, 9, 0, 10350000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `quantity` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`quantity`, `product_id`, `order_id`, `price`, `total`) VALUES
(1, 37, 19, 6950000, 6950000),
(1, 60, 19, 3400000, 3400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0,
  `create_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `img`, `category_id`, `manufacturer_id`, `status_delete`, `create_at`, `update_at`) VALUES
(37, 'Enigma Parfum Cologne 100ml', 6950000, 'Roja Parfum là một trong những hãng nước hoa xa xỉ bậc nhất thế giới. Với nhiều sáng tạo thơm với vàng bên trong, có giá lên tới cả nghìn đô hoặc cao hơn, nhà điều hương Roja Dove đã khẳng định rằng trong nước hoa của ông, vàng không phải là thành phần đắt giá nhất. Trong các phiên bản Roja Enigma, thì phiên bản mới nhất ra đời vào năm 2019 tức Roja Enigma Parfum Cologne sẽ là chai dễ sử dụng nhất. Một mùi hương sang trọng, lịch sự nhưng vẫn toát lên 1 sự trẻ trung, năng động, rất dễ để gây được ấn tượng với những người xung quanh. Mở đầu của Roja Enigma Parfum Cologne có cảm giác như đang ngửi một chai Coca Cola lạnh, vừa mới mở nắp, rót ra cốc và cho thêm vài lát chanh vào vậy, mùi Coca Cola mát lạnh thêm vài lát chanh kèm hiệu ứng sủi sủi cực chân thực. Mỗi lần xịt Roja Enigma Parfum Cologne, cái phần mở đầu này luôn luôn cho tôi một cảm giác tràn trề năng lượng, nhiều sức sống, dễ dàng khiến bản thân cảm thấy vui tươi, nhất là hôm nào thức dậy mà thấy uể oải mệt mỏi. Phiên bản Enigma này sau khi xịt, tôi thấy rằng sẽ bốc tỏa mạnh nhất và rõ nhất cái vibe Coca Cola sau 2,3 tiếng. Về sau, mùi hương chuyển dần thành dạng mùi thuốc lá lên cùng rượu Cognac khá rõ, bên cạnh đó là Vanilla tạo một độ ngọt nhất định cho mùi hương, cực kì nịnh mũi và dễ chịu. Với tôi thì thú chơi cơ bản của cánh mày râu sẽ xoay quanh xì gà và rượu, và thật trùng hợp đó là những thứ mà ta có thể tìm thấy ở Enigma. Thế nên ta sẽ thấy một sự sang trọng, chín chắn, lịch sự và có chiều sâu nhất định ở mùi hương này, tuy nhiên lại toát lên một vẻ gì đó kiểu vui tươi hơi “ăn chơi”. Xét về tổng thể thì Roja Enigma Parfum Cologne vẫn là một chai nước hoa cực kì dễ sử dụng và không hề bị già.  Tuy có profile là một chai nước hoa theo hướng ngọt, đặc biệt là có ngọt của Vanilla, nhưng Roja Enigma Parfum Cologne khá là đa dụng, những này thu đông thì chắc chắn là rất hợp rồi, tuy nhiên nó cũng hoàn toàn có thể dùng vào những ngày trời hè không quá nóng, hoặc nếu các bạn chủ yếu làm việc văn phòng điều hòa thì xịt thoải mái không sợ làm ai bị khó chịu. Nếu bạn thấy Elysium bị hơi formal quá và muốn gì đó “chơi” hơn, ít đụng hàng hơn rất nhiều thì hãy thử qua Roja Elysium Parfum Cologne, tôi tin chắc rằng chai nước hoa này sẽ không làm bạn phải thất vọng.', '58c9b52710fd0d08ab7d1bad3809755c.png', 4, 1, 0, '2022-07-19 12:07:34', NULL),
(38, 'Minty Man 100ml', 2200000, 'Minty Man bởi Dame Perfumery là một trong những chai nước hoa với chủ điểm bạc hà hay nhất mà tôi từng được thử. Bạc hà ở chai này làm rất tốt, để diễn giải bằng lời thì khó, nhưng cảm giác nó làm vừa đủ. Nếu làm bạc hà không tới, sẽ chỉ cảm thấy một mùi man mát nhẹ trống rỗng. Nếu làm quá lên, thì sẽ có cảm giác giống mùi kem đánh răng vậy. Còn ở Dame Minty Man, khi vừa xịt ra bạn sẽ có cảm giác giống như mình vừa bóc một thanh Doublemint, đưa lên miệng và tận hưởng cảm giác sảng khoái the the mát lạnh. Ngửi kĩ Minty Man sẽ thấy thoang thoảng đâu đây mùi của cam Bergamot nữa nhưng không rõ vì bạc hà gần như là chủ đạo luôn rồi. Một cảm giác xanh xanh khiến ta thấy fresh đến kì lạ. Sau một khoảng thời gian, bạc hà dần dần nhường chỗ cho trà mate xuất hiện. Trà mate hiện lên hơi ngọt nhưng cũng hơi đắng một chút, cảm giác bột bột creamy, làm ta liên tưởng đến 1 cốc trà matcha. Chính vì base notes có chứa trà nên mình cảm thấy rằng dù rất fresh nhưng chai này vẫn tạo ra chiều sâu nhất định, trẻ trung phóng khoáng nhưng vẫn điềm tĩnh. Để ý kĩ, hình như bạc hà cứ phai dần xong lại trỗi lên một cách mãnh liệt, làm nền cho các mùi khác một cách sống động. Điều duy nhất làm tôi không hài lòng là chai này lưu hương không lâu, được chừng 4 tiếng trên da là không còn cảm thấy gì nữa. Tuy nhiên nói gì thì nói, tôi sẽ vẫn chọn Minty Man cho một sáng chủ nhật nắng nhẹ, trời trong xanh, đạp xe quanh hồ Gươm, nhâm nhi 1 cốc trà Dilmah bạc hà và ngắm dòng người qua lại.', '1bf13d27baced11e0e9da53a575fec7d.png', 4, 1, 0, '2022-07-19 12:15:34', NULL),
(39, 'Light Blue Italian Love Pour Homme', 2800000, 'Ra mắt vào mùa hè năm 2022, có thể nói Light Blue Italian Love Pour Homme có rất nhiều điểm tương đồng so với đàn anh Light Blue Forever ra mắt vào mùa hè năm trước. Vẫn là cái accord mùi hương Citrus – Ozonic ở phần mở đầu và drydown về một cái base gỗ nhẹ nhàng, sạch sẽ nam tính. Vậy điểm khác biệt giữa hai phiên bản này là gì? Light Blue Italian Love Pour Homme có một cái opening khá là giống với người đàn anh Light Blue Forever. Mùi bưởi rất chân thực, tuy nhiên nếu như ở Forever là thuần hương bưởi và chỉ đệm một chút xíu cam chanh thì ở Italian Love Pour Homme, ta có bưởi và cam bergamote được blend với nhau rất đều tay, không cái nào lấn át cái nào. Cam bergamote dường như khiến mùi hương mượt mà hơn, nịnh mũi hơn. Khi mùi hương dịu đi, ta bắt đầu cảm nhận thấy mùi hương có một nét hơi xanh xanh cùng với cảm giác Ozonic nhẹ khiến ta cảm thấy cực kì khoan khoái dễ chịu, nhất là những ngày hè nóng bức. Sau khoảng 2 tiếng, mùi hương drydown hẳn, ta thấy một hợp hương với citrus nhẹ nhàng, cùng với gỗ tạo cảm giác nam tính, đồng thời mùi hương cũng có một nét hơi soapy sạch sẽ, rất đa dụng và gần như có thể sử dụng cho tất cả các dịp. Italian Love Pour Homme cũng là chai nước hoa có khả năng lưu hương cực tốt, trên da tôi được khoảng 7 giờ đồng hồ, có thể nói là rất ổn với profile mùi như vậy. Nếu bạn không thích cái nét chua hơi đăng đắng đặc trưng của bưởi ở Light Blue Forever, thì tôi nghĩ rằng Italian Love Pour Homme sẽ là một sự lựa chọn hoàn hảo. Mùi hương này cùng với Light Blue Forever ra mắt năm ngoái thực sự khiến những người hâm mộ nước hoa của D&G như tôi cảm thấy vui khi có những sản phẩm mới hay như thế được ra mắt mỗi năm. Tuy nhiên, có một điểm các bạn cần lưu ý, đó là Italian Love là một phiên bản Limited Edition, thế nên nó sẽ sớm SOLD OUT thôi, đừng chần chừ nếu bạn muốn sở hữu mùi hương này…', 'd0e650c9bcd783f10a40e93040453161.png', 4, 1, 0, '2022-07-19 12:16:29', NULL),
(40, 'L’Occitane Eau de Bavx', 2400000, 'Mới xịt L’Occitane Eau de Bavx ra, bạn sẽ cảm nhận được rõ sự xuất hiện của bạch đậu khấu và tiêu hồng, nếu là fan của YSL La nuit de Lhomme thì chắc chắn sẽ nhận thấy ngay bạch đậu khấu khá rõ và dày. Nó cho ta cảm giác ngọt nhẹ hơi dính dính và có nét cay nhẹ. Kiểu mở đầu với tiêu và gia vị này cũng không lạ lẫm trong nước hoa, cho ta có sự liên tưởng đến Spice Bomb phiên bản EDT, tuy nhiên Eau de Bavx cho cảm giác sáng hơn, dịu hơn. Chỉ sau vài phút, mùi hương phát triển trên da cực kì nhanh, lúc này sẽ khá là rõ hương nhang và cypress, cypress ở đây làm khá hay khi khiến ta liên tưởng đến vibe mùi gỗ thông như vừa mới đốn hạ xuống. Nhang và cypress cân bằng với nhau, không thành phần nào trội hẳn và chầm chậm đưa ta đến với nhân vật chính của Eau de Bavx là Vanilla. Vanilla được làm khá giản dị, không hề cầu kì, không bị ngọt ngấy mà có cảm giác hơi khô, trầm ấm đi kèm với đậu tonka. Nếu ngửi quen mấy chai nước hoa thuốc lá, bạn sẽ thấy rằng combo vani, đậu tonka và nhang ở Eau de bavx tạo ra cái hiệu ứng thuốc lá ngọt nhẹ, cũng chính vì thế mà nhiều người liên tưởng chai nước hoa này với tượng đài Tobacco Vanille đến từ Tomford. Tuy nhiên nếu Tobacco Vanille là một mùi kiểu love-hate, tức là khi ngửi mùi hương bạn sẽ chỉ thấy yêu hoặc ghét do Tobacco Vanille khá là ngọt và bám tỏa khủng, thì Eau de Bavx lại là kiểu mùi nhẹ nhàng dễ chịu khó mà có thể khiến ai cảm thấy ghét được. Xịt Eau de Bavx sẽ mang tới một cảm giác sạch sẽ, chững chạc, lịch lãm, không hề ồn ào mà là kiểu người ấm áp, biết quan tâm tới những người xung quanh. Tổng quan lại, thì Eau de Bavx là một chai nước hoa hương Vanilla khá là hay ho mà bạn nên thử, không chỉ thế nó được blend rất mượt mà, có hiệu ứng thuốc lá thơm cũng khá hay ho và sang trọng, và giá thành của nó cũng khá dễ tiếp cận với mọi người.', 'dcfed789b86be638b3bdab255642c485.png', 4, 2, 0, '2022-07-19 12:17:08', '2022-07-19 12:19:10'),
(41, 'Masculin Pluriel', 4500000, 'Lần đầu xịt Masculin Pluriel, tôi liên tưởng đến mùi một lọ aftershave mà trước đây bố tôi hay dùng. Hồi còn nhỏ ngồi trong lòng bố, cứ hít hà mãi cái mùi thơm dịu nhẹ man mát đó. Âu có lẽ cũng thêm một lý do mà tôi yêu những mùi hương theo phong cách classic này. Vừa xịt ra, tôi có phần bất ngờ vì oải hương xộc thẳng vào mũi, mạnh mẽ, dày mùi và có phần hơi “nồng” và hơi phấn phấn man mát. Một lúc sau, sự chuyển mùi khiến tôi chú ý và cực kì thích thú, oải hương phai đi từ từ và dần hiện nên cái nét gỗ tuyết tùng và chút cỏ hương bài cực kì nhẹ nhàng và nam tính. Càng về sau, gỗ càng dày lên, có thêm sự hiện diện của hoắc hương, tất cả khiến tôi cảm thấy như đang đứng trước một cây cổ thụ lớn giữa một cánh đồng oải hương, từng cơn gió mát thổi qua mang theo chút mùi đất ẩm ẩm của cỏ hương bài. Như hầu hết những mùi barbershop khác, ngoài base gỗ và oải hương, ta sẽ thấy chút mùi ngọt nhẹ rất tinh tế, nịnh mũi mà không hề bị đại trà. Mùi hương không bốc tỏa ngùn ngụt, mà quanh quẩn trên da rất vửa phải, tinh tế, đủ cho một ngày làm việc. Bên cạnh Prada Lhomme, sáng tạo này của Maison Francis Kurkdjian là mùi hương tôi sử dụng nhiều nhất để làm văn phòng. Một mùi hương của sự sạch sẽ, chỉnh chu, lịch lãm, có phần cổ điển nhưng không hề bị già. Chắc hẳn bạn đã từng nghe câu nói ở đâu đó rằng, chàng trai nào cũng cần có một đôi giày Oxford và một bộ suit, tôi xin phép bổ sung thêm vào sự lịch sự và chỉnh chu đó là Masculin Pluriel. Những ngày đi làm và cần một mùi gì đó thật đẹp để khởi đầu ngày mới, tôi luôn chọn chai nước hoa lịch lãm này.', 'd7be93cee5505fabada14ee134ebd30f.png', 4, 2, 0, '2022-07-19 12:17:41', '2022-07-19 12:19:37'),
(42, 'Eternity For Men 100ml', 1200000, 'Eternity For Men là một mùi hương nam tính, tươi mát của thương hiệu nổi tiếng Calvin Klein được chế tác bởi Carlos Benaim vào năm 1990. Một chai nước hoa mang hơi hướng cổ điển với sự mở đầu đầy thanh mát của cam chanh và hoa lavender. Về sau, hương thơm dần biến chuyển sang các thành phần như lá xô thơm, cây húng quế, hoa nhài và kết thúc bằng một chút cay ấm của gỗ đàn hương, hổ phách, cỏ hương bài và xạ hương', 'f8ca38569ee6e8a1857d791aa80b7341.png', 4, 2, 0, '2022-07-19 12:20:24', NULL),
(43, 'Nasomatto Pardon 100ml', 3850000, 'Nếu mà chỉ mô tả cực ngắn về mùi hương này thì mình sẽ mô tả Pardon là một Thanh Chocolate đen hảo hạng. Mở đầu của Pardon là mùi trầm, trầm ở Pardon cảm giác cực kì dày, tối, gai góc và mạnh mẽ, thậm chí nếu ngửi không quen hoặc là người mới chơi nước hoa thì chắc chắn sẽ xây xẩm mặt mày. Đây cũng có thể nói là một trong những nốt hương chính của Pardon khi mà cho đến tận khi drydown vẫn thấy có sự xuất hiện của nó. Sau độ 10 đến 15 phút, thì mùi hương sẽ bắt đầu mềm mại hơn, sáng hơn. Lúc này ta bắt đầu thấy sự xuất hiện của Chocolate, của gỗ đàn hương và của đậu tonka. Đậu tonka ngọt nhẹ kết hợp với cái nét béo béo, creamy của đàn hương nó như để làm dịu đi cái nét gai góc của trầm, tạo cho Pardon một sự cân bằng và lôi cuốn. Khi về hẳn drydown trên da, ta sẽ cảm nhận được một mùi Chocolate đen đắng mượt, có chút nét gỗ của đàn hương và trầm hương kết hợp với cái spicy nhẹ của quế. Nó cực kì nam tính, lôi cuốn, có sự khác biệt mà chắc chắn sẽ giúp bạn nổi bật trong đám đông. Và như thường lệ, Pardon giống như hầu hết những chai nước hoa của Nasomatto với nồng độ Extrait de Parfum hoàn toàn tự tin lưu mùi trên 10 tiếng đồng hồ.', '6619cc5044a08a321a44ce2b92bf3709.png', 4, 2, 0, '2022-07-19 12:21:20', NULL),
(44, 'Dior Sauvage Elixir 100ml', 3800000, 'Điều đầu tiên tôi nhận ra khi vừa xịt Sauvage Elixir lên tay, đó là hương citrus từ cam chanh bưởi, tuy nhiên nó không kiểu quá fresh như Sauvage bản gốc, mà có vẻ đầm hơn và ít hơn và chúng dịu đi khá là nhanh. Bên cạnh đó, ta sẽ cảm nhận rất rõ một cảm giác ấm ấm và cay cay, hơi ngọt nhẹ tới từ gia vị của tiêu, quế và bạch đậu khấu. Nếu tinh ý, bạn còn có thể thấy được sự xuất hiện của oải hương ở trong cái opening này nữa. Tất cả mọi thứ có vẻ được blend rất mượt mà, không có một thành phần nào quá nổi bật mà chúng hòa quyện với nhau một cách hoàn hảo. Có lẽ là một phiên bản trưởng thành hơn hẳn, không ồn ào trẻ trung hẳn như Sauvage bản gốc. Càng về sau, khi mùi hương bắt đầu thực sự biến chuyển, lúc này oải hương càng ngày càng lên rõ. Lúc này mùi gia vị từ bạch đậu khấu và quế vẫn còn đấy, vẫn ấm ấm hơi ngọt ngọt, có vẻ hơi kì nhưng mà cái vị ngọt ở đây tôi nghĩ nó có chút làm ta liên tưởng đến cam thảo, nhưng mà chỉ một chút thôi. Ở giai đoạn này tôi nhận ra thêm có thêm mùi gỗ. Mình đoán đây là gỗ đàn hương bởi cái cảm giác creamy hơi bột bột đặc trưng của loại gỗ này. Thêm vào đó là sự xuất hiện của amber ở làm nền như hỗ trợ những thành phần trên, gợi lên một cảm giác âm ấm và ngòn ngọt dễ chịu. Độ 2 tiếng sau, Elixir dịu hẳn trên da, trở thành một combo của amber và gỗ, gỗ ở đây không chỉ là đàn hương, mà có thêm cả hoắc hương và cỏ hương bài, càng làm cho mùi hương kiểu trưởng thành và nam tính hơn. Một cái base ấm áp, có chiều sâu, sang trọng và ngửi có cảm giác “rich” thực sự như Dior mô tả về sản phẩm trên trang chủ của mình.', '9dbec27ab55e036df5af570f65343d84.png', 4, 1, 0, '2022-07-19 12:22:08', NULL),
(45, '9AM 100ml', 1500000, '9AM là của nhà Afnan ra mắt vào năm 2021, thực sự không được quá nhiều người quan tâm. Tuy vậy, có thể nói rằng đây là một chai nước hoa cực kì chất lượng trong tầm giá, mùi hương rất tự nhiên và mượt mà chứ không theo hướng synthetic thường thấy như những chai nước hoa trước đây của Afnan. Mùi hương mở đầu với cam chanh, quýt ngọt nhẹ, sạch sẽ ngửi cực kì yêu đời, sảng khoái. Khi mùi hương dịu xuống, ta sẽ thấy lên rất rõ mùi hoa hồng, hoa oải hương, hoa cam rất nữ tính, có chút ngọt nhẹ của táo xanh và xạ hương lên kem kem mịn mịn. Đây là một mùi hương trẻ trung, lịch sự nhưng vẫn có nét cuốn hút, không bị nhàm chán hay đại trà giữa một rừng những chai nước hoa quá quen thuộc, chưa kể thì chai này cũng rất đa dụng, xịt đi dịp nào cũng được luôn. Với số tiền chưa tới 2 triệu cho chai 100ml, tôi nghĩ rằng đây thực sự là một món hời mà các bạn nữ không nên bỏ lỡ.', '454f7a995f513578a47151e9198d69a9.png', 96, 1, 0, '2022-07-19 12:23:30', NULL),
(46, 'Soliflore Osmanthus 100ml', 2200000, 'Hoa mộc là một loại hoa trông thanh lịch, nhỏ nhỏ màu trắng hoặc hơi vàng nhẹ. Loài hoa này thường được trồng ở các vườn cảnh, trang trí sân vườn, các chùa chùa. Vớitôi thì hoa mộc là một loài hoa gắn liền với tuổi thơ, ngày bé hay thấy ông nội dùng hoa này để ướp trà. Hoa mộc ngửi thơm nhẹ, có nét fruity ngọt ngọt vừa giống đào lại có nét giống mơ, ngửi cực kì dễ chịu. Trà ướp hoa mộc uống thì thơm thôi rồi, đến giờ tôi vẫn còn nhớ rõ mùi vị ngày đó. Nhiều khi ngửi hoa mộc cho ta cảm giác gì đấy rất yên bình. Dame Osmanthus là một chai nước hoa nữ với chủ điểm hoa mộc, được làm khá thật, tuy nhiên thì mới xịt ra bạn sẽ thấy nó có phần ngọt hơn nhiều. Mùi hương khi dịu đi sẽ không biến chuyển nhiều, ngọt phai dần, về một mùi hương hoa nhẹ nhàng cuốn quýt trên da cực kì nữ tính, bám tốt trên da. Dame Osmanthus sẽ hợp với những bạn nữ thích sự dịu dàng, trẻ trung chứ không phải những bạn nữ quá cá tính. Nếu để chọn một nhân vật mà tối cho rằng cực kì hợp với Dame Osmanthus, có lẽ đó sẽ là nàng Dao Ánh – Nàng thơ của cố nhạc sĩ Trịnh Công Sơn.', 'cbd0c4b2900000f0f0116399504fdd44.png', 96, 1, 0, '2022-07-19 12:36:50', NULL),
(47, 'Ormonde Jayne Damask 100ml', 4200000, 'Một sáng tạo thơm với chủ điểm hoa hồng Damask. Tên chính thức của hồng Damask bắt nguồn từ thủ đô của Syria ngày ngay là thành phố Damascus, và vẫn được cho rằng, thành phố Damascus chính là nơi sinh ra loài hoa hồng huyền thoại với cánh hoa dày và mùi thơm vô cùng quyến rũ này. Mùi hương là sự kết hợp của hoa hồng với một loại các nốt hương trái cây khác như lê, chanh, quả lý chua đen và dâu tây. Damask như đưa ta dạo chơi trong một khu vườn tràn ngập các loại cây và một sáng sớm tinh mơ, khi mà những ánh nắng mới chỉ le lói qua kẽ lá đang còn đầm sương đêm, vô cùng thư thái và bình yên. Khi mùi hương dịu xuống, xạ hương và hổ phách xuất hiện cùng hoa hồng bền bỉ từ đầu chí cuối, tạo ra một cái vibe ngọt ngào nhẹ nhàng cực kì dễ thương.', '4ebbd2fcae920bf1c6bd616be0615385.png', 96, 1, 0, '2022-07-19 12:37:35', NULL),
(48, 'Eternity For Women 100ml', 1200000, 'Eternity For Women là một dòng nước hoa rất thành công của nhà Calvin Klein, ra mắt vào năm 1988 và được tạo ra bởi nhà pha chế Sophia Grojsman. Eternity là một bản thánh ca về những giá trị vĩnh cửu: tình yêu, gia đình và hòa bình. Mở đầu của chai nước hoa này là mùi hương cam chanh kết hợp cùng lá xanh, tiếp đến là sự lôi cuốn của hoa tím, hoa lily và một chút cay của hoa cẩm chướng. Tầng hương cuối là sự kết hợp hài hòa của xạ hương, hổ phách, gỗ đàn hương và hoa vòi voi.', '56f41b8cc2bec281b2be8a370a2d1711.png', 96, 1, 0, '2022-07-19 12:38:29', NULL),
(49, 'Dama Bianca 100ml', 6900000, 'Trong tiếng Ý, “Dama” nghĩa là Người phụ nữ, còn “Bianca” là trắng, là tinh khiết. Dịch nôm na qua tiếng Việt có thể sẽ là Người phụ nữ thánh thiện. Một cái tên có lẽ đã đủ để khiến ta phải tò mò về nó rồi. Xerioff luôn nổi tiếng là một nhà nước hoa làm hương citrus cực kì tốt, và Dama Bianca không phải là ngoại lệ, tuy nhiên sẽ có phần hơi khác lạ. Mở đầu của mùi hương là một cảm giác khá là fresh, hơi boozy nhưng theo hướng tích cực chứ không khó chịu chút nào. Ở đó có hương citrus từ quả quất, một chút phấn phấn bột bột từ hương hoa tím và ngọt của vani. Nó làm tôi nhớ đến hai thứ, là món tắc ngâm đường và cái loại kẹo dẻo hình con gấu màu vàng, không nhầm là của hãng Gummy Bears thì phải. Tôi nói rằng mở đầu của Dama Bianca có citrus nhưng theo hướng hơi khác lạ, chính vì citrus ở đây đến từ mùi quất, tạo cho mùi hương một sự độc đáo nhất định. Khoảng độ nửa tiếng sau khi xịt, mùi quất và hương hoa tan biến dần, mùi hương chuyển thành một cái base của Vani khá là mạnh, thêm chút xạ hương tạo ra một cái vibe âm ấm, dễ chịu nhưng cũng cực kì lôi cuốn. Nếu ngửi nhiều mùi hương của Xerjoff rồi, có lẽ bạn sẽ thấy Dama Bianca có nét hơi giống Lira, nhưng nếu Lira làm vani và caramel một cách hơi ồn ào thì Dama Bianca có vẻ tinh tế và dễ chịu hơn.', '7b5137545087b86908487e71b83900b1.png', 96, 1, 0, '2022-07-19 12:39:11', NULL),
(50, 'Signorina 100ml', 1800000, 'Signorina là tiếng Ý, nó có ý nghĩa là một người phụ nữ trẻ, tràn đầy sự sống, hồn nhiên và yêu đời. Những note hương tươi sáng của Quả lý chua đỏ được tẩm ướt cùng Hồng tiêu mang tới sự táo bạo trong cách chuyển mùi của cô nàng này, nhẹ nhàng nhưng đầy sự kiêu kỳ. Signorina mang trong mình cả một vườn hoa, với sự thanh tao của Hoa nhài, ngọt ngào của Hoa hồng và sự mong manh, tiểu thư của Hoa mẫu đơn. Cô nàng Signorina EDP với vẻ bề ngoài rất dễ thương, nhút nhát, nhưng khi chạm tới, Hương vị của bánh Panacotta hòa cùng xạ hương, biến sự nữ tính đó trở thành vũ khí hấn dẫn mọi ánh nhìn, ấm áp và đầy thân thiện.', '6223fe20db7b2bb5e5998fd5890bfbc2.png', 96, 1, 0, '2022-07-19 12:39:50', NULL),
(51, 'Orto Parisi Stercus 50ml', 5300000, 'Stercus is a fragrance that plays on the duality of the life cycle: the softness that coats and seduces and the animal part that strikes. An entire perfume, in the tradition of Orto Parisi creations.', '9193cb56779af3785476d6b52a7a45d9.png', 97, 1, 0, '2022-07-19 12:41:16', NULL),
(52, 'Orto Parisi Boccanera 50ml', 5300000, 'A fragrance covered in dark chocolate, a stolen kiss that leaves a spicy aftertaste of chili, black pepper and ginger on the lips. The balance of Boccanera is striking, confusing, between fragrance and flavor, between love and fear.', '662de8facb118e2fdec561a672b90ffd.png', 97, 1, 0, '2022-07-19 12:41:54', NULL),
(53, 'Orto Parisi Megamare 50mlm', 5300000, '“Quái vật biển cả”, “Chiến thần bám tỏa”, “Đại đội trưởng trung đoàn Ambroxan”, vân vân và mây mây là những điều mà nếu để chia sẻ vui vui về Orto Parisi Megamare thì tôi sẽ nhận xét như vậy. Còn khi nghiêm túc, thì tôi sẽ phải nhận định rằng đây là một trong những mùi hương theo hướng aquatic hay nhất từng được sản xuất. Trong tiếng Ý, “mage” trong Megamare nghĩa là biển cả, và có lẽ đây là cái tên hoàn hảo cho Orto Parisi Megamare khi cái tên mô tả cực kì chính xác tinh thần của mùi hương này. Nếu chỉ đơn giản mô tả Megamare là một mùi đầy mùi hương biển với cái nét aquatic cực kì dày, hơi mặn mặn của nước biển và những đám tảo biển, về sau thì ta cảm nhận rõ ambroxan cực kì nhiều thì chắc chắn không thể mô tả đầy đủ về những gì mà Orto Parisi Megamare thực sự làm được. Tôi đã có cơ hội trải nghiệm mùi hương này hơn 2 tuần liền, và tôi thực sự thấy mùi hương này cực kì có chiều sâu, sâu như chính cái cách nó mô tả biển cả vậy. Lần đầu tiên xịt Megamare, tôi còn có cảm giác như đang lặn giữa biển khơi mênh mông rộng lớn, ở một độ sâu không tưởng, tôi tìm thấy một chiếc mỏ neo của một con tàu đã đắm cách đây cả vài trăm năm, bị lãng quên, đầy rêu, tảo và những sinh vật biển kì dị bám lên đó. Và càng ngửi nhiều, ta cảm giác càng bị Megamare lôi cuốn, chỉ muốn hít hà mãi không thôi. Một trong những tượng đài nước hoa nam, yêu cũng nhiều và ghét cũng nhiều chính là Dior Sauvage EDT, với chủ điểm là tiêu và Ambroxan. Nhiều khi ngửi Ambroxan của Sauvage, nhất là những ngày hè nóng nực, tôi bị đau đầu thực sự. Cũng với Ambroxan cực kì dày, dày hơn Sauvage rất nhiều, nhưng Orto Parisi Megamare lại cực kì nịnh mũi và dễ chịu, mượt mà. Nếu là một người thực sự yêu thích biển cả, và muốn tìm cho mình một và chỉ một mùi hương duy nhất về biển, thì tôi tin rằng Megamare xứng đáng là chai nước hoa bạn đang tìm kiếm.', '0ea8a6e4ce8d986e810989b12cd402e1.png', 97, 1, 0, '2022-07-19 12:42:50', NULL),
(54, 'Ck One 100ml', 1000000, 'CK One của Calvin Klein là một hương thơm Citrus Aromatic dành cho phụ nữ và nam giới. CK One được ra mắt vào năm 1994. CK One được tạo ra bởi Alberto Morillas và Harry Fremont . Hương đầu là dứa, hương xanh, cam quýt, đu đủ, cam bergamot, thảo quả và chanh; hương giữa là nhục đậu khấu, violet, rễ iris, hoa nhài, hoa hồng và lan Nam Phi. Hương cuối là gỗ đàn hương, hổ phách, xạ hương, gỗ tuyết tùng, gỗ sồi, trà xanh và cây xanh.', '35dc65319a99548b650613cccf90c6db.png', 102, 1, 0, '2022-07-19 12:44:08', NULL),
(55, 'Another 13 100ml', 6600000, 'Another 13 là dòng nước hoa Le Labo thuộc nhóm Oriental Woody (Hương gỗ phương đông). Bên cạnh đó, Hương Iso E Super và Hương Amyl Salicylate là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này', '6f7276461853c17c6818613c60e72eb1.png', 102, 1, 0, '2022-07-19 12:45:20', NULL),
(56, 'Tam Dao EDP 100ml', 3850000, '“Ký ức về châu Á. Trong sâu thẳm của rừng rậm, những cây cổ thụ đan xen. Sự tráng lệ của gỗ đàn hương quý giá và sự khô giòn của cây tuyết tùng, hòa quyện với sự lấp lánh của các loại gia vị kỳ lạ và sự ấm áp của hổ phách.” – một lưu ý từ thương hiệu.', 'f71b4b8f1c50f9f9f5e1c9c3434c7243.png', 102, 1, 0, '2022-07-19 12:46:10', NULL),
(57, 'Dior Homme 2020 EDT 100ml', 3000000, 'Thiết kế của phiên bản Dior Homme 2020 vẫn dựa trên vóc dáng cũ, tuy nhiên thương hiệu Dior Homme đã được làm nổi bật hơn với nắp chai trong vô cùng sang trọng. Ẩn mình trong mùi hương của gỗ, phả ra hơi thở dịu nhẹ của một người đàn ông đích thực. “I’m your man – Tôi là người đàn ông của em” là những gì Dior Homme muốn truyền tải trong chai nước hoa mới nhất vào năm 2020 này.', 'a8eba4e9c0f5b9c5ed92f7b772080eaa.png', 103, 1, 0, '2022-07-19 12:47:28', NULL),
(58, 'Chanel Chance Eau Tendre EDP 100ml', 4200000, 'Nước hoa Chanel Chance Eau Tendre Eau de Parfum thuộc nhóm hương Floral Fruity (Hương hoa cỏ trái cây). Hương Bưởi và quả Mộc Qua bắt đầu với sự nhẹ nhàng, đơn giản nhưng đầy tinh tế. Chance Eau Tendre Eau de Parfum được đánh giá là một cô gái xinh đẹp với mái tóc bồng bềnh, sở hữu một nụ cười nhẹ nhàng và một mùi hương “sạch sẽ”. Hoa Nhài và hoa Hồng khiến nàng trở nên ngọt ngào nhưng không hề gắt, và mọi sự chú ý sẽ dồn vào note hương cuối cùng của cô nàng Chance Eau Tendre Eau de Parfum, Xạ hương trắng. Nếu bạn là một tín đồ của xạ hương, và cũng yêu thích sự tươi mát của hương hoa cây cỏ, thì đừng bao giờ bỏ qua cô nằng dịu dàng Chanel Chance Eau Tendre Eau de Parfum này', '2dcc60a9e827f35e651f028149986e05.png', 103, 1, 0, '2022-07-19 12:48:05', NULL),
(59, 'Sauvage Parfum 100ml', 3850000, 'Dior sauvage Parfum là phiên bản mới nhất trong bộ sưu tập nước hoa của nhà Dior trong dòng Sauvage, tiếp nối sự thành công của các phiên bản Sauvage EDT và Sauvage EDP. Một phiên bản mới được thiết kế đậm đà hơn nhưng vẫn giữ nguyên các ADN cốt lõi làm nên thương hiệu “Lady Killer” đình đám của Dior Sauvage. Chuyên gia Francois Demachy đã phát hành phiên bản Sauvage Parfume vào năm 2019, được lấy cảm hứng từ vùng thảo nguyên, thời điểm ánh trăng lên cao cùng bầu trời tối đen le lói ánh sáng của lửa trại.', '8c280c7efab34e0e62d9eb438ad070f0.png', 103, 1, 0, '2022-07-19 12:48:47', NULL),
(60, 'Sauvage EDP 100ml', 3400000, 'Đây là dòng nước hoa Christian Dior này có độ lưu hương lâu – 7 giờ đến 12 giờ và độ tỏa hương thuộc dạng gần – toả hương trong vòng một cánh tay. Sauvage edt thuộc nhóm Oriental Fougere (Hương dương xỉ phương đông). Bên cạnh đó, Hương cam bergamot và Xuyên tiêu là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.', '48cfeb6ccfd9a6871779cddbe41d0658.png', 103, 1, 0, '2022-07-19 12:49:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `status_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `birthday`, `gender`, `status_delete`) VALUES
(1, 'Vũ Đức Tiến', 'vuductien2908@gmail.com', '123456', '0913636889', 'Kiên Giang', '2002-07-28', 1, 0),
(9, 'Trần Bảo Vĩ', 'Tran.vi487@gmail.com', '$2y$10$9KBmaTyTdvYCEsnVK2IF6ep75C4.77ntFJVGO7DwTtBO8Sv9P6RwW', '0942044075', '201/14 , Đường Nguyễn Tri Phương , Phường Long Thạnh', '2002-12-31', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_fk1` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_details_fk2` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `product_fk1` (`category_id`),
  ADD KEY `product_fk2` (`manufacturer_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_fk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_fk2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_fk1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_fk2` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
