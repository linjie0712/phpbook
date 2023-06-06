CREATE TABLE `account` (
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT 'user name',
  `amount` int(10) NOT NULL DEFAULT '0' COMMENT 'money amount',
  KEY `idx_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into account values('bill',10);

/*设置未提交读*/
set global transaction isolation level read uncommitted;
/*设置已提交读*/
set global transaction isolation level read committed;
/*设置可重复读*/
set global transaction isolation level repeatable read;
/*设置可串行化*/
set global transaction isolation level serializable;

/*查看隔离级别*/
show variables like 'transaction_isolation';
/*如果 MySQL Server 版本小于 5.7.20，则应使用如下SQL*/
show variables like 'tx_isolation';

/*演示脏读*/
	/**T1**/
		/*事务1*/
		select * from account;/*bill 10*/

		/*事务2*/
		begin;
		update account set amount = 1000 where name = 'bill';
	/**T2**/
		/*事务1*/
		select * from account;/*bill 1000*/
	/*T3*/
		/*事务2*/
		rollback;


/*-----分割线-----*/
update account set amount = 10 where name = 'bill';/*恢复原始数据*/
/*-----分割线-----*/

/*演示更新丢失*/
	/**T1**/
		/*事务1*/
		begin;
		select amount from account where name = 'bill';/*bill 10*/
		/*事务2*/
		begin;
		select amount from account where name = 'bill';/*bill 10*/
	/**T2**/
		/*事务1*/
		/*业务进行计算，此处为 10+5 = 15*/
		update account set amount = 15 where name = 'bill';/*bill amount + 5*/
		commit;	
	/*T3*/
		/*事务2*/
		/*业务进行计算，此处为 10+10 = 20*/
		update account set amount = 20 where name = 'bill';/*bill amount + 10*/
		commit;
	/*T4*/
		/*事务1*/
		select amount from account where name = 'bill';/*bill 20*/	
		/*事务2*/
		select amount from account where name = 'bill';/*bill 20*/	


/*-----分割线-----*/
update account set amount = 10 where name = 'bill';/*恢复原始数据*/
/*-----分割线-----*/

/*演示不可重复读*/
	/**T1**/
		/*事务1*/
		begin;
		select * from account where name = 'bill';/* bill 10 */
		/*事务2*/
		begin;
	/**T2**/
		/*事务2*/
		update account set amount = 1000 where name = 'bill';
		commit;
	/*T3*/
		/*事务1*/
		select * from account where name = 'bill';/* bill 1000 */
		commit;

/*演示*/


/*-----分割线-----*/
update account set amount = 10 where name = 'bill';/*恢复原始数据*/
/*-----分割线-----*/

/*演示幻读*/
	/**T1**/
		/*事务1*/
		begin;
		select * from account where name = 'tom';/*empty set*/
		/*事务2*/
		begin;
	/**T2**/
		/*事务2*/
		insert into account values('tom',12);
		commit;
	/*T3*/
		/*事务1*/
		insert into account values('tom',12);
		commit;
