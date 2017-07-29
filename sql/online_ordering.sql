-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-07-29 16:13:44
-- 服务器版本： 5.5.56-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_ordering`
--

-- --------------------------------------------------------

--
-- 表的结构 `access`
--

CREATE TABLE `access` (
  `role_id` smallint(6) UNSIGNED NOT NULL,
  `node_id` smallint(6) UNSIGNED NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `access`
--

INSERT INTO `access` (`role_id`, `node_id`, `level`, `module`) VALUES
(1, 11, 3, NULL),
(1, 10, 3, NULL),
(1, 9, 2, NULL),
(1, 8, 3, NULL),
(2, 2, 2, NULL),
(1, 5, 2, NULL),
(1, 13, 3, NULL),
(1, 6, 3, NULL),
(1, 4, 3, NULL),
(1, 3, 3, NULL),
(1, 2, 2, NULL),
(1, 1, 1, NULL),
(1, 12, 2, NULL),
(2, 3, 3, NULL),
(2, 4, 3, NULL),
(2, 6, 3, NULL),
(2, 13, 3, NULL),
(2, 14, 3, NULL),
(2, 15, 3, NULL),
(3, 15, 3, NULL),
(3, 14, 3, NULL),
(3, 13, 3, NULL),
(3, 6, 3, NULL),
(3, 4, 3, NULL),
(3, 3, 3, NULL),
(3, 2, 2, NULL),
(4, 9, 2, NULL),
(4, 10, 3, NULL),
(4, 11, 3, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `admin_character`
--

CREATE TABLE `admin_character` (
  `admin_character_id` int(10) NOT NULL,
  `character_id` int(10) NOT NULL,
  `admin_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` varchar(200) NOT NULL,
  `create_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `create_time`) VALUES
(2, '公司信息', '服务内容服务内容服务内容服务内容服务内容服务内容服务内容服务内容服务', '2017-07-28 09:35:05.000000');

-- --------------------------------------------------------

--
-- 表的结构 `character_power`
--

CREATE TABLE `character_power` (
  `character_power_id` int(11) NOT NULL,
  `character_id` int(11) NOT NULL,
  `power_id` int(10) DEFAULT NULL,
  `character_info` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `links_url`
--

CREATE TABLE `links_url` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  `remarks` varchar(300) DEFAULT NULL,
  `sort` int(10) NOT NULL,
  `display` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `links_url`
--

INSERT INTO `links_url` (`id`, `name`, `url`, `remarks`, `sort`, `display`) VALUES
(1, '百度', 'https://www.baidu.com/', '百度首页', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `menu_list`
--

CREATE TABLE `menu_list` (
  `menu_id` int(30) NOT NULL,
  `menu_name` varchar(40) DEFAULT NULL,
  `menu_type` varchar(20) DEFAULT NULL,
  `menu_info` varchar(5000) DEFAULT NULL,
  `menu_price` float DEFAULT NULL,
  `menu_icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menu_list`
--

INSERT INTO `menu_list` (`menu_id`, `menu_name`, `menu_type`, `menu_info`, `menu_price`, `menu_icon`) VALUES
(2, '锅包肉', '东北菜', '锅包肉（英文名：Double Cooked Pork Slices），原名锅爆肉，是一道东北菜，光绪年间始创自哈尔滨道台府府尹杜学赢厨师郑兴文之手。成菜后，色泽金黄，口味酸甜。锅包肉是为适应外宾口味，把咸鲜口味的“焦烧肉条”改成了一道酸甜口味的菜肴。通常将猪里脊肉切片腌入味，裹上炸浆，下锅炸至金黄色捞起，再下锅拌炒勾芡即成。', 77, '/uploads/07.jpg'),
(3, '口水鸡', '川菜', '口水鸡是中国四川传统特色菜肴，属于川菜系中的凉菜，佐料丰富，集麻辣鲜香嫩爽于一身。 在烹制时，煮鸡用的汤料很有讲究，需要恰到好处，这样可以最大限度地保存鸡的可溶性蛋白，增加鸡肉的鲜美程度，又能具备其特有的香型和滋味。口水鸡是一道凉菜，佐料丰富，集麻辣鲜香嫩爽于一身。有“名驰巴蜀三千里，味压江南十二州”的美称。“口水鸡”这名字初听感觉有点不雅，脑子里可能会出现一副口水滴哒的样子，之所以叫口水鸡还因为有很多花椒，吃了会麻到嘴巴瘫痪不由自主流口水。', 68, '/uploads/08.jpg'),
(4, '酸菜鱼', '川菜', '酸菜鱼也称为酸汤鱼，是一道源自重庆的经典菜品，以其特有的调味和独特的烹调技法而著称。流行于上世纪90年代，是重庆江湖菜的开路先锋之一。\r\n酸菜鱼以草鱼为主料，配以泡菜等食材煮制而成，口味酸辣可口；鱼含丰富优质蛋白，能提供人丰富的蛋白质、矿物质等营养；酸菜中的乳酸可以促进人体对铁元素的吸收，还可以增加人的食欲。\r\n关于酸菜鱼的历史来源众说纷纭，至今也无法考证，后经传承，制作方法现在也各有不同，但口味基本一致。', 43, '/uploads/09.jpg'),
(6, '土豆丝', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `node`
--

CREATE TABLE `node` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `pid` smallint(6) UNSIGNED NOT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `node`
--

INSERT INTO `node` (`id`, `name`, `title`, `status`, `remark`, `url`, `pid`, `level`) VALUES
(1, 'admin', '后台管理', 1, NULL, 'admin/index/index', 0, 1),
(2, 'Rbac', '权限管理', 1, NULL, '1', 1, 2),
(3, 'addrole', '添加角色', 1, NULL, '/admin/authority/addrole', 2, 3),
(4, 'admin_role', '角色管理', 1, NULL, '/admin/authority/admin_role', 2, 3),
(5, 'adminManage', '用户管理', 1, NULL, '1', 1, 2),
(6, 'admin_permission', '权限管理', 1, NULL, '/admin/authority/admin_permission', 2, 3),
(8, 'User Management', '用户管理', 1, NULL, '/admin/authority/admin_user', 5, 3),
(9, 'menuOperate', '商品管理', 1, NULL, '2', 1, 2),
(10, 'AllOperate', '全部商品', 1, NULL, '/admin/dishes/getalldisheslist', 9, 3),
(11, 'OperateSort', '商品分类', 1, NULL, '/admin/dishes/product_category', 9, 3),
(12, 'Article management', '文章管理', 1, NULL, '/admin/authority/', 1, 2),
(13, 'add_node', '添加权限', 1, NULL, '/admin/authority/add_node', 2, 3),
(14, 'adduser', '添加用户', 1, NULL, '/admin/authority/adduser', 2, 3),
(15, 'admin_user', '用户管理', 1, NULL, '/admin/user/adminlist', 2, 3),
(16, 'Businessmen', '商家管理', 1, NULL, '/admin/storejoin/index', 5, 3),
(18, 'website', '网站介绍', 1, NULL, '/admin/website/index', 12, 3),
(19, 'information', '公司公告', 1, NULL, ' /admin/article/index', 12, 3),
(20, 'storeBus', '商家加盟', 1, NULL, '/admin/storebusiness/index', 12, 3),
(21, 'serverCon', '服务内容', 1, NULL, '/admin/servercontent/index', 12, 3),
(29, 'userdiscuss', '用户评论', 1, NULL, '/admin/userdiscuss/index', 12, 3),
(23, 'os', '系统管理', 1, NULL, '1', 1, 2),
(24, 'sendway', '配送方式', 1, NULL, '/admin/sendway/index', 23, 3),
(25, 'payway', '支付方式', 1, NULL, '/admin/payway/index', 23, 3),
(28, 'telcontact', '联系方式', 1, NULL, '/admin/telcontact/index', 23, 3),
(27, 'links_url', '友情链接', 1, NULL, '/admin/index/links_url', 23, 3),
(30, 'webmanager', '站点管理', 1, NULL, '/admin/webmanger/index', 23, 3),
(31, 'webmanager', '站点管理', 1, NULL, '/admin/webmanager/index', 23, 3);

-- --------------------------------------------------------

--
-- 表的结构 `online_admin`
--

CREATE TABLE `online_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `create_time` varchar(30) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `online_admin`
--

INSERT INTO `online_admin` (`id`, `name`, `password`, `create_time`, `status`) VALUES
(9, '李保金', '96e79218965eb72c92a549dd5a330112', '2017-07-25 11:44:42.000000', 1),
(10, '杨傲然', '96e79218965eb72c92a549dd5a330112', '2017-07-25 11:46:45.000000', 1),
(11, '闫旭霞', '96e79218965eb72c92a549dd5a330112', '2017-07-25 11:47:47.000000', 1),
(13, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2017-07-25 11:51:12.000000', 1),
(14, 'shangjia', '7a122ca4b332f2b3923a585b6dceb178', '2017-07-29 10:31:20', 1);

-- --------------------------------------------------------

--
-- 表的结构 `online_order`
--

CREATE TABLE `online_order` (
  `order_id` int(10) NOT NULL COMMENT '自增id',
  `order_num` varchar(100) DEFAULT NULL COMMENT '订单编号',
  `user_id` int(10) DEFAULT NULL,
  `recieve_person` varchar(30) DEFAULT NULL,
  `shop_id` int(10) DEFAULT NULL,
  `menu_id` int(10) DEFAULT NULL,
  `num` int(5) DEFAULT NULL COMMENT '商品数量',
  `price` float DEFAULT NULL COMMENT '商品价格',
  `user_tel` varchar(20) DEFAULT NULL,
  `order_add_info` varchar(100) DEFAULT NULL COMMENT '附加赠言',
  `create_time` varchar(30) DEFAULT NULL COMMENT '下单时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `online_order`
--

INSERT INTO `online_order` (`order_id`, `order_num`, `user_id`, `recieve_person`, `shop_id`, `menu_id`, `num`, `price`, `user_tel`, `order_add_info`, `create_time`) VALUES
(6, 'LBJ1501122291', 2, '王山', 1, 6, 1, 20, '165465465486', '速递是那个女生东风雷诺', '2017-07-27 10:24:51'),
(7, 'LBJ1501122291', 2, '王山', 2, 4, 1, 43, '165465465486', '速递是那个女生东风雷诺', '2017-07-27 10:24:51'),
(8, 'LBJ1501285592', 4, 'wrwr', 1, 6, 1, 20, '1235436', 'hrthrterg', '2017-07-29 07:46:32'),
(9, 'LBJ1501285592', 4, 'wrwr', 2, 4, 1, 43, '1235436', 'hrthrterg', '2017-07-29 07:46:32'),
(10, 'LBJ1501296530', 5, '打不死的金', 1, 6, 1, 20, '234235', '346456', '2017-07-29 10:48:50'),
(11, 'LBJ1501296603', 5, '急急急', 1, 6, 1, 20, '34234', 'regret', '2017-07-29 10:50:03'),
(12, 'LBJ1501296826', 6, '是丢分别是的环境', 1, 3, 5, 68, '235346568768', '法规和法国和', '2017-07-29 10:53:46'),
(13, 'LBJ1501302385', 7, '二个人五个人', 1, 6, 5, 20, '3242342432', '违法而二', '2017-07-29 12:26:25'),
(14, 'LBJ1501313981', 8, 'sdfd', 1, 3, 4, 60, '34325', 'ytjyuiuoiuo', '2017-07-29 15:39:41'),
(15, 'LBJ1501315729', 2, '热特日天然', 1, 3, 1, 60, '4554665776', '法国恢复', '2017-07-29 16:08:49');

-- --------------------------------------------------------

--
-- 表的结构 `online_shop`
--

CREATE TABLE `online_shop` (
  `shop_id` int(30) NOT NULL,
  `shop_name` varchar(40) DEFAULT NULL,
  `shop_address` char(100) DEFAULT NULL,
  `shop_info` varchar(5000) DEFAULT NULL COMMENT '店家信息',
  `shop_route` varchar(1000) DEFAULT NULL COMMENT '乘车路线',
  `shop_tel` char(20) DEFAULT NULL,
  `shop_menu_type` char(30) DEFAULT NULL COMMENT '菜系/类别',
  `shop_activity` varchar(300) DEFAULT NULL COMMENT '店家活动',
  `shop_open_time` varchar(30) DEFAULT NULL COMMENT '开放时间',
  `shop_WIFI` varchar(100) DEFAULT NULL,
  `shop_avg_consume` double DEFAULT NULL COMMENT '人均消费',
  `shop_icon` varchar(40) DEFAULT NULL COMMENT '店铺图像',
  `shop_parking_space` int(5) DEFAULT NULL COMMENT '停车位'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `online_shop`
--

INSERT INTO `online_shop` (`shop_id`, `shop_name`, `shop_address`, `shop_info`, `shop_route`, `shop_tel`, `shop_menu_type`, `shop_activity`, `shop_open_time`, `shop_WIFI`, `shop_avg_consume`, `shop_icon`, `shop_parking_space`) VALUES
(1, '淮扬菜餐厅', '北京丰台区-六里桥/丽泽桥 西客站南广场中铁工程大厦1-3楼', '福泰宫酒楼是一家主要做淮扬菜，同时兼做官府菜和湘菜的餐厅。 \r\n　　餐厅位于西客站南广场繁华地带，地理位置优越。福泰宫酒楼是人杰地灵的古城扬州知名企业“扬州福满楼餐饮有限公司”在北京开设的家分店，力求把正宗的淮扬风味带给京城。 \r\n　　“远闻悠悠丝竹、萦梁绕柱，近观小桥流水、扬州人家”这是对餐厅环境的总结。餐厅装潢优雅别致，在有限的空间内通过知名设计师的巧妙安排，勾勒出小桥、流水、游鱼、响瀑、飞檐、丝竹等别样的江南韵味。餐厅整体装修属于中西结合风格，既有属于中国风情的雕花原木门窗以及气派端庄的古朴桌椅，也有欧式风范的豪华水晶吊灯和垂挂用餐区两侧的水晶珠帘，看起来稳重端庄也不失时尚现代，浪漫时尚的同时也不乏中国味道。正对大门的楼梯渗透着雅致和大气。二楼主要是包间，装修古典雅致，古色古香的江南风韵，空间私密，但又不会显得封闭和局促。此外，豪华包间红楼厅、乾隆厅、三头厅等更具文化气息，红楼厅所有陈设和布置都是与红学相关，红楼梦玉、黛玉葬花等陈设，能更好的熏陶文化情操。 \r\n　　餐厅菜品主要是正宗的扬州风味、江南官府菜、盐商私房菜等，所有食材均是从扬州空运而至，如果食客点“纹丝豆腐羹”菜品，厨师将表演蒙眼切豆腐的绝活。 \r\n　　餐厅还设有特色宴席红楼宴、乾隆宴、三头宴等，其中红楼宴被北京饮食行业协会评为精品宴席，而且餐厅在2008年奥运期间是作为北京商务局推荐的国家特级淮扬风味餐厅，并且成功的接待了多位外国元首以及政要', '由广安路行驶至北京西站南路，向北进入北京西站南路，停车入口在路西，停车地址和收费仅供参考，请以实际为准。', '010-51892677', '苏菜', '9折除酒烟茶水河海鲜水产品特价品服务费等 优惠详情： 9折除酒烟茶水河海鲜水产品特价品服务费等 ', '上午:11:00-14:00;下午:17:00-22:00', '123456789', 128, '/uploads/cc.jpg', 100),
(2, '李先生', '北京丰台区-六里桥/丽泽桥 西客站南广场中铁工程大厦1-3楼', '，豪华包间红楼厅、乾隆厅、三头厅等更具文化气息，红楼厅所有陈设和布置都是与红学相关，红楼梦玉、黛玉葬花等陈设，能更好的熏陶文化情操。 \r\n　　餐厅菜品主要是正宗的扬州风味、江南官府菜、盐商私房菜等，所有食材均是从扬州空运而至，如果食客点“纹丝豆腐羹”菜品，厨师将表演蒙眼切豆腐的绝活。 \r\n　　餐厅还设有特色宴席红楼宴、乾隆宴、三头宴等，其中红楼宴被北京饮食行业协会评为精品宴席，而且餐厅在2008年奥运期间是作为北京商务局推荐的国家特级淮扬风味餐厅，并且成功的接待了多位外国元首以及政要', '由广安路行驶至北京西站南路，向北进入北京西站南路，停车入口在路西，停车地址和收费仅供参考，请以实际为准。', '010-566666', '川菜', '9折除酒烟茶水河海鲜水产品特价品服务费等 优惠详情： 9折除酒烟茶水河海鲜水产品特价品服务费等', '上午:11:00-14:00;下午:17:00-22:00', '12552252', 95, '/uploads/ee.jpg', 200);

-- --------------------------------------------------------

--
-- 表的结构 `online_user`
--

CREATE TABLE `online_user` (
  `user_id` int(11) NOT NULL,
  `user_name` char(30) DEFAULT NULL,
  `user_pwd` char(32) DEFAULT NULL,
  `user_email` varchar(40) DEFAULT NULL,
  `user_tel` varchar(30) DEFAULT NULL,
  `user_last_login_time` varchar(30) DEFAULT NULL,
  `user_create_time` varchar(30) DEFAULT NULL,
  `user_icon` varchar(50) DEFAULT NULL COMMENT '头像',
  `user_integrate` int(10) DEFAULT '0' COMMENT '积分',
  `user_member` varchar(20) DEFAULT '会员' COMMENT '会员',
  `user_provice` char(30) DEFAULT NULL COMMENT '省',
  `user_city` char(30) DEFAULT NULL COMMENT '市',
  `user_county` char(30) DEFAULT NULL COMMENT '县',
  `user_level` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `online_user`
--

INSERT INTO `online_user` (`user_id`, `user_name`, `user_pwd`, `user_email`, `user_tel`, `user_last_login_time`, `user_create_time`, `user_icon`, `user_integrate`, `user_member`, `user_provice`, `user_city`, `user_county`, `user_level`) VALUES
(1, '李保金', '548b01b60648f76327234f54fe08724a', '123456789@qq.com', '15225785203', '2017-07-19 02:09:08.000000', '2017-07-18 15:17:26.000000', NULL, NULL, NULL, '河南省', '周口市', '淮阳县', 1),
(2, '李金宝', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '1555@1126.net', '15225785203', NULL, '2017-07-22 10:37:04.000000', NULL, 0, '会员', NULL, NULL, NULL, 1),
(3, 'yar', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '46546@163.com', '13843819438', NULL, '2017-07-23 15:51:34.000000', NULL, 0, '会员', NULL, NULL, NULL, 1),
(4, '大金雕', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '123465@163.com', '15225785203', NULL, '2017-07-29 02:11:09', NULL, 0, '会员', NULL, NULL, NULL, 1),
(5, 'asdf', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '453453@163.com', '15225785203', NULL, '2017-07-29 07:51:56', NULL, 0, '会员', NULL, NULL, NULL, 1),
(6, '王山上', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '684@qq.com', '1654648', NULL, '2017-07-29 10:52:02', NULL, 0, '会员', NULL, NULL, NULL, 1),
(7, '金金金', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '465456@163.com', '15225785203', NULL, '2017-07-29 12:21:30', NULL, 0, '会员', NULL, NULL, NULL, 1),
(8, 'zxcv', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '46465@163.com', '15225785203', NULL, '2017-07-29 15:35:16', NULL, 0, '会员', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `order_status`
--

CREATE TABLE `order_status` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `order_num` varchar(100) DEFAULT NULL COMMENT '订单编号',
  `order_status` varchar(20) DEFAULT NULL COMMENT '订单状态',
  `order_operate` varchar(20) DEFAULT NULL COMMENT '操作',
  `pay_way` varchar(30) DEFAULT NULL COMMENT '支付方式',
  `logistics` varchar(50) DEFAULT NULL COMMENT '物流',
  `user_message` varchar(300) DEFAULT NULL COMMENT '用户留言'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `order_status`
--

INSERT INTO `order_status` (`id`, `user_id`, `order_num`, `order_status`, `order_operate`, `pay_way`, `logistics`, `user_message`) VALUES
(4, 2, 'LBJ1501122291', '未收货', NULL, '支付宝', '美团', NULL),
(5, 4, 'LBJ1501285592', '未收货', NULL, '支付宝', '美团', NULL),
(6, 5, 'LBJ1501296530', '未收货', NULL, '支付宝', '美团', NULL),
(7, 5, 'LBJ1501296603', '未收货', NULL, '支付宝', '美团', NULL),
(8, 6, 'LBJ1501296826', '未收货', NULL, '支付宝', '美团', NULL),
(9, 7, 'LBJ1501302385', '未收货', NULL, '支付宝', '美团', NULL),
(10, 8, 'LBJ1501313981', '未收货', NULL, '支付宝', '美团', NULL),
(11, 2, 'LBJ1501315729', '未收货', NULL, '支付宝', '美团', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `pay_way`
--

CREATE TABLE `pay_way` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `paytype` char(30) NOT NULL,
  `create_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pay_way`
--

INSERT INTO `pay_way` (`id`, `username`, `paytype`, `create_time`) VALUES
(1, '张三', '微信支付', '0000-00-00 00:00:00.000000'),
(2, '李四', '支付宝支付', '2017-07-05 00:00:00.000000');

-- --------------------------------------------------------

--
-- 表的结构 `power`
--

CREATE TABLE `power` (
  `power_id` int(10) NOT NULL,
  `power_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `create_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `recieve_address`
--

CREATE TABLE `recieve_address` (
  `recieve_id` int(30) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `recieve_username` varchar(30) DEFAULT NULL,
  `recieve_address` varchar(100) DEFAULT NULL,
  `recieve_address_detail` varchar(100) DEFAULT NULL,
  `recieve_ems` varchar(20) DEFAULT NULL COMMENT '快递',
  `recieve_tel` varchar(30) DEFAULT NULL COMMENT '收货人电话'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `recieve_address`
--

INSERT INTO `recieve_address` (`recieve_id`, `user_id`, `recieve_username`, `recieve_address`, `recieve_address_detail`, `recieve_ems`, `recieve_tel`) VALUES
(9, 4, 'wrwr', 'ewgyrty', '北京市海淀区永泰庄', '美团', '1235436'),
(11, 2, '闫旭霞', NULL, '北京市海淀区', '234321', '15733232222'),
(12, 5, '打不死的金', '网而翁', '北京市海淀区永泰庄', '美团', '234235'),
(13, 5, '急急急', '千万人群', '北京市海淀区永泰庄', '美团', '34234'),
(14, 6, '是丢分别是的环境', '网而翁', '北京市海淀区永泰庄', '美团', '235346568768'),
(15, 7, '二个人五个人', '威风', '北京市海淀区永泰庄', '美团', '3242342432'),
(16, 8, 'sdfd', 'sdgdfg', '北京市海淀区永泰庄', '美团', '34325'),
(17, 2, '热特日天然', '儿童热帖', '北京市海淀区永泰庄', '美团', '4554665776');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE `role` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, '管理员', NULL, 1, ''),
(2, '会员', NULL, 1, ''),
(3, '超级管理员', NULL, 1, ''),
(4, '商家', NULL, 1, '这个商家仅仅允许他看自己的商品');

-- --------------------------------------------------------

--
-- 表的结构 `role_admin`
--

CREATE TABLE `role_admin` (
  `role_id` mediumint(9) UNSIGNED NOT NULL,
  `user_id` char(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `role_admin`
--

INSERT INTO `role_admin` (`role_id`, `user_id`) VALUES
(1, '12'),
(1, '9'),
(2, '10'),
(2, '11'),
(2, '12'),
(3, '13'),
(4, '14');

-- --------------------------------------------------------

--
-- 表的结构 `send_effic`
--

CREATE TABLE `send_effic` (
  `id` int(11) NOT NULL,
  `way_name` char(20) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `effic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `send_way`
--

CREATE TABLE `send_way` (
  `id` int(11) NOT NULL,
  `title` char(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `create_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `send_way`
--

INSERT INTO `send_way` (`id`, `title`, `description`, `create_time`) VALUES
(1, '圆通快递', '圆通快递', '2017-07-18 00:00:00.000000'),
(2, '中通快递', '中通快递', '2017-07-07 00:00:00.000000'),
(3, '申通快递', '申通快递', '2017-07-19 08:33:26.469000'),
(4, '韵达快递', '韵达快递', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- 表的结构 `server_content`
--

CREATE TABLE `server_content` (
  `id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `server_content`
--

INSERT INTO `server_content` (`id`, `content`) VALUES
(1, '服务内容服务内容服务内容服务内容服务内容服务内容服务内容服务内容服务');

-- --------------------------------------------------------

--
-- 表的结构 `server_fee`
--

CREATE TABLE `server_fee` (
  `id` int(11) NOT NULL,
  `server_name` char(30) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_cart`
--

CREATE TABLE `shop_cart` (
  `shop_cart_id` int(11) NOT NULL,
  `user_id` int(30) DEFAULT NULL COMMENT '用户id',
  `shop_id` int(30) DEFAULT NULL COMMENT '店家id',
  `menu_id` int(30) DEFAULT NULL COMMENT '菜品id',
  `menu_price` float DEFAULT NULL COMMENT '菜品单价',
  `menu_name` varchar(40) DEFAULT NULL,
  `menu_icon` varchar(100) DEFAULT NULL,
  `menu_num` int(10) DEFAULT NULL COMMENT '菜品数量',
  `is_collect` int(3) NOT NULL DEFAULT '0' COMMENT '是否收藏',
  `is_delete` int(3) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `last_operate_time` varchar(30) DEFAULT NULL COMMENT '最后操作时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shop_cart`
--

INSERT INTO `shop_cart` (`shop_cart_id`, `user_id`, `shop_id`, `menu_id`, `menu_price`, `menu_name`, `menu_icon`, `menu_num`, `is_collect`, `is_delete`, `last_operate_time`) VALUES
(32, 4, 2, 4, 43, '酸菜鱼', '20170723\\34680eea3c2c4a6da84ae9ed8d34d6f6.jpg', 1, 0, 0, '2017-07-29 02:24:29'),
(33, 4, 1, 6, 20, '土豆丝', '20170724\\298525c14b4c9c7ab560b37f2e43813c.jpg', 1, 0, 0, '2017-07-29 02:36:59'),
(35, 5, 1, 1, 45, '松鼠桂鱼', '20170729\\e925829d36392801d3fa6b7db27f1616.jpg', 1, 0, 0, '2017-07-29 07:53:39'),
(37, 5, 1, 6, 20, '土豆丝', '20170724\\298525c14b4c9c7ab560b37f2e43813c.jpg', 1, 0, 0, '2017-07-29 07:57:44'),
(38, 6, 1, 3, 68, '口水鸡', '20170723\\07a86413240c73a9ac33e6f8287fc73d.jpg', 1, 0, 0, '2017-07-29 10:52:56'),
(44, 7, 1, 1, 45, '松鼠桂鱼', '20170729\\e925829d36392801d3fa6b7db27f1616.jpg', 1, 0, 0, '2017-07-29 12:33:07'),
(45, 7, 1, 6, 20, '土豆丝', '20170724\\298525c14b4c9c7ab560b37f2e43813c.jpg', 1, 0, 0, '2017-07-29 12:33:23'),
(49, 8, 1, 3, 60, '口水鸡', '20170729/3430d098efa52f255c4cae4b4627ea88.jpg', 1, 0, 0, '2017-07-29 15:42:39'),
(65, 2, 1, 3, 60, '口水鸡', '20170729/3430d098efa52f255c4cae4b4627ea88.jpg', 1, 0, 0, '2017-07-29 16:08:01');

-- --------------------------------------------------------

--
-- 表的结构 `shop_coupon`
--

CREATE TABLE `shop_coupon` (
  `coupon_id` int(30) NOT NULL,
  `coupon_price` float DEFAULT NULL,
  `coupon_shop` varchar(50) DEFAULT NULL,
  `coupon_validity` varchar(40) DEFAULT NULL COMMENT '有效期',
  `coupon_condition` varchar(30) DEFAULT NULL COMMENT '使用条件'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `shop_menu`
--

CREATE TABLE `shop_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(20) DEFAULT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `shop_id` int(20) DEFAULT NULL,
  `menu_info` varchar(5000) DEFAULT NULL COMMENT '菜品介绍',
  `menu_price` float DEFAULT NULL,
  `menu_icon` varchar(100) DEFAULT NULL COMMENT '菜品图像',
  `create_time` varchar(30) DEFAULT NULL,
  `menu_type` varchar(20) DEFAULT NULL,
  `is_delete` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `shop_menu`
--

INSERT INTO `shop_menu` (`id`, `menu_id`, `menu_name`, `shop_id`, `menu_info`, `menu_price`, `menu_icon`, `create_time`, `menu_type`, `is_delete`) VALUES
(1, 1, '松鼠桂鱼', 1, '松鼠桂鱼又名松鼠鳜鱼，是江苏省苏州市地方传统名菜。当炸好的鳜鱼（或桂鱼）上桌时，随即浇上热气腾腾的卤汁，它便吱吱地“叫”起来，因活像一只松鼠而得名。这道菜成菜后，形如松鼠、外脆里嫩、色泽橘黄，酸甜适口，并有松红香味。', 45, '20170729\\e925829d36392801d3fa6b7db27f1616.jpg', '2017-07-29 00:36:58', '苏菜', 1),
(2, 2, '锅包肉', 2, '锅包肉（英文名：Double Cooked Pork Slices），原名锅爆肉，是一道东北菜，光绪年间始创自哈尔滨道台府府尹杜学赢厨师郑兴文之手。成菜后，色泽金黄，口味酸甜。锅包肉是为适应外宾口味，把咸鲜口味的“焦烧肉条”改成了一道酸甜口味的菜肴。通常将猪里脊肉切片腌入味，裹上炸浆，下锅炸至金黄色捞起，再下锅拌炒勾芡即成。', 77, '20170723\\b65ef2c1e232b59d0d8c277690ba1185.jpg', '2017-07-23 19:21:26.000000', '川菜', 1),
(3, 3, '口水鸡', 1, '口水鸡是中国四川传统特色菜肴，属于川菜系中的凉菜，佐料丰富，集麻辣鲜香嫩爽于一身。 在烹制时，煮鸡用的汤料很有讲究，需要恰到好处，这样可以最大限度地保存鸡的可溶性蛋白，增加鸡肉的鲜美程度，又能具备其特有的香型和滋味。口水鸡是一道凉菜，佐料丰富，集麻辣鲜香嫩爽于一身。有“名驰巴蜀三千里，味压江南十二州”的美称。“口水鸡”这名字初听感觉有点不雅，脑子里可能会出现一副口水滴哒的样子，之所以叫口水鸡还因为有很多花椒，吃了会麻到嘴巴瘫痪不由自主流口水。', 60, '20170729/3430d098efa52f255c4cae4b4627ea88.jpg', '2017-07-29 11:07:25', '苏菜', 1),
(4, 4, '酸菜鱼', 2, '酸菜鱼也称为酸汤鱼，是一道源自重庆的经典菜品，以其特有的调味和独特的烹调技法而著称。流行于上世纪90年代，是重庆江湖菜的开路先锋之一。\r\n酸菜鱼以草鱼为主料，配以泡菜等食材煮制而成，口味酸辣可口；鱼含丰富优质蛋白，能提供人丰富的蛋白质、矿物质等营养；酸菜中的乳酸可以促进人体对铁元素的吸收，还可以增加人的食欲。\r\n关于酸菜鱼的历史来源众说纷纭，至今也无法考证，后经传承，制作方法现在也各有不同，但口味基本一致。', 43, '20170723\\34680eea3c2c4a6da84ae9ed8d34d6f6.jpg', '2017-07-23 19:22:55.000000', '川菜', 1),
(13, 6, '土豆丝', 1, '神盾局JS百度布局', 20, '20170724\\298525c14b4c9c7ab560b37f2e43813c.jpg', '2017-07-24 14:44:01.000000', '鲁菜', 1);

-- --------------------------------------------------------

--
-- 表的结构 `store_business`
--

CREATE TABLE `store_business` (
  `id` int(11) NOT NULL,
  `store_info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `store_business`
--

INSERT INTO `store_business` (`id`, `store_info`) VALUES
(2, '加盟理由加盟理由加盟理由');

-- --------------------------------------------------------

--
-- 表的结构 `store_join`
--

CREATE TABLE `store_join` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `store_pwd` varchar(32) NOT NULL,
  `store_tel` varchar(30) NOT NULL,
  `create_time` varchar(30) NOT NULL,
  `is_check` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `store_join`
--

INSERT INTO `store_join` (`store_id`, `store_name`, `store_pwd`, `store_tel`, `create_time`, `is_check`) VALUES
(1, '324567', 'c9a3e0714be7fd17c32c2be6111679bb', '1534343543', '2017-07-24 13:57:48.000000', 1),
(3, '德惠恒', '96e79218965eb72c92a549dd5a330112', '111111', '2017-07-24 14:57:52.000000', 1),
(4, '德', '96e79218965eb72c92a549dd5a330112', '1532432432', '2017-07-24 16:52:38.000000', 1),
(5, '测试', '96e79218965eb72c92a549dd5a330112', '15435342', '2017-07-27 15:47:00.000000', 0),
(6, '德惠恒', '96e79218965eb72c92a549dd5a330112', '157324222', '2017-07-29 09:29:07', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tel_contact`
--

CREATE TABLE `tel_contact` (
  `id` int(11) NOT NULL,
  `telephone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tel_contact`
--

INSERT INTO `tel_contact` (`id`, `telephone`) VALUES
(2, '15788889999');

-- --------------------------------------------------------

--
-- 表的结构 `user_character`
--

CREATE TABLE `user_character` (
  `character_id` int(10) NOT NULL,
  `character_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_comments`
--

CREATE TABLE `user_comments` (
  `comment_id` int(30) NOT NULL,
  `message_name` varchar(30) NOT NULL DEFAULT '0',
  `user_id` int(30) DEFAULT NULL,
  `menu_id` int(30) DEFAULT NULL,
  `shop_id` int(30) DEFAULT NULL,
  `reply_content` varchar(200) DEFAULT NULL,
  `reply_time` varchar(30) DEFAULT NULL,
  `is_reply` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_comments`
--

INSERT INTO `user_comments` (`comment_id`, `message_name`, `user_id`, `menu_id`, `shop_id`, `reply_content`, `reply_time`, `is_reply`) VALUES
(4, '某商品有问题', 4, 1, 1, '有味地附近的司法局的设计费', '2017-07-25 06:15:14.000000', 0),
(13, '0', 4, 1, 1, '谢谢您的品论', '2017-07-25 04:07:12.000000', 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_favor`
--

CREATE TABLE `user_favor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `create_time` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_favor`
--

INSERT INTO `user_favor` (`id`, `user_id`, `shop_id`, `create_time`) VALUES
(1, 4, 2, '2017-07-28 14:44:58'),
(5, 2, 1, '2017-07-29 09:42:46');

-- --------------------------------------------------------

--
-- 表的结构 `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `content` varchar(200) NOT NULL,
  `create_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `website`
--

INSERT INTO `website` (`id`, `name`, `content`, `create_time`) VALUES
(1, '网站介绍', '丰东股份大幅度', '2017-07-28 03:28:24.000000');

-- --------------------------------------------------------

--
-- 表的结构 `web_manager`
--

CREATE TABLE `web_manager` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `is_close` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `web_manager`
--

INSERT INTO `web_manager` (`id`, `name`, `url`, `telephone`, `is_close`) VALUES
(1, '网上订餐', 'www.yangaoran.xyz', '1888543834', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD KEY `groupId` (`role_id`),
  ADD KEY `nodeId` (`node_id`);

--
-- Indexes for table `admin_character`
--
ALTER TABLE `admin_character`
  ADD PRIMARY KEY (`admin_character_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_power`
--
ALTER TABLE `character_power`
  ADD PRIMARY KEY (`character_power_id`);

--
-- Indexes for table `links_url`
--
ALTER TABLE `links_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_list`
--
ALTER TABLE `menu_list`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `node`
--
ALTER TABLE `node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `online_admin`
--
ALTER TABLE `online_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_order`
--
ALTER TABLE `online_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `online_shop`
--
ALTER TABLE `online_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `online_user`
--
ALTER TABLE `online_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_way`
--
ALTER TABLE `pay_way`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `power`
--
ALTER TABLE `power`
  ADD PRIMARY KEY (`power_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recieve_address`
--
ALTER TABLE `recieve_address`
  ADD PRIMARY KEY (`recieve_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `group_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `send_effic`
--
ALTER TABLE `send_effic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_way`
--
ALTER TABLE `send_way`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server_content`
--
ALTER TABLE `server_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server_fee`
--
ALTER TABLE `server_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_cart`
--
ALTER TABLE `shop_cart`
  ADD PRIMARY KEY (`shop_cart_id`);

--
-- Indexes for table `shop_coupon`
--
ALTER TABLE `shop_coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `shop_menu`
--
ALTER TABLE `shop_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_business`
--
ALTER TABLE `store_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_join`
--
ALTER TABLE `store_join`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `tel_contact`
--
ALTER TABLE `tel_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_character`
--
ALTER TABLE `user_character`
  ADD PRIMARY KEY (`character_id`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `user_favor`
--
ALTER TABLE `user_favor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_manager`
--
ALTER TABLE `web_manager`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin_character`
--
ALTER TABLE `admin_character`
  MODIFY `admin_character_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `links_url`
--
ALTER TABLE `links_url`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `menu_list`
--
ALTER TABLE `menu_list`
  MODIFY `menu_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `node`
--
ALTER TABLE `node`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 使用表AUTO_INCREMENT `online_admin`
--
ALTER TABLE `online_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `online_order`
--
ALTER TABLE `online_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id', AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `online_shop`
--
ALTER TABLE `online_shop`
  MODIFY `shop_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `online_user`
--
ALTER TABLE `online_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `pay_way`
--
ALTER TABLE `pay_way`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `power`
--
ALTER TABLE `power`
  MODIFY `power_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `recieve_address`
--
ALTER TABLE `recieve_address`
  MODIFY `recieve_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `role`
--
ALTER TABLE `role`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `send_effic`
--
ALTER TABLE `send_effic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `send_way`
--
ALTER TABLE `send_way`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `server_content`
--
ALTER TABLE `server_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `server_fee`
--
ALTER TABLE `server_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `shop_cart`
--
ALTER TABLE `shop_cart`
  MODIFY `shop_cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- 使用表AUTO_INCREMENT `shop_coupon`
--
ALTER TABLE `shop_coupon`
  MODIFY `coupon_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `shop_menu`
--
ALTER TABLE `shop_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `store_business`
--
ALTER TABLE `store_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `store_join`
--
ALTER TABLE `store_join`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `tel_contact`
--
ALTER TABLE `tel_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `user_character`
--
ALTER TABLE `user_character`
  MODIFY `character_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `comment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `user_favor`
--
ALTER TABLE `user_favor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `website`
--
ALTER TABLE `website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `web_manager`
--
ALTER TABLE `web_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
