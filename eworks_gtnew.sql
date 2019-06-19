/*
Navicat MySQL Data Transfer

Source Server         : gtnew.apps.am
Source Server Version : 50641
Source Host           : localhost:3306
Source Database       : eworks_gtnew

Target Server Type    : MYSQL
Target Server Version : 50641
File Encoding         : 65001

Date: 2019-06-19 17:58:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for assignments
-- ----------------------------
DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of assignments
-- ----------------------------
INSERT INTO `assignments` VALUES ('1', 'Sole consultant');
INSERT INTO `assignments` VALUES ('2', 'JV leader');
INSERT INTO `assignments` VALUES ('3', 'JV partner');

-- ----------------------------
-- Table structure for checklist_users
-- ----------------------------
DROP TABLE IF EXISTS `checklist_users`;
CREATE TABLE `checklist_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `checklist_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `che_index` (`checklist_id`),
  KEY `u_ind` (`user_id`),
  CONSTRAINT `che_index` FOREIGN KEY (`checklist_id`) REFERENCES `project_checklists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `u_ind` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of checklist_users
-- ----------------------------

-- ----------------------------
-- Table structure for communications
-- ----------------------------
DROP TABLE IF EXISTS `communications`;
CREATE TABLE `communications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) DEFAULT NULL,
  `communications_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of communications
-- ----------------------------

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES ('1', 'Grant Thornton CJSC', null);
INSERT INTO `companies` VALUES ('3', 'Grant Thornton Consulting CJSC', null);
INSERT INTO `companies` VALUES ('4', 'Grant Thornton Legal & Tax LLC', null);

-- ----------------------------
-- Table structure for components
-- ----------------------------
DROP TABLE IF EXISTS `components`;
CREATE TABLE `components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of components
-- ----------------------------
INSERT INTO `components` VALUES ('1', 'Feasibility study');
INSERT INTO `components` VALUES ('2', 'Business plan');
INSERT INTO `components` VALUES ('3', 'Valuation');
INSERT INTO `components` VALUES ('4', 'Due Diligence');
INSERT INTO `components` VALUES ('5', 'HR Consulting');
INSERT INTO `components` VALUES ('6', 'Provision of trainings');
INSERT INTO `components` VALUES ('7', 'Market Study');
INSERT INTO `components` VALUES ('8', 'Development of manuals');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'AF', 'Afghanistan');
INSERT INTO `countries` VALUES ('2', 'AL', 'Albania');
INSERT INTO `countries` VALUES ('3', 'DZ', 'Algeria');
INSERT INTO `countries` VALUES ('4', 'DS', 'American Samoa');
INSERT INTO `countries` VALUES ('5', 'AD', 'Andorra');
INSERT INTO `countries` VALUES ('6', 'AO', 'Angola');
INSERT INTO `countries` VALUES ('7', 'AI', 'Anguilla');
INSERT INTO `countries` VALUES ('8', 'AQ', 'Antarctica');
INSERT INTO `countries` VALUES ('9', 'AG', 'Antigua and Barbuda');
INSERT INTO `countries` VALUES ('10', 'AR', 'Argentina');
INSERT INTO `countries` VALUES ('11', 'AM', 'Armenia');
INSERT INTO `countries` VALUES ('12', 'AW', 'Aruba');
INSERT INTO `countries` VALUES ('13', 'AU', 'Australia');
INSERT INTO `countries` VALUES ('14', 'AT', 'Austria');
INSERT INTO `countries` VALUES ('15', 'AZ', 'Azerbaijan');
INSERT INTO `countries` VALUES ('16', 'BS', 'Bahamas');
INSERT INTO `countries` VALUES ('17', 'BH', 'Bahrain');
INSERT INTO `countries` VALUES ('18', 'BD', 'Bangladesh');
INSERT INTO `countries` VALUES ('19', 'BB', 'Barbados');
INSERT INTO `countries` VALUES ('20', 'BY', 'Belarus');
INSERT INTO `countries` VALUES ('21', 'BE', 'Belgium');
INSERT INTO `countries` VALUES ('22', 'BZ', 'Belize');
INSERT INTO `countries` VALUES ('23', 'BJ', 'Benin');
INSERT INTO `countries` VALUES ('24', 'BM', 'Bermuda');
INSERT INTO `countries` VALUES ('25', 'BT', 'Bhutan');
INSERT INTO `countries` VALUES ('26', 'BO', 'Bolivia');
INSERT INTO `countries` VALUES ('27', 'BA', 'Bosnia and Herzegovina');
INSERT INTO `countries` VALUES ('28', 'BW', 'Botswana');
INSERT INTO `countries` VALUES ('29', 'BV', 'Bouvet Island');
INSERT INTO `countries` VALUES ('30', 'BR', 'Brazil');
INSERT INTO `countries` VALUES ('31', 'IO', 'British Indian Ocean Territory');
INSERT INTO `countries` VALUES ('32', 'BN', 'Brunei Darussalam');
INSERT INTO `countries` VALUES ('33', 'BG', 'Bulgaria');
INSERT INTO `countries` VALUES ('34', 'BF', 'Burkina Faso');
INSERT INTO `countries` VALUES ('35', 'BI', 'Burundi');
INSERT INTO `countries` VALUES ('36', 'KH', 'Cambodia');
INSERT INTO `countries` VALUES ('37', 'CM', 'Cameroon');
INSERT INTO `countries` VALUES ('38', 'CA', 'Canada');
INSERT INTO `countries` VALUES ('39', 'CV', 'Cape Verde');
INSERT INTO `countries` VALUES ('40', 'KY', 'Cayman Islands');
INSERT INTO `countries` VALUES ('41', 'CF', 'Central African Republic');
INSERT INTO `countries` VALUES ('42', 'TD', 'Chad');
INSERT INTO `countries` VALUES ('43', 'CL', 'Chile');
INSERT INTO `countries` VALUES ('44', 'CN', 'China');
INSERT INTO `countries` VALUES ('45', 'CX', 'Christmas Island');
INSERT INTO `countries` VALUES ('46', 'CC', 'Cocos (Keeling) Islands');
INSERT INTO `countries` VALUES ('47', 'CO', 'Colombia');
INSERT INTO `countries` VALUES ('48', 'KM', 'Comoros');
INSERT INTO `countries` VALUES ('49', 'CG', 'Congo');
INSERT INTO `countries` VALUES ('50', 'CK', 'Cook Islands');
INSERT INTO `countries` VALUES ('51', 'CR', 'Costa Rica');
INSERT INTO `countries` VALUES ('52', 'HR', 'Croatia (Hrvatska)');
INSERT INTO `countries` VALUES ('53', 'CU', 'Cuba');
INSERT INTO `countries` VALUES ('54', 'CY', 'Cyprus');
INSERT INTO `countries` VALUES ('55', 'CZ', 'Czech Republic');
INSERT INTO `countries` VALUES ('56', 'DK', 'Denmark');
INSERT INTO `countries` VALUES ('57', 'DJ', 'Djibouti');
INSERT INTO `countries` VALUES ('58', 'DM', 'Dominica');
INSERT INTO `countries` VALUES ('59', 'DO', 'Dominican Republic');
INSERT INTO `countries` VALUES ('60', 'TP', 'East Timor');
INSERT INTO `countries` VALUES ('61', 'EC', 'Ecuador');
INSERT INTO `countries` VALUES ('62', 'EG', 'Egypt');
INSERT INTO `countries` VALUES ('63', 'SV', 'El Salvador');
INSERT INTO `countries` VALUES ('64', 'GQ', 'Equatorial Guinea');
INSERT INTO `countries` VALUES ('65', 'ER', 'Eritrea');
INSERT INTO `countries` VALUES ('66', 'EE', 'Estonia');
INSERT INTO `countries` VALUES ('67', 'ET', 'Ethiopia');
INSERT INTO `countries` VALUES ('68', 'FK', 'Falkland Islands (Malvinas)');
INSERT INTO `countries` VALUES ('69', 'FO', 'Faroe Islands');
INSERT INTO `countries` VALUES ('70', 'FJ', 'Fiji');
INSERT INTO `countries` VALUES ('71', 'FI', 'Finland');
INSERT INTO `countries` VALUES ('72', 'FR', 'France');
INSERT INTO `countries` VALUES ('73', 'FX', 'France, Metropolitan');
INSERT INTO `countries` VALUES ('74', 'GF', 'French Guiana');
INSERT INTO `countries` VALUES ('75', 'PF', 'French Polynesia');
INSERT INTO `countries` VALUES ('76', 'TF', 'French Southern Territories');
INSERT INTO `countries` VALUES ('77', 'GA', 'Gabon');
INSERT INTO `countries` VALUES ('78', 'GM', 'Gambia');
INSERT INTO `countries` VALUES ('79', 'GE', 'Georgia');
INSERT INTO `countries` VALUES ('80', 'DE', 'Germany');
INSERT INTO `countries` VALUES ('81', 'GH', 'Ghana');
INSERT INTO `countries` VALUES ('82', 'GI', 'Gibraltar');
INSERT INTO `countries` VALUES ('83', 'GK', 'Guernsey');
INSERT INTO `countries` VALUES ('84', 'GR', 'Greece');
INSERT INTO `countries` VALUES ('85', 'GL', 'Greenland');
INSERT INTO `countries` VALUES ('86', 'GD', 'Grenada');
INSERT INTO `countries` VALUES ('87', 'GP', 'Guadeloupe');
INSERT INTO `countries` VALUES ('88', 'GU', 'Guam');
INSERT INTO `countries` VALUES ('89', 'GT', 'Guatemala');
INSERT INTO `countries` VALUES ('90', 'GN', 'Guinea');
INSERT INTO `countries` VALUES ('91', 'GW', 'Guinea-Bissau');
INSERT INTO `countries` VALUES ('92', 'GY', 'Guyana');
INSERT INTO `countries` VALUES ('93', 'HT', 'Haiti');
INSERT INTO `countries` VALUES ('94', 'HM', 'Heard and Mc Donald Islands');
INSERT INTO `countries` VALUES ('95', 'HN', 'Honduras');
INSERT INTO `countries` VALUES ('96', 'HK', 'Hong Kong');
INSERT INTO `countries` VALUES ('97', 'HU', 'Hungary');
INSERT INTO `countries` VALUES ('98', 'IS', 'Iceland');
INSERT INTO `countries` VALUES ('99', 'IN', 'India');
INSERT INTO `countries` VALUES ('100', 'IM', 'Isle of Man');
INSERT INTO `countries` VALUES ('101', 'ID', 'Indonesia');
INSERT INTO `countries` VALUES ('102', 'IR', 'Iran (Islamic Republic of)');
INSERT INTO `countries` VALUES ('103', 'IQ', 'Iraq');
INSERT INTO `countries` VALUES ('104', 'IE', 'Ireland');
INSERT INTO `countries` VALUES ('105', 'IL', 'Israel');
INSERT INTO `countries` VALUES ('106', 'IT', 'Italy');
INSERT INTO `countries` VALUES ('107', 'CI', 'Ivory Coast');
INSERT INTO `countries` VALUES ('108', 'JE', 'Jersey');
INSERT INTO `countries` VALUES ('109', 'JM', 'Jamaica');
INSERT INTO `countries` VALUES ('110', 'JP', 'Japan');
INSERT INTO `countries` VALUES ('111', 'JO', 'Jordan');
INSERT INTO `countries` VALUES ('112', 'KZ', 'Kazakhstan');
INSERT INTO `countries` VALUES ('113', 'KE', 'Kenya');
INSERT INTO `countries` VALUES ('114', 'KI', 'Kiribati');
INSERT INTO `countries` VALUES ('115', 'KP', 'Korea, Democratic People\'s Republic of');
INSERT INTO `countries` VALUES ('116', 'KR', 'Korea, Republic of');
INSERT INTO `countries` VALUES ('117', 'XK', 'Kosovo');
INSERT INTO `countries` VALUES ('118', 'KW', 'Kuwait');
INSERT INTO `countries` VALUES ('119', 'KG', 'Kyrgyzstan');
INSERT INTO `countries` VALUES ('120', 'LA', 'Lao People\'s Democratic Republic');
INSERT INTO `countries` VALUES ('121', 'LV', 'Latvia');
INSERT INTO `countries` VALUES ('122', 'LB', 'Lebanon');
INSERT INTO `countries` VALUES ('123', 'LS', 'Lesotho');
INSERT INTO `countries` VALUES ('124', 'LR', 'Liberia');
INSERT INTO `countries` VALUES ('125', 'LY', 'Libyan Arab Jamahiriya');
INSERT INTO `countries` VALUES ('126', 'LI', 'Liechtenstein');
INSERT INTO `countries` VALUES ('127', 'LT', 'Lithuania');
INSERT INTO `countries` VALUES ('128', 'LU', 'Luxembourg');
INSERT INTO `countries` VALUES ('129', 'MO', 'Macau');
INSERT INTO `countries` VALUES ('130', 'MK', 'Macedonia');
INSERT INTO `countries` VALUES ('131', 'MG', 'Madagascar');
INSERT INTO `countries` VALUES ('132', 'MW', 'Malawi');
INSERT INTO `countries` VALUES ('133', 'MY', 'Malaysia');
INSERT INTO `countries` VALUES ('134', 'MV', 'Maldives');
INSERT INTO `countries` VALUES ('135', 'ML', 'Mali');
INSERT INTO `countries` VALUES ('136', 'MT', 'Malta');
INSERT INTO `countries` VALUES ('137', 'MH', 'Marshall Islands');
INSERT INTO `countries` VALUES ('138', 'MQ', 'Martinique');
INSERT INTO `countries` VALUES ('139', 'MR', 'Mauritania');
INSERT INTO `countries` VALUES ('140', 'MU', 'Mauritius');
INSERT INTO `countries` VALUES ('141', 'TY', 'Mayotte');
INSERT INTO `countries` VALUES ('142', 'MX', 'Mexico');
INSERT INTO `countries` VALUES ('143', 'FM', 'Micronesia, Federated States of');
INSERT INTO `countries` VALUES ('144', 'MD', 'Moldova, Republic of');
INSERT INTO `countries` VALUES ('145', 'MC', 'Monaco');
INSERT INTO `countries` VALUES ('146', 'MN', 'Mongolia');
INSERT INTO `countries` VALUES ('147', 'ME', 'Montenegro');
INSERT INTO `countries` VALUES ('148', 'MS', 'Montserrat');
INSERT INTO `countries` VALUES ('149', 'MA', 'Morocco');
INSERT INTO `countries` VALUES ('150', 'MZ', 'Mozambique');
INSERT INTO `countries` VALUES ('151', 'MM', 'Myanmar');
INSERT INTO `countries` VALUES ('152', 'NA', 'Namibia');
INSERT INTO `countries` VALUES ('153', 'NR', 'Nauru');
INSERT INTO `countries` VALUES ('154', 'NP', 'Nepal');
INSERT INTO `countries` VALUES ('155', 'NL', 'Netherlands');
INSERT INTO `countries` VALUES ('156', 'AN', 'Netherlands Antilles');
INSERT INTO `countries` VALUES ('157', 'NC', 'New Caledonia');
INSERT INTO `countries` VALUES ('158', 'NZ', 'New Zealand');
INSERT INTO `countries` VALUES ('159', 'NI', 'Nicaragua');
INSERT INTO `countries` VALUES ('160', 'NE', 'Niger');
INSERT INTO `countries` VALUES ('161', 'NG', 'Nigeria');
INSERT INTO `countries` VALUES ('162', 'NU', 'Niue');
INSERT INTO `countries` VALUES ('163', 'NF', 'Norfolk Island');
INSERT INTO `countries` VALUES ('164', 'MP', 'Northern Mariana Islands');
INSERT INTO `countries` VALUES ('165', 'NO', 'Norway');
INSERT INTO `countries` VALUES ('166', 'OM', 'Oman');
INSERT INTO `countries` VALUES ('167', 'PK', 'Pakistan');
INSERT INTO `countries` VALUES ('168', 'PW', 'Palau');
INSERT INTO `countries` VALUES ('169', 'PS', 'Palestine');
INSERT INTO `countries` VALUES ('170', 'PA', 'Panama');
INSERT INTO `countries` VALUES ('171', 'PG', 'Papua New Guinea');
INSERT INTO `countries` VALUES ('172', 'PY', 'Paraguay');
INSERT INTO `countries` VALUES ('173', 'PE', 'Peru');
INSERT INTO `countries` VALUES ('174', 'PH', 'Philippines');
INSERT INTO `countries` VALUES ('175', 'PN', 'Pitcairn');
INSERT INTO `countries` VALUES ('176', 'PL', 'Poland');
INSERT INTO `countries` VALUES ('177', 'PT', 'Portugal');
INSERT INTO `countries` VALUES ('178', 'PR', 'Puerto Rico');
INSERT INTO `countries` VALUES ('179', 'QA', 'Qatar');
INSERT INTO `countries` VALUES ('180', 'RE', 'Reunion');
INSERT INTO `countries` VALUES ('181', 'RO', 'Romania');
INSERT INTO `countries` VALUES ('182', 'RU', 'Russian Federation');
INSERT INTO `countries` VALUES ('183', 'RW', 'Rwanda');
INSERT INTO `countries` VALUES ('184', 'KN', 'Saint Kitts and Nevis');
INSERT INTO `countries` VALUES ('185', 'LC', 'Saint Lucia');
INSERT INTO `countries` VALUES ('186', 'VC', 'Saint Vincent and the Grenadines');
INSERT INTO `countries` VALUES ('187', 'WS', 'Samoa');
INSERT INTO `countries` VALUES ('188', 'SM', 'San Marino');
INSERT INTO `countries` VALUES ('189', 'ST', 'Sao Tome and Principe');
INSERT INTO `countries` VALUES ('190', 'SA', 'Saudi Arabia');
INSERT INTO `countries` VALUES ('191', 'SN', 'Senegal');
INSERT INTO `countries` VALUES ('192', 'RS', 'Serbia');
INSERT INTO `countries` VALUES ('193', 'SC', 'Seychelles');
INSERT INTO `countries` VALUES ('194', 'SL', 'Sierra Leone');
INSERT INTO `countries` VALUES ('195', 'SG', 'Singapore');
INSERT INTO `countries` VALUES ('196', 'SK', 'Slovakia');
INSERT INTO `countries` VALUES ('197', 'SI', 'Slovenia');
INSERT INTO `countries` VALUES ('198', 'SB', 'Solomon Islands');
INSERT INTO `countries` VALUES ('199', 'SO', 'Somalia');
INSERT INTO `countries` VALUES ('200', 'ZA', 'South Africa');
INSERT INTO `countries` VALUES ('201', 'GS', 'South Georgia South Sandwich Islands');
INSERT INTO `countries` VALUES ('202', 'ES', 'Spain');
INSERT INTO `countries` VALUES ('203', 'LK', 'Sri Lanka');
INSERT INTO `countries` VALUES ('204', 'SH', 'St. Helena');
INSERT INTO `countries` VALUES ('205', 'PM', 'St. Pierre and Miquelon');
INSERT INTO `countries` VALUES ('206', 'SD', 'Sudan');
INSERT INTO `countries` VALUES ('207', 'SR', 'Suriname');
INSERT INTO `countries` VALUES ('208', 'SJ', 'Svalbard and Jan Mayen Islands');
INSERT INTO `countries` VALUES ('209', 'SZ', 'Swaziland');
INSERT INTO `countries` VALUES ('210', 'SE', 'Sweden');
INSERT INTO `countries` VALUES ('211', 'CH', 'Switzerland');
INSERT INTO `countries` VALUES ('212', 'SY', 'Syrian Arab Republic');
INSERT INTO `countries` VALUES ('213', 'TW', 'Taiwan');
INSERT INTO `countries` VALUES ('214', 'TJ', 'Tajikistan');
INSERT INTO `countries` VALUES ('215', 'TZ', 'Tanzania, United Republic of');
INSERT INTO `countries` VALUES ('216', 'TH', 'Thailand');
INSERT INTO `countries` VALUES ('217', 'TG', 'Togo');
INSERT INTO `countries` VALUES ('218', 'TK', 'Tokelau');
INSERT INTO `countries` VALUES ('219', 'TO', 'Tonga');
INSERT INTO `countries` VALUES ('220', 'TT', 'Trinidad and Tobago');
INSERT INTO `countries` VALUES ('221', 'TN', 'Tunisia');
INSERT INTO `countries` VALUES ('222', 'TR', 'Turkey');
INSERT INTO `countries` VALUES ('223', 'TM', 'Turkmenistan');
INSERT INTO `countries` VALUES ('224', 'TC', 'Turks and Caicos Islands');
INSERT INTO `countries` VALUES ('225', 'TV', 'Tuvalu');
INSERT INTO `countries` VALUES ('226', 'UG', 'Uganda');
INSERT INTO `countries` VALUES ('227', 'UA', 'Ukraine');
INSERT INTO `countries` VALUES ('228', 'AE', 'United Arab Emirates');
INSERT INTO `countries` VALUES ('229', 'GB', 'United Kingdom');
INSERT INTO `countries` VALUES ('230', 'US', 'United States');
INSERT INTO `countries` VALUES ('231', 'UM', 'United States minor outlying islands');
INSERT INTO `countries` VALUES ('232', 'UY', 'Uruguay');
INSERT INTO `countries` VALUES ('233', 'UZ', 'Uzbekistan');
INSERT INTO `countries` VALUES ('234', 'VU', 'Vanuatu');
INSERT INTO `countries` VALUES ('235', 'VA', 'Vatican City State');
INSERT INTO `countries` VALUES ('236', 'VE', 'Venezuela');
INSERT INTO `countries` VALUES ('237', 'VN', 'Vietnam');
INSERT INTO `countries` VALUES ('238', 'VG', 'Virgin Islands (British)');
INSERT INTO `countries` VALUES ('239', 'VI', 'Virgin Islands (U.S.)');
INSERT INTO `countries` VALUES ('240', 'WF', 'Wallis and Futuna Islands');
INSERT INTO `countries` VALUES ('241', 'EH', 'Western Sahara');
INSERT INTO `countries` VALUES ('242', 'YE', 'Yemen');
INSERT INTO `countries` VALUES ('243', 'ZR', 'Zaire');
INSERT INTO `countries` VALUES ('244', 'ZM', 'Zambia');
INSERT INTO `countries` VALUES ('245', 'ZW', 'Zimbabwe');

-- ----------------------------
-- Table structure for documents
-- ----------------------------
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of documents
-- ----------------------------
INSERT INTO `documents` VALUES ('11', 'P2140508 _1__2018-11-26-06:11:42.jpg', 'MF profiles', 'jpg', '2018-11-26 06:35:03', '1', 'asdasd');
INSERT INTO `documents` VALUES ('12', '1st post_2018-10-23-06:10:26.jpg', 'MF profiles', 'jpg', '2019-04-18 09:18:42', '1', 'd');
INSERT INTO `documents` VALUES ('15', '2nd post-1_2018-11-21-05:11:23.jpg', 'MF profiles', 'jpg', '2019-04-18 09:18:43', '1', 'd');
INSERT INTO `documents` VALUES ('16', 'CIS placemat_2018-11-21-05:11:16.pdf', 'MF profiles', 'pdf', '2019-04-18 09:18:43', '1', 'd');
INSERT INTO `documents` VALUES ('17', '82db547b-c1a9-431f-9ee3-d1246d9842db_2018-11-26-06:11:36.jpg', 'MF profiles', 'jpg', '2018-11-26 06:39:07', '1', 'dsadasd');
INSERT INTO `documents` VALUES ('19', '4_2018-11-29-08:11:30.png', '', 'png', '2018-11-29 08:19:30', '1', 'icon');
INSERT INTO `documents` VALUES ('20', '4AA3-9686EEE_2018-11-29-08:11:58.pdf', 'CVs', 'pdf', '2018-11-29 08:20:58', '1', 'Khachatur Badalyan CV');

-- ----------------------------
-- Table structure for Industrys
-- ----------------------------
DROP TABLE IF EXISTS `Industrys`;
CREATE TABLE `Industrys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of Industrys
-- ----------------------------
INSERT INTO `Industrys` VALUES ('1', 'Agribusiness');
INSERT INTO `Industrys` VALUES ('2', 'Consumer products');
INSERT INTO `Industrys` VALUES ('3', 'Economics, policy and governance');
INSERT INTO `Industrys` VALUES ('4', 'Education');
INSERT INTO `Industrys` VALUES ('5', 'Energy efficiency');
INSERT INTO `Industrys` VALUES ('6', 'Financial services');
INSERT INTO `Industrys` VALUES ('7', 'Food &amp; beverage');
INSERT INTO `Industrys` VALUES ('8', 'Healthcare');
INSERT INTO `Industrys` VALUES ('9', 'Industrial products');
INSERT INTO `Industrys` VALUES ('10', 'Municipal infrastructure');
INSERT INTO `Industrys` VALUES ('11', 'Natural resources');
INSERT INTO `Industrys` VALUES ('12', 'Not for profit');
INSERT INTO `Industrys` VALUES ('13', 'Public sector');
INSERT INTO `Industrys` VALUES ('14', 'Real estate and construction');
INSERT INTO `Industrys` VALUES ('15', 'Retail');
INSERT INTO `Industrys` VALUES ('16', 'Services');
INSERT INTO `Industrys` VALUES ('17', 'Small business');
INSERT INTO `Industrys` VALUES ('18', 'Technology, media and telecommunications');
INSERT INTO `Industrys` VALUES ('19', 'Transport and roads');
INSERT INTO `Industrys` VALUES ('20', 'Travel, tourism and leisure');
INSERT INTO `Industrys` VALUES ('21', 'Other');

-- ----------------------------
-- Table structure for project_attachments
-- ----------------------------
DROP TABLE IF EXISTS `project_attachments`;
CREATE TABLE `project_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `src` varchar(255) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pr_in` (`project_id`),
  CONSTRAINT `pr_in` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_attachments
-- ----------------------------
INSERT INTO `project_attachments` VALUES ('95', '198', '4imagepng-2019-06-07-02:06:20.png', 'png');
INSERT INTO `project_attachments` VALUES ('96', '198', '5c5185b16d7b3jpg-2019-06-07-02:06:26.jpg', 'jpg');

-- ----------------------------
-- Table structure for project_checklists
-- ----------------------------
DROP TABLE IF EXISTS `project_checklists`;
CREATE TABLE `project_checklists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `deadline` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pr_id` (`project_id`),
  KEY `u_index` (`user_id`),
  CONSTRAINT `p_index` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `u_index` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of project_checklists
-- ----------------------------

-- ----------------------------
-- Table structure for project_comments
-- ----------------------------
DROP TABLE IF EXISTS `project_comments`;
CREATE TABLE `project_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `u_id` (`user_id`),
  KEY `p_idd` (`project_id`),
  CONSTRAINT `p_idd` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of project_comments
-- ----------------------------
INSERT INTO `project_comments` VALUES ('214', '68', '198', 'n an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised  in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with  [~armen]  n an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with ', '2019-06-07 12:22:08', '1');

-- ----------------------------
-- Table structure for project_countries
-- ----------------------------
DROP TABLE IF EXISTS `project_countries`;
CREATE TABLE `project_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_project_id` (`project_id`),
  KEY `ix_country_id` (`country_id`),
  CONSTRAINT `fk_coun` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ix_project_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_countries
-- ----------------------------
INSERT INTO `project_countries` VALUES ('233', '2', '198');
INSERT INTO `project_countries` VALUES ('234', '3', '198');

-- ----------------------------
-- Table structure for project_favorite
-- ----------------------------
DROP TABLE IF EXISTS `project_favorite`;
CREATE TABLE `project_favorite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `poject_id` (`project_id`),
  CONSTRAINT `poject_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for project_groups
-- ----------------------------
DROP TABLE IF EXISTS `project_groups`;
CREATE TABLE `project_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of project_groups
-- ----------------------------
INSERT INTO `project_groups` VALUES ('25', '131', '8');
INSERT INTO `project_groups` VALUES ('24', '131', '1');
INSERT INTO `project_groups` VALUES ('31', '138', '1');
INSERT INTO `project_groups` VALUES ('30', '138', '9');
INSERT INTO `project_groups` VALUES ('32', '139', '9');
INSERT INTO `project_groups` VALUES ('33', '143', '8');

-- ----------------------------
-- Table structure for project_members
-- ----------------------------
DROP TABLE IF EXISTS `project_members`;
CREATE TABLE `project_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_index` (`project_id`),
  KEY `user_index` (`user_id`),
  CONSTRAINT `project_index` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_index` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_members
-- ----------------------------
INSERT INTO `project_members` VALUES ('60', '198', '68');
INSERT INTO `project_members` VALUES ('61', '199', '61');

-- ----------------------------
-- Table structure for project_sectors
-- ----------------------------
DROP TABLE IF EXISTS `project_sectors`;
CREATE TABLE `project_sectors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of project_sectors
-- ----------------------------
INSERT INTO `project_sectors` VALUES ('1', ' Agriculture');
INSERT INTO `project_sectors` VALUES ('2', ' Chemical industry');
INSERT INTO `project_sectors` VALUES ('3', ' Construction');
INSERT INTO `project_sectors` VALUES ('4', ' Education');
INSERT INTO `project_sectors` VALUES ('5', ' Energy');
INSERT INTO `project_sectors` VALUES ('6', ' Financial services');
INSERT INTO `project_sectors` VALUES ('7', ' Food and beverage, tobacco');
INSERT INTO `project_sectors` VALUES ('8', ' Healthcare');
INSERT INTO `project_sectors` VALUES ('9', ' Hospitality, tourism, catering');
INSERT INTO `project_sectors` VALUES ('10', ' Mining ');
INSERT INTO `project_sectors` VALUES ('11', ' Oil and gas');
INSERT INTO `project_sectors` VALUES ('12', ' Production and manufacturing');
INSERT INTO `project_sectors` VALUES ('13', ' Railway');
INSERT INTO `project_sectors` VALUES ('14', ' Retail');
INSERT INTO `project_sectors` VALUES ('15', ' Transport');
INSERT INTO `project_sectors` VALUES ('16', ' Telecommunication and postal');
INSERT INTO `project_sectors` VALUES ('17', ' Utilities (water, gas, electricity, etc.)');
INSERT INTO `project_sectors` VALUES ('18', ' Water');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moderator_id` int(11) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT ' 0 => "Pending approval",\r1 => "SUBMISSION PROCESS",2 => "In progress",3 => "Accepted",\r4 => "Rejected",\r5 => "Closed",',
  `groups_flag` int(1) DEFAULT NULL,
  `ifi_name` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `project_dec` text,
  `tender_stage` enum('Proposal','Eol','General procurement notice','Early intelligence') DEFAULT NULL,
  `request_issued` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `budget_int` int(11) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `eligibility_restrictions` int(1) DEFAULT NULL,
  `selection_method` int(11) DEFAULT NULL,
  `submission_method` int(11) DEFAULT NULL,
  `evaluation_decision_making` varchar(255) DEFAULT NULL,
  `beneficiary_stakeholder` varchar(255) DEFAULT NULL,
  `state` int(1) DEFAULT '1' COMMENT '0-delete, 1-active, 2-archive',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `importance_1` int(1) DEFAULT NULL,
  `importance_2` int(1) DEFAULT NULL,
  `importance_3` int(1) DEFAULT NULL,
  `international_status` int(1) DEFAULT '0',
  `client_name` varchar(255) DEFAULT NULL,
  `project_value` varchar(50) DEFAULT NULL,
  `industry_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `consultants` varchar(255) DEFAULT NULL,
  `lead_partner` varchar(255) DEFAULT NULL,
  `partner_contact` varchar(255) DEFAULT NULL,
  `location_within_country` varchar(255) DEFAULT NULL,
  `staff_months` varchar(11) DEFAULT NULL,
  `address_client` varchar(255) DEFAULT NULL,
  `duration_assignment` varchar(255) DEFAULT NULL,
  `services_value` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `completion_date` varchar(255) DEFAULT NULL,
  `name_senior_professional` varchar(255) DEFAULT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `proportion` varchar(255) DEFAULT NULL,
  `no_professional_staff` varchar(255) DEFAULT NULL,
  `no_provided_staff` varchar(255) DEFAULT NULL,
  `narrative_description` varchar(255) DEFAULT NULL,
  `actual_services_description` text,
  `name_firm` varchar(255) DEFAULT NULL,
  `project_code` varchar(255) DEFAULT NULL,
  `financed_by` varchar(255) DEFAULT NULL,
  `client_industry` int(11) DEFAULT NULL,
  `service_line` int(11) DEFAULT NULL,
  `required_format` int(11) DEFAULT NULL,
  `required_language` varchar(255) DEFAULT NULL,
  `client_segment` int(11) DEFAULT NULL,
  `project_sectors` varchar(255) DEFAULT NULL,
  `project_components` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `eligibility_comment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('198', null, '61', '0', '0', 'What is Lorem Ipsum?', 'turies, but also the leap into electronic typesetting, remaining essentially unchanged.', 's been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lor', '', '2019-06-11', '2019-06-11', null, '', '', null, null, null, '', null, '1', '1559892027', '1559892027', null, null, null, '0', ' Lorem Ipsum has been the industry\'s stan', null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '', '', null, null, null, '', '0', null, null, null, '');
INSERT INTO `projects` VALUES ('199', null, '61', '0', '0', 'Contracting authority', 'Project name', '', '', '2019-06-19', '2019-06-19', null, '', '', null, null, null, '', null, '1', '1559903564', '1559903564', null, null, null, '0', 'Client name', null, null, null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '', '', null, null, null, '', null, null, null, null, '');

-- ----------------------------
-- Table structure for rules
-- ----------------------------
DROP TABLE IF EXISTS `rules`;
CREATE TABLE `rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rules
-- ----------------------------
INSERT INTO `rules` VALUES ('1', 'Decision maker');
INSERT INTO `rules` VALUES ('2', 'Staff');
INSERT INTO `rules` VALUES ('3', 'Data input');
INSERT INTO `rules` VALUES ('4', 'Super admin');

-- ----------------------------
-- Table structure for rules_name
-- ----------------------------
DROP TABLE IF EXISTS `rules_name`;
CREATE TABLE `rules_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `rule_kay` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rules_name
-- ----------------------------
INSERT INTO `rules_name` VALUES ('1', null, 'Super admin', 'super_admin');
INSERT INTO `rules_name` VALUES ('2', null, 'Manager', 'moderator');
INSERT INTO `rules_name` VALUES ('3', null, 'Admin', 'admin');
INSERT INTO `rules_name` VALUES ('4', null, 'User', 'user');

-- ----------------------------
-- Table structure for Services
-- ----------------------------
DROP TABLE IF EXISTS `Services`;
CREATE TABLE `Services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of Services
-- ----------------------------
INSERT INTO `Services` VALUES ('1', 'Business consulting services');
INSERT INTO `Services` VALUES ('2', 'Business risk services');
INSERT INTO `Services` VALUES ('3', 'Cybersecurity');
INSERT INTO `Services` VALUES ('4', 'Recovery & reorganisation');
INSERT INTO `Services` VALUES ('5', 'Transactional advisory services');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `ebrd` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('47', 'Khachatur.Badalyan', 'Badalyan', 'Khachatur', '', '$2y$13$HvSkP8yhXzkSGNah8EkcZu9A9hHvt5Ri1AnxljCev9fMUgiuARwHO', null, 'khachatur@e-works.am', '10', '1521463158', '1521463158', null, null, '0');
INSERT INTO `user` VALUES ('61', 'armen', 'Karapetyan', 'Armen', '', '$2y$13$53lIxKXSDPWZR9ecQQxfNOaLB49ZcVNL.etHBxH6WhSEBxBD0N8Ze', null, 'armen55182@gmail.com', '10', '1556016137', '1556016137', '1556016163.4.jpg', null, '0');
INSERT INTO `user` VALUES ('64', 'izabella.khaneyan', 'Khaneyan', 'Izabella', '', '$2y$13$TQBowXPZdFBrbGSYgIVBsu7RXANYFD0BYuFmRS4GkEGJN0Ct9UAQW', null, 'izabella.khaneyan@am.gt.com', '10', '1557908692', '1557908692', null, '3', null);
INSERT INTO `user` VALUES ('65', 'ani.hakobyan', 'Hakobyan', 'Ani', '', '$2y$13$EQKSuopzklXVOKTVGx5GOOjxEwO3pm.SC8zpHN/8nUV3GErYMAWG2', null, 'ani.hakobyan@am.gt.com', '0', '1557909050', '1557909050', null, '1', null);
INSERT INTO `user` VALUES ('66', 'mariam.mkrtchyan', 'Mkrtchyan', 'Mariam', '', '$2y$13$E9kJfA1bqI6OyW9clzWDa.IYoLUB.t9P2pNgwZREkZZoLEUlvlGpq', null, 'mariam.mkrtchyan@am.gt.com', '10', '1557918907', '1557918907', null, null, null);
INSERT INTO `user` VALUES ('67', 'hrant', 'Vardanyan', 'Hrant', '', '$2y$13$Dkzhz/rrcwQ9ZQwXm47lY.h/Elvx1e5otNVjK9lzusKMCFJgmhiX.', null, 'hrant@mail.ru', '10', '1559817640', '1559817640', '1559891605.26.jpg', null, null);
INSERT INTO `user` VALUES ('68', 'davit', 'Babayan', 'Dsvit', '', '$2y$13$pXplwYL6pMySARk.bi5DoufA0n3C6BwFNy./3V8gv0mxnMcAUXmae', null, 'davit@mail.ru', '10', '1559891547', '1559891547', '1559891593.46.jpg', null, null);

-- ----------------------------
-- Table structure for user_countries
-- ----------------------------
DROP TABLE IF EXISTS `user_countries`;
CREATE TABLE `user_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_` (`user_id`),
  KEY `fk_c` (`country_id`),
  CONSTRAINT `fk_c` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of user_countries
-- ----------------------------
INSERT INTO `user_countries` VALUES ('85', '47', '2');
INSERT INTO `user_countries` VALUES ('86', '47', '6');
INSERT INTO `user_countries` VALUES ('96', '68', '3');
INSERT INTO `user_countries` VALUES ('97', '68', '1');
INSERT INTO `user_countries` VALUES ('98', '67', '5');
INSERT INTO `user_countries` VALUES ('99', '67', '2');
INSERT INTO `user_countries` VALUES ('100', '67', '1');
INSERT INTO `user_countries` VALUES ('101', '61', '6');
INSERT INTO `user_countries` VALUES ('102', '61', '7');
INSERT INTO `user_countries` VALUES ('103', '61', '5');

-- ----------------------------
-- Table structure for user_notifications
-- ----------------------------
DROP TABLE IF EXISTS `user_notifications`;
CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `type` int(1) DEFAULT NULL COMMENT '0-comment , 1 - new project',
  `status` int(1) DEFAULT '0' COMMENT '1 -read , 0 - active',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `fk_project_id_not1` (`project_id`),
  CONSTRAINT `fk_project_id_not1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_user_not1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_notifications
-- ----------------------------
INSERT INTO `user_notifications` VALUES ('64', '68', '198', '1', '1', '2019-06-07 02:20:27');
INSERT INTO `user_notifications` VALUES ('65', '61', '198', '0', '0', '2019-06-07 02:22:10');
INSERT INTO `user_notifications` VALUES ('66', '61', '199', '1', '0', '2019-06-07 05:32:44');

-- ----------------------------
-- Table structure for user_rules
-- ----------------------------
DROP TABLE IF EXISTS `user_rules`;
CREATE TABLE `user_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `us` (`user_id`),
  KEY `rul` (`rule_id`),
  CONSTRAINT `rul` FOREIGN KEY (`rule_id`) REFERENCES `rules_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `us` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_rules
-- ----------------------------
INSERT INTO `user_rules` VALUES ('220', '64', '1');
INSERT INTO `user_rules` VALUES ('224', '65', '1');
INSERT INTO `user_rules` VALUES ('229', '67', '3');
INSERT INTO `user_rules` VALUES ('230', '61', '1');

-- ----------------------------
-- Table structure for users_grup
-- ----------------------------
DROP TABLE IF EXISTS `users_grup`;
CREATE TABLE `users_grup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_grup
-- ----------------------------
INSERT INTO `users_grup` VALUES ('1', 'General');
INSERT INTO `users_grup` VALUES ('7', 'Armenia');
INSERT INTO `users_grup` VALUES ('13', 'Senior');
INSERT INTO `users_grup` VALUES ('14', 'User');
INSERT INTO `users_grup` VALUES ('16', 'User');

-- ----------------------------
-- Table structure for users_grupes
-- ----------------------------
DROP TABLE IF EXISTS `users_grupes`;
CREATE TABLE `users_grupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grup_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id_fk` (`grup_id`),
  KEY `fk_users_id_g` (`user_id`),
  CONSTRAINT `fk_users_id_g` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `group_id_fk` FOREIGN KEY (`grup_id`) REFERENCES `users_grup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_grupes
-- ----------------------------
INSERT INTO `users_grupes` VALUES ('53', '1', '47');
INSERT INTO `users_grupes` VALUES ('54', '7', '61');
INSERT INTO `users_grupes` VALUES ('56', '13', '61');
INSERT INTO `users_grupes` VALUES ('58', '1', '65');
INSERT INTO `users_grupes` VALUES ('59', '14', '66');
