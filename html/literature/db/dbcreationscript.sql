CREATE DATABASE `wemachine` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `clientroles` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_clientroles_roles` (`role_id`),
  KEY `FK_clientroles_clients` (`client_id`),
  CONSTRAINT `FK_clientroles_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_clientroles_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `firstname` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_created` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `orderitem_id` int(11) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `program_number` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `machine_id` int(11) DEFAULT NULL,
  `starttime` datetime(6) DEFAULT NULL,
  `endtime` datetime(6) DEFAULT NULL,
  `machine_starttime` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `machine_endtime` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  `thickness` double DEFAULT NULL,
  `pathlength` double DEFAULT NULL,
  `date_created` datetime(6) DEFAULT NULL,
  `date_modified` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_jobs_orderitems` (`orderitem_id`),
  KEY `FK_jobs_machines` (`machine_id`),
  CONSTRAINT `FK_jobs_machines` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_jobs_orderitems` FOREIGN KEY (`orderitem_id`) REFERENCES `orderitems` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `machines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `manufacturer` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `model` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `details` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `manufacture_date` datetime(6) DEFAULT NULL,
  `price_per_hour` decimal(19,4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_machines_owners` (`owner_id`),
  CONSTRAINT `FK_machines_owners` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orderdrawings` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `drawing_path` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orderdrawings_orders` (`order_id`),
  CONSTRAINT `FK_orderdrawings_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orderitemdrawings` (
  `id` int(11) NOT NULL,
  `orderitem_id` int(11) DEFAULT NULL,
  `drawing_path` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orderitemdrawings_orderitems` (`orderitem_id`),
  CONSTRAINT `FK_orderitemdrawings_orderitems` FOREIGN KEY (`orderitem_id`) REFERENCES `orderitems` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quoted_price` decimal(19,4) DEFAULT NULL,
  `actual_price` decimal(19,4) DEFAULT NULL,
  `quoted_tax` decimal(19,4) DEFAULT NULL,
  `actual_tax` decimal(19,4) DEFAULT NULL,
  `tax_percentage` decimal(19,4) DEFAULT NULL,
  `machine_price_per_hour` decimal(19,4) DEFAULT NULL,
  `price_per_sq_mm` decimal(19,4) DEFAULT NULL,
  `date_created` datetime(6) DEFAULT NULL,
  `date_modified` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orderitems_orders` (`order_id`),
  CONSTRAINT `FK_orderitems_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ordermaterials` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `sizeLBH` double DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `rate_per_kg` decimal(19,4) DEFAULT NULL,
  `density` double DEFAULT NULL,
  `price` decimal(19,4) DEFAULT NULL,
  `pre_machine_cost` decimal(19,4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ordermaterials_orders` (`order_id`),
  CONSTRAINT `FK_ordermaterials_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `estimated_delivery_date` datetime(6) DEFAULT NULL,
  `actual_shipping_date` datetime(6) DEFAULT NULL,
  `material_type` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT 'ferrous/nonferrous/other',
  `material_given` tinyint(1) DEFAULT NULL COMMENT 'will be yes or no',
  `date_created` datetime(6) DEFAULT NULL,
  `date_modified` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_orders_clients` (`client_id`),
  CONSTRAINT `FK_orders_clients` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_created` datetime(6) DEFAULT NULL,
  `date_modified` datetime(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rolename` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



