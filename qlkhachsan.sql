/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : qlkhachsan

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-11 00:21:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for datphong
-- ----------------------------
DROP TABLE IF EXISTS `datphong`;
CREATE TABLE `datphong` (
  `MaDat` int(11) NOT NULL AUTO_INCREMENT,
  `MaKH` int(11) NOT NULL,
  `TongTien` int(100) DEFAULT NULL,
  `NgayDat` date DEFAULT NULL,
  PRIMARY KEY (`MaDat`),
  KEY `fk_DatPhong` (`MaKH`),
  CONSTRAINT `fk_DatPhong` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of datphong
-- ----------------------------
INSERT INTO `datphong` VALUES ('1', '1', null, '2018-11-03');
INSERT INTO `datphong` VALUES ('2', '2', null, '2018-11-04');
INSERT INTO `datphong` VALUES ('3', '3', null, '2018-11-04');
INSERT INTO `datphong` VALUES ('4', '4', null, '2018-11-04');
INSERT INTO `datphong` VALUES ('5', '5', null, '2018-11-04');
INSERT INTO `datphong` VALUES ('6', '6', null, '2018-11-04');
INSERT INTO `datphong` VALUES ('7', '8', '1400', '2018-11-06');
INSERT INTO `datphong` VALUES ('8', '9', '2400', '2018-11-10');

-- ----------------------------
-- Table structure for khachhang
-- ----------------------------
DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoThe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaKH`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of khachhang
-- ----------------------------
INSERT INTO `khachhang` VALUES ('1', 'Lê Thị Vân', 'levan.hy.97@gmail.com', '0335833102', 'Thanh Long, Yên Mỹ,Hưng Yên', null);
INSERT INTO `khachhang` VALUES ('2', 'Trần Thoa', 'tranthoa@gmail.com', '0334812354', 'Bắc Giang', null);
INSERT INTO `khachhang` VALUES ('3', 'Trần Thoa', 'tranthoa@gmail.com', '0334812354', 'Bắc Giang', null);
INSERT INTO `khachhang` VALUES ('4', 'Trần Thoa', 'tranthoa@gmail.com', '0334812354', 'Bắc Giang', null);
INSERT INTO `khachhang` VALUES ('5', 'Trần Thoa', 'tranthoa@gmail.com', '0334812354', 'Bắc Giang', null);
INSERT INTO `khachhang` VALUES ('6', 'Hoàng Liên', 'hoanglien@gmail.com', '0123456789', 'Hà Nội', null);
INSERT INTO `khachhang` VALUES ('7', null, null, null, null, '4242');
INSERT INTO `khachhang` VALUES ('8', 'Quang Chu', 'chuvanquang@gmail.com', '0975467280', 'Vĩnh Phúc', null);
INSERT INTO `khachhang` VALUES ('9', 'Admin', 'admin@gmail.com', '12344555', 'Thanh Long, Yên Mỹ,Hưng Yên', null);

-- ----------------------------
-- Table structure for loaiphong
-- ----------------------------
DROP TABLE IF EXISTS `loaiphong`;
CREATE TABLE `loaiphong` (
  `MaLoai` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiDanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Giuong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NguoiLon` int(11) DEFAULT NULL,
  `TreCon` int(11) DEFAULT NULL,
  `DienTich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HuongNhin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiuongPhu` bit(1) DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL,
  `MoTa` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTaChiTiet` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of loaiphong
-- ----------------------------
INSERT INTO `loaiphong` VALUES ('1', 'Deluxe Suite', 'deluxe-suite', '1 đôi hoặc 2 đơn', '2', '1', '25M', '', '', '200', 'Phòng Deluxe Suite được thiết kế độc đáo trang thiết bị hiện đại không gian rộng và thoáng mát. Tất cả các phòng được trang bị truyền hình cáp với hơn 100 kênh truyền hình nội địa và Quốc tế. Loại phòng này có khu vực phòng khách riêng và bồn tắm hiện đại.  Phòng Deluxe Suite ấm cúng và thoải mái với ánh sáng tự nhiên với 3 cửa sổ hướng ra thành phố luôn mang lại không khí phòng trong lành ngoài ra loại phòng này còn có bàn làm việc cỡ lớn, ghế sofa thư giãn, truy cập Internet không dây miễn phí ngay tại trong các phòng.', 'Có 19 phòng Deluxe bao gồm cả Double/Twin. Tất cả các phòng đều được trang bị đồ nội thất thanh lịch và sự chú tâm đến các hiện vật chi tiết. Với diện tích từ 25 m2, phòng Deluxe là lựa chọn lý tưởng cho nhiều du khách. Phòng này được trang bị 1 giường Queen hoặc 2 giường đơn và một phòng tắm với đầy đủ trang thiết bị nhập khẩu từ Nhật. Phòng có bao gồm các tiện nghi cho khách. Phong cách trẻ trung và sự sáng tạo trong từng chi tiết, với hệ thống thiết bị hiện đại đang tiếp cận một cách thức phổ thông có thể làm thỏa mãn mọi nhu cầu sử dụng của mỗi thành viên. Phòng Deluxe với không gian rộng rãi và riêng tư cho phép chuẩn bị và trang trí phòng tại Khách sạn quốc tế Rosaliza Hà Nội đáp ứng nhu cầu Single, Couple hoặc bạn bè. Đáp ứng tốt nhu cầu giường đôi hoặc 2 giường đơn, bàn làm việc, Tivi màn hình phẳng, ghế sofa, truy cập internet không dây miễn ph.\r\nTiện nghi phòng:   Máy pha trà/cà phê, minibar, vòi hoa sen, két an toàn, Kênh phim trả tiền theo lượt xem, Tivi, Điện thoại, Điều hòa, Máy sấy tóc, Dịch vụ đánh thức/báo thức, Tủ lạnh, Bàn, Ghế ngồi, Phòng tắm, Bồn cầu, Phòng thay đồ, Phòng tắm chung, Dép đi trong phòng, hệ thống truyền hình vệ tinh, Kênh truyển hình cáp, Bồn tắm hoặc vòi hoa sen, Thảm, Tủ laptop, Tivi màn hình phẳng, Ghế sofa, Cách âm, Dịch vụ đánh thức, Ấm đun nước, Tủ quần áo, Tầng trên truy cập bằng thang máy, Toàn bộ xe lăn đơn có thể tiếp cận được, Giá quần áo, Giấy vệ sinh, Buồng tắm hoa sen, Nước đóng chai, Thùng rác, Bàn chải đánh răng, Dầu gội đầu, Xà phòng tắm, Mũ tắm, Ổ cắm gần giường, Sử dụng thang máy. Hơn 60 kênh phim/giải trí và các kênh truyền hình vệ tinh mới: NHK, Tokyo, Nihon, Asahi, Fuji ... Khách sạn tại Hà Nội | Khách sạn ở Việt Nam\r\nTất cả các phòng đều có WiFi miễn phí.', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg,loaiphong.jpg');
INSERT INTO `loaiphong` VALUES ('2', 'Deluxe Twin Suite', 'deluxe-twin-suite', '2 đơn', '2', '1', '25M', 'city view', '', '200', 'Loại phòng Deluxe Twin được trang bị với thiết bị hiện đại, có sofa, bàn làm việc, cửa sổ rộng, ban công riêng và bồn tắm trong phòng tắm riêng. Tất cả các Phòng Deluxe 2 giường đơn tại Khách sạn Rosaliza đều có phòng tắm lát đá cẩm thạch, sàn gỗ,  wifi miễn phí, ghế sofa, cửa sổ Euro.\r\nCác phòng này được bài trí hài hòa ấn tượng kết hợp sự tinh túy sang trọng với cửa sổ Euro window hướng ra thành phố. Giường phụ sẽ được cung cấp theo yêu cầu của quý khách', 'Loại phòng điều hòa lớn này có khu tiếp khách riêng biệt với ghế sofa, ban công riêng và bồn tắm trong phòng tắm riêng. Tất cả các Phòng Deluxe 2 giường đơn tại Khách sạn Rosaliza đều có phòng tắm lát đá cẩm thạch, sàn gỗ, bàn làm việc, wifi miễn phí, ghế sofa, cửa sổ Euro.\r\nCác phòng này cũng được bố trí sẵn kết nối hoặc tại các tầng không hút thuốc (tầng 5, 6 và 7) nếu được yêu cầu. Giường phụ sẽ được cung cấp theo yêu cầu.', 'room2.jpg,room1.jpg,room3.jpg,room4.jpg,loaiphong.jpg');
INSERT INTO `loaiphong` VALUES ('3', 'Executive Twin', 'executive-twin', '2 đơn', '2', '1', '30M', 'city view', '', '300', 'Với phòng Executive Twin tại Khách sạn Rosaliza, quý khách có thể tận hưởng đầy đủ màu sắc của thành phố vào ban đêm, mặt trời mọc và hoàng hôn ngay bên cạnh phòng ngủ , một bên là một không gian thiết kế ấn tượng, một bên đường phố bận rộn và được trang trí bằng vẻ đẹp của cảnh quan thành phố Hà Nội. Trải nghiệm những giây phút ấn tượng cho một kỳ nghỉ tuyệt vời thực sự bắt đầu từ việc kể chuyện của người thiết kế và điều đặc biệt hơn. Phòng Executive Twin nằm trên tầng cao và có cửa sổ lớn hướng về Quang cảnh thành phố của Phố Cổ Hà Nội. Phòng được trang bị ghế sofa thoải mái, bàn làm việc rộng và hiện đại. Đây là loại phòng dành cho cặp đôi, bạn bè, nhóm du khách hay thương gia hoặc chỉ đơn giản là một không gian rộng hơn để sống và nghỉ ngơi cho bất kỳ ai. Với không gian rộng hơn, phòng máy lạnh và nước nóng trung tâm kèm theo đó là  truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng.', '	\r\n Picture\r\nSỐ LƯỢNG PHÒNG\r\n18\r\n Picture\r\nDIỆN TÍCH PHÒNG\r\n30 M²\r\n Picture\r\nHƯỚNG NHÌN\r\nCITY VIEW\r\n \r\nVới phòng Executive tại Khách sạn Rosaliza, quý khách có thể tận hưởng đầy đủ màu sắc của thành phố vào ban đêm, mặt trời mọc và hoàng hôn ngay bên cạnh, một bên là một không gian thiết kế ấn tượng, một bên đường phố bận rộn và được trang trí bằng vẻ đẹp của cảnh quan thành phố Hà Nội. Trải nghiệm những giây phút ấn tượng cho một kỳ nghỉ tuyệt vời thực sự bắt đầu. Phòng Executive nằm trên tầng cao và có cửa sổ lớn hướng về Quang cảnh thành phố của Phố Cổ Hà Nội. Phòng được trang bị ghế sofa thoải mái, bàn làm việc. Đây là loại phòng dành cho cặp đôi, bạn bè, nhóm du khách hoặc chỉ đơn giản là một không gian rộng hơn để sống và nghỉ ngơi cho bất kỳ ai. \r\n​Với không gian rộng hơn, phòng máy lạnh này có truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng.', 'room3.jpg');
INSERT INTO `loaiphong` VALUES ('4', 'Executive Double', 'executive-double', '1 đôi', '2', '1', '30M', 'city view', '', '300', 'Phòng Executive Double có thêm không gian phòng tiếp khách riêng biệt, hệ thống máy lạnh và nước nóng trung tâm ngoài ra tất cả các phòng của khách sạn được trang bị truyền hình vệ tinh với hơn 100 kênh truyền hình Nhật và kênh quốc tế, Tính hiện đại rõ nét hơn với loại phòng này đặc biệt quý khách được trải nghiệm một không gian rộng và thoáng mát duyên dáng trộn lẫn vào nhau trong một không gian mở. Chúng tôi tập trung vào các yếu tố tạo lên sự trải nghiệm tuyệt vời của quý khách được thể hiện trong từng chi tiết. Phòng Executive Double ấm cúng và thoải mái. Ánh sáng tự nhiên với cửa sổ lớn mang lại không khí trong phòng trong lành. ', 'Phòng Executive Double có thêm không gian, Phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực phòng khách riêng và bồn tắm trong phòng tắm riêng. Tính hiện đại rõ nét hơn với loại phòng này, châu Âu và Hà Nội duyên dáng trộn lẫn vào nhau trong một không gian mở. Chúng tôi tập trung vào trải nghiệm của mỗi thành viên trong từng chi tiết. Phòng Executive Double ấm cúng và thoải mái. Ánh sáng tự nhiên hàng ngày mang lại không khí phòng trong lành. Không gian rộng rãi hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây.', 'room4.jpg');
INSERT INTO `loaiphong` VALUES ('5', 'Deluxe Double Suite', 'deluxe-double-suite', '1 đôi', '2', '1', '40M', 'city view', '', '250', 'Có 19 phòng Deluxe bao gồm cả loại phòng Double/Twin. Tất cả các phòng đều được trang bị đồ nội thất thanh lịch và sự chú tâm đến các hiện vật chi tiết. Với diện tích từ 25 m2, phòng Deluxe là lựa chọn lý tưởng cho nhiều du khách. Phòng này được trang bị 1 giường Queen hoặc 2 giường đơn và một phòng tắm có vòi sen hiện đại. Phòng có bao gồm các tiện nghi cho khách. Phong cách trẻ trung và sự sáng tạo trong từng chi tiết, với hệ thống thiết bị hiện đại đang tiếp cận và cung  cấp dịch vụ du lịch chất lượng cao có thể làm thỏa mãn mọi nhu cầu sử dụng của quý khách. Phòng Deluxe với không gian rộng rãi và riêng tư được chuẩn bị và trang trí phòng tại Khách sạn quốc tế Rosaliza Hà Nội đáp ứng nhu cầu khách lẻ hoặc khách đoàn. Khách sạn Rosaliza Tại Hà Nội luôn đáp ứng tốt nhu cầu các loại phòng và có giường đôi hoặc 2 giường đơn, bàn làm việc, Tivi màn hình phẳng với hơn 100 kênh truyền hình nội địa và quốc tế, ghế sofa, truy cập internet không dây miễn phí tại các phòng, loại phòng này luôn được sự chú ý  và quan tâm của quý khách. ', 'Phòng Deluxe Suite Double Offering có thêm nhiều không gian hơn quý khách có thể hình dung. Phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực phòng khách riêng và bồn tắm trong phòng tắm riêng. Tính hiện đại rõ nét hơn với loại phòng này, châu Âu và Hà Nội duyên dáng trộn lẫn vào nhau trong một không gian mở. Chúng tôi tập trung vào trải nghiệm của mỗi thành viên trong từng chi tiết. Phòng Deluxe Suite Double ấm cúng và thoải mái. Ánh sáng tự nhiên hàng ngày mang lại không khí phòng trong lành. Không gian rộng rãi hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây.', 'room1.jpg');
INSERT INTO `loaiphong` VALUES ('6', 'Executive Suite', 'executive-suite', '1 đoi', '3', '1', '45M', null, '', '250', 'Phòng Executive Suite trong Khách sạn được thiết kế và bài trí theo phong cách cổ điển, sang trọng với tiện nghi hiện đại nhất tạo không gian ấm cúng, đầy ấn tượng. Được trang bị thiết bị hiện đại cùng không gian rộng rãi thoáng mát view nhìn ra toàn cảnh của Thành phố phồn hoa. \r\nCác phòng hạng sang cung cấp thêm không gian cùng với tầm nhìn ra thành phố ra bên ngoài. Cùng với ghế dài và bàn làm việc. ', 'Phòng Suite máy lạnh rộng rãi này có khu tiếp khách riêng biệt với ghế sofa, ban công riêng và bồn tắm trong phòng tắm riêng.\r\nPhòng Suite cũng có giường sofa.\r\nPhòng Suite này có thể đáp ứng thêm 2 giường phụ.\r\n\r\nTiện nghi phòng:\r\nMáy pha trà/cà phê, minibar, vòi hoa sen, két an toàn, Kênh phim trả tiền theo lượt xem, Tivi, Điện thoại, Điều hòa, Máy sấy tóc, Dịch vụ đánh thức/báo thức, Tủ lạnh, Bàn, Ghế ngồi, Phòng tắm, Bồn cầu, Phòng thay đồ, Phòng tắm chung, Dép đi trong phòng, Lệm truyền hình vệ tinh, Kênh truyển hình cáp, Bồn tắm hoặc vòi hoa sen, Thảm, Tủ laptop, Tivi màn hình phẳng, Ghế sofa, Cách âm, Dịch vụ đánh thức, Ấm đun nước, Tủ quần áo, Tầng trên truy cập bằng thang máy, Toàn bộ xe lăn đơn có thể tiếp cận được, Giá quần áo, Giấy vệ sinh, Buồng tắm hoa sen, Nước đóng chai, Thùng rác, Bàn chải đánh răng, Dầu gội đầu, Xà phòng tắm, Mũ tắm, Ổ cắm gần giường, Sử dụng thang máy. Hơn 60 kênh phim/giải trí và các kênh truyền hình vệ tinh mới: NHK, Tokyo, Nihon, Asahi, Fuji ... Khách sạn tại Hà Nội | Khách sạn ở Việt Nam\r\n\r\nTất cả các phòng đều có WiFi miễn phí.', 'loaiphong.jpg');

-- ----------------------------
-- Table structure for phong
-- ----------------------------
DROP TABLE IF EXISTS `phong`;
CREATE TABLE `phong` (
  `MaPhong` int(11) NOT NULL AUTO_INCREMENT,
  `MaTT` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenPhong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MoTa` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaPhong`),
  KEY `fk_MaTT` (`MaTT`),
  KEY `fk_MaLoai` (`MaLoai`),
  CONSTRAINT `fk_MaLoai` FOREIGN KEY (`MaLoai`) REFERENCES `loaiphong` (`MaLoai`) ON UPDATE CASCADE,
  CONSTRAINT `fk_MaTT` FOREIGN KEY (`MaTT`) REFERENCES `trangthai` (`MaTT`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of phong
-- ----------------------------
INSERT INTO `phong` VALUES ('1', '3', '1', 'Phòng 101', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('2', '2', '1', 'Phòng 102', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('3', '2', '1', 'Phòng 103', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('4', '2', '1', 'Phòng 104', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('5', '1', '1', 'Phòng 105', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('6', '1', '2', 'Phòng 201', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('7', '1', '2', 'Phòng 202', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('8', '1', '2', 'Phòng 203', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('9', '1', '2', 'Phòng 204', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('10', '1', '2', 'Phòng 205', '200', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('11', '1', '3', 'Phòng 301', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('12', '1', '3', 'Phòng 302', '360', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('13', '1', '3', 'Phòng 303', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Bạn sẽ có đủ không gian cho công việc hoặc thư giãn trong các phòng được bài trí đẹp mắt này. Hãy tận hưởng cảm giác thoáng mát, được bài trí trang nhã của các Suite Deluxe 2 Giường Đơn tại Rosaliza Hotel, tự hào có đèn độc đáo và bồn tắm ngâm sâu hoặc vòi sen đứng. Các phòng này có bàn làm việc lớn và / hoặc ghế sofa thoải mái, truy cập Internet không dây MIỄN PHÍ, TV màn hình and và két an toàn điện tử.');
INSERT INTO `phong` VALUES ('14', '1', '3', 'Phòng 304', '360', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('15', '1', '3', 'Phòng 305', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('16', '1', '4', 'Phòng 401', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('17', '1', '4', 'Phòng 402', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('18', '1', '4', 'Phòng 403', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('19', '1', '4', 'Phòng 404', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('20', '1', '4', 'Phòng 405', '350', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('21', '1', '5', 'Phòng 501', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('22', '1', '5', 'Phòng 502', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('23', '1', '5', 'Phòng 503', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('24', '1', '5', 'Phòng 504', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('25', '1', '5', 'Phòng 505', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('26', '1', '6', 'Phòng 601', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'Phòng Executive Giường đôi có thêm không gian, phòng máy lạnh này được trang bị truyền hình vệ tinh, khu vực tiếp khách riêng biệt và bồn tắm trong phòng tắm riêng. Tính năng hiện đại rõ ràng hơn ở đây, ở châu Âu và Hà Nội hòa quyện vào một không gian mở. Chúng tôi tập trung vào trải nghiệm của từng thành viên trên từng chi tiết Phòng Executive Double là sự ấm cúng và thoải mái. Ánh sáng tự nhiên mang lại không khí trong lành trong phòng hàng ngày. Không gian rộng hơn với bàn làm việc, ghế sofa thư giãn, truy cập Internet không dây. Phòng có tầm nhìn mở ra Thành phố, cửa sổ lớn và không gian.');
INSERT INTO `phong` VALUES ('27', '1', '6', 'Phòng 602', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'SUITE EXECUTIVE Suite máy lạnh rộng rãi này có khu vực tiếp khách riêng biệt với ghế sofa thoải mái, ban công riêng và bồn tắm trong phòng tắm riêng. Phòng Suite này có tầm nhìn ra quang cảnh thành phố và phòng ngủ sang trọng, rất rộng rãi cùng phòng tắm hiện đại, tất cả đều có cửa sổ mở. Suite sang trọng được thiết kế cho 2 - 3 người Suite này cũng có ghế sofa, giường cỡ King và phòng này có thể chứa thêm 1 giường phụ theo yêu cầu. Các phòng được thiết kế với 2 cửa sổ rộng nhìn ra Thành phố, giường cỡ King với ghế sofa thoải mái bên cạnh cửa sổ.');
INSERT INTO `phong` VALUES ('28', '1', '6', 'Phòng 603', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'SUITE EXECUTIVE Suite máy lạnh rộng rãi này có khu vực tiếp khách riêng biệt với ghế sofa thoải mái, ban công riêng và bồn tắm trong phòng tắm riêng. Phòng Suite này có tầm nhìn ra quang cảnh thành phố và phòng ngủ sang trọng, rất rộng rãi cùng phòng tắm hiện đại, tất cả đều có cửa sổ mở. Suite sang trọng được thiết kế cho 2 - 3 người Suite này cũng có ghế sofa, giường cỡ King và phòng này có thể chứa thêm 1 giường phụ theo yêu cầu. Các phòng được thiết kế với 2 cửa sổ rộng nhìn ra Thành phố, giường cỡ King với ghế sofa thoải mái bên cạnh cửa sổ.');
INSERT INTO `phong` VALUES ('29', '1', '6', 'Phòng 604', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'SUITE EXECUTIVE Suite máy lạnh rộng rãi này có khu vực tiếp khách riêng biệt với ghế sofa thoải mái, ban công riêng và bồn tắm trong phòng tắm riêng. Phòng Suite này có tầm nhìn ra quang cảnh thành phố và phòng ngủ sang trọng, rất rộng rãi cùng phòng tắm hiện đại, tất cả đều có cửa sổ mở. Suite sang trọng được thiết kế cho 2 - 3 người Suite này cũng có ghế sofa, giường cỡ King và phòng này có thể chứa thêm 1 giường phụ theo yêu cầu. Các phòng được thiết kế với 2 cửa sổ rộng nhìn ra Thành phố, giường cỡ King với ghế sofa thoải mái bên cạnh cửa sổ.');
INSERT INTO `phong` VALUES ('30', '1', '6', 'Phòng 605', '300', 'room1.jpg,room2.jpg,room3.jpg,room4.jpg', 'SUITE EXECUTIVE Suite máy lạnh rộng rãi này có khu vực tiếp khách riêng biệt với ghế sofa thoải mái, ban công riêng và bồn tắm trong phòng tắm riêng. Phòng Suite này có tầm nhìn ra quang cảnh thành phố và phòng ngủ sang trọng, rất rộng rãi cùng phòng tắm hiện đại, tất cả đều có cửa sổ mở. Suite sang trọng được thiết kế cho 2 - 3 người Suite này cũng có ghế sofa, giường cỡ King và phòng này có thể chứa thêm 1 giường phụ theo yêu cầu. Các phòng được thiết kế với 2 cửa sổ rộng nhìn ra Thành phố, giường cỡ King với ghế sofa thoải mái bên cạnh cửa sổ.');
INSERT INTO `phong` VALUES ('38', '1', '1', 'Phòng 701', '230', '5be6ff5341706.9T4A0001.JPG,5be701062bcd5.1.PNG', '<p>Đẹp</p>');

-- ----------------------------
-- Table structure for phong_datphong
-- ----------------------------
DROP TABLE IF EXISTS `phong_datphong`;
CREATE TABLE `phong_datphong` (
  `MaPhong` int(11) NOT NULL,
  `MaDat` int(11) NOT NULL,
  `NgayDen` datetime DEFAULT NULL,
  `NgayDi` datetime DEFAULT NULL,
  `SoNgay` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaPhong`,`MaDat`),
  KEY `fk_MaDat` (`MaDat`),
  CONSTRAINT `fk_MaDat` FOREIGN KEY (`MaDat`) REFERENCES `datphong` (`MaDat`),
  CONSTRAINT `fk_MaPDat` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of phong_datphong
-- ----------------------------
INSERT INTO `phong_datphong` VALUES ('1', '1', '2018-10-04 06:30:00', '2018-10-12 10:10:00', '8');
INSERT INTO `phong_datphong` VALUES ('1', '5', '2018-11-04 00:00:00', '2018-11-05 19:35:00', '1');
INSERT INTO `phong_datphong` VALUES ('2', '6', '2018-10-04 00:00:00', '2018-10-05 00:00:00', '1');
INSERT INTO `phong_datphong` VALUES ('3', '7', '2018-11-08 16:15:00', '2018-11-16 07:15:00', '8');
INSERT INTO `phong_datphong` VALUES ('4', '8', '2018-10-04 06:30:00', '2018-10-16 21:55:00', '12');

-- ----------------------------
-- Table structure for phong_thietbi
-- ----------------------------
DROP TABLE IF EXISTS `phong_thietbi`;
CREATE TABLE `phong_thietbi` (
  `MaPhong` int(11) NOT NULL,
  `MaTB` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GhiChu` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaPhong`,`MaTB`),
  KEY `fk_MaTB` (`MaTB`),
  CONSTRAINT `fk_MaPhong` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  CONSTRAINT `fk_MaTB` FOREIGN KEY (`MaTB`) REFERENCES `thietbi` (`MaTB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of phong_thietbi
-- ----------------------------
INSERT INTO `phong_thietbi` VALUES ('1', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('1', '2', '1', null);
INSERT INTO `phong_thietbi` VALUES ('1', '3', '1', null);
INSERT INTO `phong_thietbi` VALUES ('1', '4', '1', null);
INSERT INTO `phong_thietbi` VALUES ('1', '5', '1', null);
INSERT INTO `phong_thietbi` VALUES ('1', '6', '1', null);
INSERT INTO `phong_thietbi` VALUES ('2', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('2', '2', '1', null);
INSERT INTO `phong_thietbi` VALUES ('2', '3', '1', null);
INSERT INTO `phong_thietbi` VALUES ('3', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('3', '2', '1', null);
INSERT INTO `phong_thietbi` VALUES ('3', '3', '1', null);
INSERT INTO `phong_thietbi` VALUES ('4', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('5', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('6', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('7', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('8', '1', '1', null);
INSERT INTO `phong_thietbi` VALUES ('9', '1', '1', null);

-- ----------------------------
-- Table structure for thietbi
-- ----------------------------
DROP TABLE IF EXISTS `thietbi`;
CREATE TABLE `thietbi` (
  `MaTB` int(11) NOT NULL AUTO_INCREMENT,
  `TenTB` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaTB`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of thietbi
-- ----------------------------
INSERT INTO `thietbi` VALUES ('1', 'Air Conditioned', 'air-conditioner.svg');
INSERT INTO `thietbi` VALUES ('2', 'Alarm Clock', 'alarm-clock.svg');
INSERT INTO `thietbi` VALUES ('3', 'Balcony', 'balcony.svg');
INSERT INTO `thietbi` VALUES ('4', 'Bathtub', 'bathroom.svg');
INSERT INTO `thietbi` VALUES ('5', 'City View', 'stage.svg');
INSERT INTO `thietbi` VALUES ('6', 'Connecting Rooms', 'room.svg');
INSERT INTO `thietbi` VALUES ('7', 'Free Newspaper', 'newspaper.svg');
INSERT INTO `thietbi` VALUES ('8', 'Hairdryer In Room', 'hairdryer.svg');
INSERT INTO `thietbi` VALUES ('9', 'Iron', 'iron.svg');
INSERT INTO `thietbi` VALUES ('10', 'Jacuzzi', 'jacuzzi.svg');
INSERT INTO `thietbi` VALUES ('11', 'Mini Bar', 'beer.svg');
INSERT INTO `thietbi` VALUES ('12', 'Outlet Adapters', 'usb.svg');
INSERT INTO `thietbi` VALUES ('13', 'Personal Refrigerator', 'fridge.svg');
INSERT INTO `thietbi` VALUES ('14', 'Shower', 'shower.svg');
INSERT INTO `thietbi` VALUES ('15', 'Sitting Area', 'couch.svg');
INSERT INTO `thietbi` VALUES ('16', 'Telephone', 'phone.svg');
INSERT INTO `thietbi` VALUES ('17', 'Terrace', 'terrace.svg');
INSERT INTO `thietbi` VALUES ('18', 'Toilet', 'toilet.svg');
INSERT INTO `thietbi` VALUES ('19', 'Ti vi', 'tv.svg');

-- ----------------------------
-- Table structure for trangthai
-- ----------------------------
DROP TABLE IF EXISTS `trangthai`;
CREATE TABLE `trangthai` (
  `MaTT` int(11) NOT NULL AUTO_INCREMENT,
  `TenTT` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaTT`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of trangthai
-- ----------------------------
INSERT INTO `trangthai` VALUES ('1', 'Trống');
INSERT INTO `trangthai` VALUES ('2', 'Đã đặt');
INSERT INTO `trangthai` VALUES ('3', 'Đang sử dụng');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('2', 'Admin', 'admin@gmail.com', '1', null, '$2y$10$k2blKgTUCaKgtjzdVg7EpOU8lmbLQGd2haiGQL4RtAxDbfO.80kJO', 'UAGLHyjYbbZsY5bWV2BkSB9U4hzvMShH28saZaX5jZY06a1UAUV7bE2dyRxL', '2018-10-11 14:25:57', '2018-10-11 14:25:57');
INSERT INTO `users` VALUES ('3', 'Phùng Thị An', 'phungan671@gmail.com', '0', null, '$2y$10$vr40FXK9pDzbYOGKriKl0e1ATOIwyscuD8YUskJyWCOBNanxuSXAK', 'h50TePLdztcmMgSNzpjC5aYDJo9DWbdop3qTnIUUcm6rD2Dcypk74Jfnhnx8', '2018-10-11 16:32:27', '2018-10-11 16:32:27');
INSERT INTO `users` VALUES ('4', 'Chu Văn Quang', 'chuvanquang@gmail.com', '0', null, '$2y$10$OfFM4RlK2duS6h2WHQBCjeWbhitYdk0l2Ub/sksmFs0eIJhNCRU5C', 'UV4p0nbPVeqpPm9FUDBkD9OwLJPC3lOqk0mbB7CVvt2drH0kF6ONg9ngW8G0', '2018-11-07 08:43:41', '2018-11-07 08:43:41');
