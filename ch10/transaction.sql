CREATE TABLE `items` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(20) NOT NULL COMMENT '商品名称',
 `price` int(10) NOT NULL COMMENT '商品价格，单位分',
 `stock` int(11) NOT NULL COMMENT '库存',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='商品表';

CREATE TABLE `orders` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL COMMENT '用户ID',
 `item_id` int(11) NOT NULL COMMENT '购买商品ID',
 `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '购买时间',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='订单表';

INSERT INTO `items` (`id`, `name`, `price`, `stock`) VALUES
(1, '可乐', 300, 10);

BEGIN;
INSERT INTO `orders` VALUES(NULL,1,1,CURRENT_TIMESTAMP);
UPDATE `items` SET `stock` = `stock` - 1 where `id` = 1;
COMMIT;

SELECT `stock` FROM `items` WHERE `id` = 1;/* 库存减少为 9 */

BEGIN;
INSERT INTO `orders` VALUES(NULL,1,1,CURRENT_TIMESTAMP);
UPDATE `items` SET `stock` = `stock` - 1 where `id` = 1;
ROLLBACK;

SELECT `stock` FROM `items` WHERE `id` = 1;/* 库存仍然为 9 */